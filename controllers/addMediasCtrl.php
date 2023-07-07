<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../models/Genres.php';
require_once __DIR__ . '/../models/Medias_genres.php';
require_once __DIR__ . '/../config/config.php';

try {
    $genreAll = Genres::getAll();
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
        $type = intval(filter_input(INPUT_POST, 'types', FILTER_SANITIZE_NUMBER_INT));

        $genres = filter_input(INPUT_POST, 'genres', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        // var_dump($genres);
        // die;

        if (empty($error)) {
            /*transaction*/
            $pdo = Database::getInstance();
            $pdo->beginTransaction();
            /*hydratation de l'objet medias*/
            $medias = new Medias;
            $medias->setTitle($title);
            $medias->setId_types($type);
                        /*enregistrement du media dans la bdd*/
            $isMediaSaved = $medias->insert();
            /*enregistrement du dernier id inséré dans la bdd*/
            $id_medias = $pdo->lastInsertId();
            $isGenreSaved = true;
            foreach ($genres as $genre) {
                $medias_genres = new Medias_genres;
                $medias_genres->setId_genres($genre);
                $medias_genres->setId_medias($id_medias);
                if(!$medias_genres->insert()){
                    $isGenreSaved = false;
                }
            }
            
            /*enregistrement du type dans la bdd */
            // $isGenreSaved = $media->insert();
            if ($isMediaSaved === true && $isGenreSaved === true) {
                $pdo->commit(); // Valide la transaction et exécute toutes les requetes
                SessionFlash::setMessage('Le média et son genre  sont bien été ajoutés');
            } else {
                $pdo->rollBack(); // Annulation de toutes les requêtes exécutées avant la levée de l'exception
                SessionFlash::setMessage('Un problème est survenu lors de l\'ajout du média et de son genre. Aucun ajout n\'a été effectué');
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


/*
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
            } */