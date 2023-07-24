<?php

$footer = true;
$stylesheet = 'dashboard.css';
require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../config/config.php';

session_start();

try {
    // Nettoyage de l'id passé en GET dans l'url
    $id_users = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    /*************************************************************/
    
    $users = Users::getAll($id_users);
    // Si $users vaut false,
    // on stocke un message d'erreur à afficher dans la vue
    if ($users === false) {
        $errors['global'] = ERRORS[3];
    } else {
        //On ne controle que s'il y a des données envoyées 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            /************************* LASTNAME *************************/
            //**** NETTOYAGE ****/
            $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    
            //**** VERIFICATION ****/
            if (empty($lastname)) {
                $errors['lastname'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_STR_NO_NUMBER . '/')));
                if (!$isOk) {
                    $errors['lastname'] = 'Merci de choisir un nom valide';
                }
            }
            /***********************************************************/
    
    
            /************************* FIRSTNAME ***********************/
            //**** NETTOYAGE ****/
            $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));
    
            //**** VERIFICATION ****/
            if (empty($firstname)) {
                $errors['firstname'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEXP_STR_NO_NUMBER . '/')));
                if (!$isOk) {
                    $errors['firstname'] = 'Le prénom n\'est pas valide';
                }
            }
            /***********************************************************/
    
            /*************************** MAIL **************************/
            //**** NETTOYAGE ****/
            $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    
            //**** VERIFICATION ****/
            if (empty($mail)) {
                $errors['mail'] = 'Le champ est obligatoire';
            } else {
                $isOk = filter_var($mail, FILTER_VALIDATE_EMAIL);
                if (!$isOk) {
                    $errors['mail'] = 'Le mail n\'est pas valide';
                }
                // Si le mail de l'input est nouveau ET qu'il existe déjà en bdd, --> Erreur
                if ($mail != $patient->mail && Users::getByMail($email)) {
                    $errors['mail'] = ERRORS[5];
                }
            }
            /***********************************************************/
    
            // Si il n'y a pas d'erreurs, on met à jour le patient.
            if (empty($errors)) {
                
                //**** HYDRATATION ****/
                $users = new Users;
                $users->setLastname($lastname);
                $users->setFirstname($firstname);
                $users->setEmail($email);
                $users = $users->update($id_users);
    
                if($users){
                    $errors['global'] = MESSAGES[1];
                } else {
                    $errors['global'] = ERRORS[4];
                }    
            }
        }
    }
    // On récupère les données de l'utilisateur mis à jour
    $users = Users::getAll($id_users);
} catch (\Throwable $th) {
    var_dump($th);
    // header('Location: /error.php');
    die;
}


include __DIR__ . '/../views/templates/header.php';
include(__DIR__ . '/../views/templates/navbar.php');
include __DIR__ . '/../views/user/userDashboard.php';
include __DIR__ . '/../views/user/updateUser.php';