<?php
// require_once(__DIR__ . '/../helpers/SessionFlash.php');
// SessionFlash::start();
define('DNS','mysql:dbname=food-fictions;host=127.0.0.1');
define('USER',  'root');
define('PASSWORD',  '');
// define('PASSWORD',  'dY6tLuXNCclXEtEz');

define('NB_ELEMENTS_BY_PAGE', 10);
define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');
define('AUTHORIZED_FILES_FORMAT', ['image/jpeg', 'image/png', 'image/pdf']);