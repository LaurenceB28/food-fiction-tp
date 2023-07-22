<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/sessionFlash.php';

session_start();

try {
    // Nettoyage de l'id passé en GET dans l'url
    $id_recipes = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    /************************************************************************************/
    $recipes = Recipes::get($id_recipes);
    // var_dump($recipes);
    // die;
    $id_medias = $recipes->id_medias;
    $allRecipes = Recipes::getRecipes();
    // $updateRecipes->update($id_recipes);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*$title : nettoyage et validation*/
        // $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        // var_dump($title);
        // // On vérifie que ce n'est pas vide
        // if (empty($title)) {
        //     $error["title"] = "Vous devez entrer un nom de recette!!";
        // } else { // Pour les champs obligatoires, on retourne une erreur
        //     // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
        //     if (strlen($title) >= 500) {
        //         $error["title"] = "La longueur du nom n'est pas bon";
        //     }
        // }


        /*ingredients : nettoyage et validation*/
        $ingredient = trim(filter_input(INPUT_POST, 'ingredient', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($ingredient)) {
            $error["ingredient"] = "Vous devez entrer les étapes de préparation!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($ingredient) > 5000) {
                $error["ingredient"] = "La longueur du nom n'est pas bon";
            }
        }

        /*preparation : nettoyage et validation*/

        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
       
        // On vérifie que ce n'est pas vide
        if (empty($description)) {
            $error["description"] = "Vous devez entrer les étapes de préparation!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($description) > 5000) {
                $error["description"] = "La longueur du nom n'est pas bon";
            }
        }
    }

    $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
    $medias = Medias::getAllMedias();
        
        if (empty($error)) {
            //**** HYDRATATION ****/    
        $recipes = new Recipes;
        // $recipes->setTitle($title);
        $recipes->setIngredient($ingredient);
        $recipes->setDescription($description);
        $recipes->setId_medias($id_medias);
        // $recipes->setPicture($fileName);
        $isUpdated = $recipes->update($id_recipes);
        if ($isUpdated == true) {
            $errors['global'] = MESSAGES[1];
        } else {
            $errors['global'] = ERRORS[4];
        }
    }$recipes = Recipes::get($id_recipes);  
} catch (\Throwable $th) {
    var_dump($th);
}




/* ************* AFFICHAGE DES VUES **************************/
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/update.php');
include(__DIR__ . '/../views/templates/footer.php');
