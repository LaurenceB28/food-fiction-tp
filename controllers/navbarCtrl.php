<?php
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/config.php';

$id_users = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$users = Users::getAll($id_users);
