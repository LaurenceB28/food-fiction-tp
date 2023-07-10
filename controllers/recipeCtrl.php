<?php
$footer = true;
$stylesheet = 'series.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../config/config.php';

$stylesheet = "buttonLike.css";
try{
$id_recipes = intval(filter_input(INPUT_GET, 'id_recipes', FILTER_SANITIZE_NUMBER_INT));
$id_medias  = intval(filter_input(INPUT_GET, 'id_recipes', FILTER_SANITIZE_NUMBER_INT));
// $medias = Medias::get($id_medias);
$recipes = Recipes::getRecipes($id_recipes);
$displayRecipes = Recipes::displayRecipes($id_medias);
if ($recipes == false){
    throw new Exception('la recette n\'a pas été trouvée');
}
}catch(\Throwable $th){
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/recipe.php');
include(__DIR__ . '/../views/templates/Footer.php');