<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../config/config.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*$title : nettoyage et validation*/
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["title"] = "Le nom de la recette n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($title) <= 2 || strlen($title) >= 70) {
                    $error["title"] = "La longueur du nom n'est pas bon";
                }
            }
        }
        /*ingredients : nettoyage et validation*/
        $ingredient = trim(filter_input(INPUT_POST, 'ingredient', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($ingredient)) {
            $error["ingredient"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($ingredient, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["ingredient"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($ingredient) <= 2 || strlen($ingredient) >= 70) {
                    $error["ingredient"] = "La longueur du nom n'est pas bon";
                }
            }
        }
                /*preparation : nettoyage et validation*/
                $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
                // On vérifie que ce n'est pas vide
                if (empty($description)) {
                    $error["description"] = "Vous devez entrer un nom!!";
                } else { // Pour les champs obligatoires, on retourne une erreur
                    $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
                    // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
                    if (!$isOk) {
                        $error["description"] = "Le nom n'est pas au bon format!!";
                    } else {
                        // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                        if (strlen($description) <= 2 || strlen($description) >= 70) {
                            $error["description"] = "La longueur du nom n'est pas bon";
                        }
                    }
                }
    //     if (!empty($error)) {
    //         $patient = new Patient();
    //         $patient->setFirstname($firstname);
    //         $patient->setLastname($lastname);
    //         $patient->setBirthdate($birthdate);
    //         $patient->setPhone($phone);
    //         $patient->setMail($mail);
    //         $isExist = $patient->isExist();
    //         if ($isExist) {
    //             $message = 'Ce patient est déja enregistré';
    //             $block = 1;
    //         } else {
    //             $block = 0;
    //             $isAdded = $patient->add();
    //             if ($isAdded == true) {
    //                 $message = 'Le patient est enregistré';
    //             }
    //         }
    //     }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


// include __DIR__ . '/../views/templates/header.php';
// include __DIR__ . '/../views/user/dashboard.php';


include(__DIR__ . '/../views/templates/header.php');// 
include __DIR__ . '/../views/user/dashboard.php';
include(__DIR__ . '/../views/user/addRecipes.php');