<?php
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../config/config.php';
$styleSheet = 'stylesheet.css';

session_start();

try {
    // Récupération de la valeur recherchée et on nettoie
    //**** NETTOYAGE ****/
    $search = trim((string) filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS));


    // On définit le nombre d'éléments par page grâce à une constante déclarée dans config.php
    $limit = NB_ELEMENTS_BY_PAGE;

    // Compte le nombre d'éléments au total selon la recherche
    $nbrRecipes = Recipes::count($search);

    // Calcule le nombre de pages à afficher dans la pagination
    $nbPages = ceil($nbrRecipes / $limit);

    // A recuperer depuis paramètre d'url. Si aucune valeur, alors vaut 1
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    // Si la valeur de la page demandée n'est pas cohérente, on réinitialise à 0
    if ($currentPage <= 0 || $currentPage > $nbPages) {
        $currentPage = 1;
    }

    //Définit à partir de quel enregistrement positionner le curseur (l'offset) dans la requête
    $offset = $limit * ($currentPage - 1);
    // Appel à la méthode statique permettant de récupérer les utilisateurs selon la recherche et la pagination
    $recipes = Recipes::getRecipes($search, $limit, $offset);

    /*************************************************************/
} catch (\Throwable $th) {
    var_dump($th);
    // header('Location: /views/error.php');
    die;
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/recipesList.php');
include(__DIR__ . '/../views/templates/footer.php');
