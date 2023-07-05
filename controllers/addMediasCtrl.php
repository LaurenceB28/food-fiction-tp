<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../config/config.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        /*$title : nettoyage et validation*/
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un nom valide!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["title"] = "Le nom du média n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($title) <= 2 || strlen($title) >= 70) {
                    $error["title"] = "La longueur du nom n'est pas bon";
                }
            }
        }
        if (empty($error)) {
            $medias = new Medias;
            $medias->setTitle($title);
            $isExist = $medias->isExist();
            // var_dump($isExist);
            if ($isExist) {
                $message = 'Ce média est déja enregistré';
                $block = 1;
            } else {
                $block = 0;
                $isAdded = $medias->addMedias();
                if ($isAdded == true) {
                    $message = 'Le média est enregistré';
                }
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/addMedias.php');
include(__DIR__ . '/../views/templates/footer.php');
