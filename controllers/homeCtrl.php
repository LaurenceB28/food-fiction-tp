<?php
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';

// $mediaCarousel = Recipes:: displayRecipes($id_medias);

session_start();
// var_dump($_SESSION['user']);
if (empty($_SESSION['user'])) {
    header('location: /controllers/signInCtrl.php');
    die;
} else {


    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/home.php');
    include(__DIR__ . '/../views/templates/footer.php');
}

$medias = filter_input(INPUT_GET, 'media', FILTER_SANITIZE_SPECIAL_CHARS);
$mediaRecipes = Recipes::getAllbyMedias($medias);
