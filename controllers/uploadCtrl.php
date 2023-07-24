<?php

require_once __DIR__ .'/../config/config.php';

try {
    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        var_dump($_FILES);
        try {
            
            if(!isset($_FILES['profile'])){
                throw new Exception("Le champ profile n'existe pas");
            }

            if( $_FILES['profile']['error'] != 0 ){
                throw new Exception("Une erreur est survenue lors du transfert");
            }

            if( $_FILES['profile']['type'] != 'image/jpeg' ){
                throw new Exception("Ce fichier n'est pas au bon format");
            }

            if( $_FILES['profile']['size'] > MAX_FILESIZE ){
                throw new Exception("Ce fichier est trop volumineux");
            }

            $from = $_FILES['profile']['tmp_name'];
            $extension = pathinfo($_FILES['profile']['name'] , PATHINFO_EXTENSION);

            $filename_original = uniqid('profile_') . '.' .$extension;
            $to = $_SERVER["DOCUMENT_ROOT"] .'/public/uploads/users/'.$filename_original;
            // $to = __DIR__ .'/../public/uploads/users/image.jpg';
            move_uploaded_file($from, $to);

            $filename = $to;
            $gdImage_original = imagecreatefromjpeg($filename);

            $width_original = getimagesize($filename)[0];
            $height_original = getimagesize($filename)[1];

            if( $width_original < 300 || $height_original < 300  ){
                throw new Exception("Image trop petite");
            }


            if($height_original > $width_original){
                $width = 300;
                $height = (int) round(($height_original*$width) / $width_original); //-1
            } else { //paysage
                $height = 192;
                $width = (int) round(($width_original*$height) / $height_original);
            }

            $type = IMG_BICUBIC; //IMG_NEAREST_NEIGHBOUR, IMG_BILINEAR_FIXED, IMG_BICUBIC, IMG_BICUBIC_FIXED ;

            $gdImage_scaled = imagescale($gdImage_original, $width, $height, $type);

            // imagejpeg($gdImage_scaled, $to);

            $size = 300;
            $x = ($width/2) - ($size/2);
            $y = ($height/2) - ($size/2);

            $gdImage_cropped = imagecrop($gdImage_scaled, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
            
            imagejpeg($gdImage_cropped, $to);

        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
    
    }
} catch (\Throwable $th) {
    var_dump($th);
}






include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/upload.php';
include __DIR__ . '/../views/templates/footer.php';