<?php
//RAPPEL FICHIER CSS
$stylesheet = 'login.css';

//EMAIL
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    if ($password != $passwordCheck) {
        $error["password"] = "Les mots de passe ne correspondent pas";
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
}

// Rendu des vues concernées
include(__DIR__ . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(__DIR__ . '/../views/user/signIn.php');
} else {
    include(__DIR__ . '/../views/user/display.php');
}
