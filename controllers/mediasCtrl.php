<?php
$footer = true;
$stylesheet = 'medias.css';
require_once __DIR__ . '/../models/Types.php';
require_once __DIR__ . '/../models/Medias.php';
require_once __DIR__ . '/../models/Recipes.php';

session_start(); 

require_once __DIR__ . '/../config/config.php';
$medias = filter_input(INPUT_GET, 'media', FILTER_SANITIZE_SPECIAL_CHARS);
$type = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));
$picture = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);

$mediaRecipes = Recipes::getAllbyMedias($medias);
$medias = Medias::getAll($type);


include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/templates/navbar.php');
include(__DIR__ . '/../views/user/medias.php');
include(__DIR__ . '/../views/templates/footer.php');