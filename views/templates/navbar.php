
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/controllers/homeCtrl.php">
            <img src="/public/assets/img/logo/LOGO_Food_Fiction.png" id="logoNav" alt="logo" />Food Fictions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/mediasCtrl.php?type=2">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/mediasCtrl.php?type=1">Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/user_recipesCtrl.php">Mes Favoris</a>
                </li>

                <?php
                if (isset($_SESSION['user']) && $_SESSION['user'] -> role == 1) { //Sinon s'il y a une session alors on verra les liens ci-dessous
                ?>
                    <li class="nav-item"><a class="nav-link" href="/controllers/dashboardCtrl.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="/controllers/logOutCtrl.php">Déconnexion</a></li>
                <?php
                } elseif (isset($_SESSION['user']) && !$_SESSION['user']-> role ) { //Sinon s'il y a une session alors on verra les liens ci-dessous
                ?>
                    <li class="nav-item"><a class="nav-link" href="/controllers/userDashboardCtrl.php">Mon compte</a></li>
                    <li class="nav-item"><a class="nav-link" href="/controllers/logOutCtrl.php">Déconnexion</a></li>
                <?php
                } else {
                ?>
                    <li class="nav-item"><a class="nav-link" href="/controllers/signUpCtrl.php">Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="/controllers/signInCtrl.php">Connexion</a></li>
                <?php
                }
                ?>
            </ul>
            <div>
                <form method="post" class="d-flex" role="search"> <!-- method="post" pour $_SERVER request method, recupère les infos du formulaire ou champ de recherche-->
                    <input class="form-control-sm-info" type="search" name="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">GO!</button>
                </form>
            </div>
        </div>
    </div>
</nav>