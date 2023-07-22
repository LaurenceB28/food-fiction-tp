<?php
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../models/Users_recipes.php';
require_once __DIR__ . '/../config/config.php';

session_start();

// $role = intval(filter_input(INPUT_GET, 'role', FILTER_SANITIZE_NUMBER_INT));
// $id_users = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
// $users = Users::getAll($id_users);


include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/templates/home.php');
include(__DIR__ . '/../views/templates/footer.php');