<?php
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/config.php';
$stylesheet = 'form.css';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //FIRSTNAME
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($firstname)) {
        $error["firstname"] = "Vous devez entrer un nom!!";
    } else { // Pour les champs obligatoires, on retourne une erreur
        $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$isOk) {
            $error["firstname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                $error["firstname"] = "La longueur du nom n'est pas bon";
            }
        }
    }       

    //LASTNAME
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    // On vérifie que ce n'est pas vide
    if (empty($lastname)) {
        $error["lastname"] = "Vous devez entrer un nom!!";
    } else { // Pour les champs obligatoires, on retourne une erreur
        $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
        // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
        if (!$isOk) {
            $error["lastname"] = "Le nom n'est pas au bon format!!";
        } else {
            // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
            if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                $error["lastname"] = "La longueur du nom n'est pas bon";
            }
        }
    }
    
     //EMAIL
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if (empty($email)) {
        $error["email"] = "L'adresse mail est obligatoire!!";
    } else {
        $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$testEmail) {
            $error["email"] = "L'adresse email n'est pas au bon format!!";
        }
    }

    //PASSWORD
    $password = filter_input(INPUT_POST, 'password');
    $passwordCheck = filter_input(INPUT_POST, 'passwordCheck');
        if($password != $passwordCheck){
        $error["password"] = "Les mots de passe ne correspondent pas";
        }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    //PROFIL PICTURE
    $picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
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
        } catch (\Throwable $th) {
        $error = $th->getMessage();
        }

        if (empty($error)) {
            $user = new Users;
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setEmail($email);
            $user->setPassword($passwordHash);
            $user->setPicture($fileName);
            $response = $user->insert();
    
            if ($response) {
                header('location: /controllers/signInCtrl.php');

            }
        }
    }
}catch (\Throwable $th) {
    var_dump($th);
}

// Rendu des vues concernées
include(__DIR__ . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(__DIR__ . '/../views/user/signUp.php');
} else {
    include(__DIR__ . '/../views/user/display.php');
}