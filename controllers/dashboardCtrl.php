<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Recipes.php';
require_once __DIR__ . '/../config/config.php';

include(__DIR__ . '/../views/templates/header.php');
include __DIR__ . '/../views/user/dashboard.php';

