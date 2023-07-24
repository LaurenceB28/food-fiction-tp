<?php

$footer = true;
$stylesheet = 'series.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';

// $mediaRecipes = Recipes::getAllMedias($medias);
// $medias = filter_input(INPUT_GET, 'media', FILTER_SANITIZE_SPECIAL_CHARS);
// $recipes = filter_input(INPUT_GET, 'recipes', FILTER_SANITIZE_SPECIAL_CHARS);
$id_genres = intval(filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_NUMBER_INT));
$recipes = Recipes::getAllbyGenre($id_genres);

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/recipesGenres.php');
include(__DIR__ . '/../views/templates/footer.php');