<?php
//RAPPEL FICHIER CSS
$stylesheet = 'contact.css';

//UPLOADS FILES
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['filePicture'])) {
        $filePicture = $_FILES['filePicture'];
        if (!empty($filePicture['tmp_name'])) {
            if ($filePicture['error'] > 0) {
                $error["filePicture"] = "erreur lors du transfert du fichier";
            } else {
                if (!in_array($filePicture['type'], AUTHORIZED_FILES_FORMAT)) {
                    $error["filePicture"] = "Le format du fichier n'est pas accepté";
                } else {
                    $extension = pathinfo($filePicture['name'], PATHINFO_EXTENSION);
                    $from = $filePicture['tmp_name'];
                    $fileName = uniqid('img_') . '.' . $extension;
                    $to = __DIR__ . '/../public/uploads/' . $fileName;
                    move_uploaded_file($from, $to);
                }
            }
        }
    }
}

// Rendu des vues concernées
include(__DIR__ . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(__DIR__ . '/../views/user/contactForm.php');
} else {
    include(__DIR__ . '/../views/user/display.php');
}
