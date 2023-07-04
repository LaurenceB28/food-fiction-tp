<?php

require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/config.php';

$users= Users::getAll();

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/user/dashboard.php');
include(__DIR__ . '/../views/user/usersList.php');
include(__DIR__ . '/../views/templates/footer.php');