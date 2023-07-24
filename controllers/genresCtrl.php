<?php

$footer = true;
$stylesheet = 'films.css';
require_once __DIR__ . '/../models/Types.php';
require_once __DIR__ . '/../config/config.php';




$genres = Genres::getAll();

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/addMedias.php');
include(__DIR__ . '/../views/templates/footer.php');