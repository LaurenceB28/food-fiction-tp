<?php
$footer = true;
$stylesheet = 'user_recipes.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../models/Medias.php';




include(__DIR__ . '/../views/templates/header.php');
    include(__DIR__ . '/../views/user/user_recipes.php');
include(__DIR__ . '/../views/templates/footer.php');
