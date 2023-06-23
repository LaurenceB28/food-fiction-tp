<?php
define('DNS','mysql:dbname=food-fictions;host=127.0.0.1');
define('USER',  'food-fictions');
define('PASSWORD',  'dY6tLuXNCclXEtEz');

define('REGEX_NO_NUMBER',"^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_TEXTAREA','^[a-zA-Z\n\r]*$');
define('AUTHORIZED_FILES_FORMAT', ['image/jpeg', 'image/png', 'image/pdf']);