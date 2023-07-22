<?php
$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/config.php';

session_start();

$id_users = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$users = Users::getAll($id_users);

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/user/userDashboard.php';
include __DIR__ . '/../views/user/userInfos.php';