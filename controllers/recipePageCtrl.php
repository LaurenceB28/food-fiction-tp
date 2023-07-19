<?php

$stylesheet = 'recipe.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';

$stylesheet = "buttonLike.css";
try {
    $id_recipes = intval(filter_input(INPUT_GET, 'id_recipes', FILTER_SANITIZE_NUMBER_INT));
    // $id_medias  = intval(filter_input(INPUT_GET, 'id_medias', FILTER_SANITIZE_NUMBER_INT));
    $recipe = Recipes::get($id_recipes); 

} catch (\Throwable $th) {
    var_dump($th);
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/recipePage.php');
include(__DIR__ . '/../views/templates/footer.php');
