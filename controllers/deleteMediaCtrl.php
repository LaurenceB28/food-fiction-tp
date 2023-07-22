<?php
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../models/Genres.php';
require_once __DIR__ . '/../models/Medias_genres.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/sessionFlash.php';



try {
    // Nettoyage de l'id de la recette passé en GET dans l'url
    $id_medias = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    // var_dump($id_medias);
    // die; 
    // réponse int(128)
    /*********************************************************/
    $isDeleted = Medias::deleteMedias($id_medias);
    // var_dump($isDeleted);
    // die; 
    // réponse voir capture sur discord
    if ($isDeleted === true) {
        SessionFlash::setMessage('Le média bien été supprimée');
    } else {
        SessionFlash::setMessage('Une erreur s\'est produite lors de la suppression du média.');
    }
} catch (\Throwable $th) {
    var_dump($th);
    die;
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();