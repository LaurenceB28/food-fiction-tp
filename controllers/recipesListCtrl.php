<?php
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../config/config.php';
$styleSheet = 'stylesheet.css';
// $recipeList = Recipes::getAll();
if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = (int)$_GET['page'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Si une recherche est effectuée grâce à la methode POST//
    /*Search : nettoyage et validation*/
    $search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS));
    /* affiche la recherche */
    $recipes = Recipes::search($search);



}else{
    /*sinon revient sur la liste des recettes*/
    $recipes = Recipes::pagination($page);
    // var_dump($patientList);
    // die;


/* pagination */

$limit = 10;
$count = Recipes::count();
$nbrTotal = $count->idCount; 
$nbrPages = ceil($nbrTotal / $limit);
$pagination = Recipes::pagination($page);


}



include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/recipesList.php');
include(__DIR__ . '/../views/templates/footer.php');