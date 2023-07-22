<?php
require_once __DIR__ . '/../models/Users.php';
$stylesheet = 'form.css';
session_start();
//RAPPEL FICHIER CSS
$stylesheet = 'login.css';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $user = Users::getByMail($email);

    //PASSWORD
    $password = filter_input(INPUT_POST, 'password');
    if ($user != false) {
        if (empty($password)) {
            $error["password"] = "Le mot de passe est  obligatoire!!";
        } else {

            if (password_verify($password, $user->password) == false) {

                $error["password"] = "Les mots de passe ne correspondent pas!!";
            }
        }
    }else{
        $error ["email"] = "l'utilisateur n'existe pas";
    }
    // var_dump($error);
    // die;

    if (empty($error)) {
        $_SESSION['user'] = $user;
        header('location: /controllers/homeCtrl.php');
    }
}


// // Rendu des vues concernées
include __DIR__ . '/../views/templates/header.php';
include(__DIR__ . '/../views/user/signIn.php');
include(__DIR__ . '/../views/user/display.php');

// if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
//     include(__DIR__ . '/../views/user/signIn.php');
// } else {
//     include(__DIR__ . '/../views/user/display.php');
// }
