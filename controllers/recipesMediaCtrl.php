<?php
$footer = true;
$stylesheet = 'style.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';

// $mediaRecipes = Recipes::getAllMedias($medias);
// $medias = filter_input(INPUT_GET, 'media', FILTER_SANITIZE_SPECIAL_CHARS);
$recipes = filter_input(INPUT_GET, 'recipes', FILTER_SANITIZE_SPECIAL_CHARS);
$id_medias = intval(filter_input(INPUT_GET, 'id_medias', FILTER_SANITIZE_NUMBER_INT));
// var_dump($id_medias);
// die;
$recipes = Medias::getRecipesMedia($id_medias);


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/recipesMedia.php');
include(__DIR__ . '/../views/templates/Footer.php');