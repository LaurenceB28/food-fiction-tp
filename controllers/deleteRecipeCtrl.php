<?php

require_once(__DIR__ . '/../models/Recipes.php');
require_once(__DIR__ . '/../helpers/sessionFlash.php');



try {
    // Nettoyage de l'id de la recette passé en GET dans l'url
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    /*********************************************************/

    $isDeleted = Recipes::deleteRecipes($id);

    if ($isDeleted === true) {
        SessionFlash::setMessage('La recette a bien été supprimée');
    } else {
        SessionFlash::setMessage('Une erreur s\'est produite lors de la suppression de la recette.');
    }
} catch (\Throwable $th) {
    var_dump($th);
    // header('Location: /error.php');
    die;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();