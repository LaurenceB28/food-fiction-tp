<?php
session_start();
// var_dump($_SESSION['user']);
if (empty($_SESSION['user'])) {
    header('location: /controllers/signInCtrl.php');
    die;
} else {


    include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/home.php');
    include(__DIR__ . '/../views/templates/footer.php');
}
