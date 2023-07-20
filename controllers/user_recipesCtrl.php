<?php
$footer = true;
$stylesheet = 'user_recipes.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../models/Users.php';

$id_users = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$users = Users::getAll($id_users);


include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/user/user_recipes.php');
include(__DIR__ . '/../views/templates/footer.php');
