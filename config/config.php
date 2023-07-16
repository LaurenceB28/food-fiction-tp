<?php
// require_once(__DIR__ . '/../helpers/SessionFlash.php');
// SessionFlash::start();
define('DNS','mysql:dbname=food-fictions;host=127.0.0.1');
define('USER',  'root');
define('PASSWORD',  '');
// define('PASSWORD',  'dY6tLuXNCclXEtEz');
define('REGEXP_STR_NO_NUMBER','^[A-Za-zéèêëàâäôöûüç\' ]+$');
define('NB_ELEMENTS_BY_PAGE', 10);
define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');
define('AUTHORIZED_FILES_FORMAT', ['image/jpeg', 'image/png', 'image/pdf']);

define('MAX_FILESIZE', 2*1024*1024);

define('MESSAGES', [
    1=>'Recette mise à jour',]);

define('ERRORS', [
    3=>'Recette non trouvée',
    4=>'Aucune mise à jour n\'a été effectuée'
   ]); 