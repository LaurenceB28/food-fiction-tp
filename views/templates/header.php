<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fontawesome.com/icons/facebook?f=brands&s=solid&pc=%23ffffff" />
    <link rel="stylesheet" href="https://fontawesome.com/icons/instagram?f=brands&s=solid&pc=%23ffffff" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swarel=stylesheet" />
    <link rel="stylesheet" href="/public/assets/css/style.css" />
    <?php
    if (isset($stylesheet)) {
        echo '<link rel="stylesheet" href="/public/assets/css/' . $stylesheet . '"> ';
    }
    ?>
    <title>Food Fiction</title>
</head>

<body>
        <!-- HEADER -->
        <header>
        <div class="header">
            <img id="logo" src="/public/assets/img/logo/LOGO Food Fiction.png" alt="" />
        </div>
    </header>
    <!-- Navbar -->
    <?php 
    include(__DIR__ . '/../templates/navbar.php');
    ?>