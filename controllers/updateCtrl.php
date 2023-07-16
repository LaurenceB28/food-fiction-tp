<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/sessionFlash.php';

try {
    // Nettoyage de l'id passé en GET dans l'url
    $id_recipes = intval(filter_input(INPUT_GET, 'recipes', FILTER_SANITIZE_NUMBER_INT));
    /************************************************************************************/
    // var_dump($id_recipes);
    // die;
    $recipes = Recipes::get($id_recipes);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {



        /*$title : nettoyage et validation*/
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un nom de recette!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($title) >= 500) {
                $error["title"] = "La longueur du nom n'est pas bon";
            }
        }


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



    $id_medias = intval(filter_input(INPUT_GET, 'media', FILTER_SANITIZE_NUMBER_INT));
    $picture = filter_input(INPUT_GET, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
    $medias = Medias::getAllMedias();


    try {
        if (!isset($_FILES['picture'])) {
            throw new Exception("Le fichier n'existe pas");
        }

        if ($_FILES['picture']['error'] != 0) {
            throw new Exception("Une erreur est survenue lors du transfert");
        }

        if ($_FILES['picture']['type'] != 'image/jpeg') {
            throw new Exception("Ce fichier n'est pas au bon format");
        }

        if ($_FILES['picture']['size'] > MAX_FILESIZE) {
            throw new Exception("Ce fichier est trop volumineux");
        }

        $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $from = $_FILES['picture']['tmp_name'];
        $fileName = uniqid('picture_') . '.' . $extension;
        $to = $_SERVER["DOCUMENT_ROOT"] . '/public/uploads/gallery/medias/' . $fileName;
        move_uploaded_file($from, $to);

        // A FAIRE APRES

        // $filename = $to;
        // $gdImage_original = imagecreatefromjpeg($filename);

        // $width_original = getimagesize($filename)[0];
        // $height_original = getimagesize($filename)[1];

        // if ($width_original < 341 || $height_original < 192) {
        //     throw new Exception("Image trop petite");
        // }

        // if ($height_original > $width_original) {
        //     $width = 341;
        //     $height = (int) round(($height_original * $width) / $width_original); //-1
        // } else { //paysage
        //     $height = 192;
        //     $width = (int) round(($width_original * $height) / $height_original);
        // }

        // $type = IMG_BICUBIC; //IMG_NEAREST_NEIGHBOUR, IMG_BILINEAR_FIXED, IMG_BICUBIC, IMG_BICUBIC_FIXED ;

        // $gdImage_scaled = imagescale($gdImage_original, $width, $height, $type);

        // // imagejpeg($gdImage_scaled, $to);

        // $size = 341;
        // $x = ($width / 2) - ($size / 2);
        // $y = ($height / 2) - ($size / 2);

        // $gdImage_cropped = imagecrop($gdImage_scaled, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);

        // imagejpeg($gdImage_cropped, $to);
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }

    // var_dump($error);
    // die;
    if (empty($error)) {
        //**** HYDRATATION ****/
        $recipes = new Recipes;
        $recipes->setTitle($title);
        $recipes->setIngredient($ingredient);
        $recipes->setDescription($description);
        $recipes->setId_medias($id_medias);
        $recipes->setPicture($fileName);
        $recipes = $recipes->updateRecipes($id_recipes);

        if ($recipes) {
            $errors['global'] = MESSAGES[1];
        } else {
            $errors['global'] = ERRORS[4];
        }
    }
    $recipes = Recipes::get($id_recipes);
} catch (\Throwable $th) {
    var_dump($th);
}




/* ************* AFFICHAGE DES VUES **************************/
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/update.php');
include(__DIR__ . '/../views/templates/footer.php');
