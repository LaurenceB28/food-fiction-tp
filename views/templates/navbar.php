<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/controllers/homeCtrl.php">
            <img src="/public/assets/img/logo/LOGO_Food_Fiction.png" id="logoNav" alt="logo" /></a>
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
                    <a class="nav-link" href="/controllers/userDashboardCtrl.php">Mon espace</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/controllers/signInCtrl.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/signInCtrl.php">Déconnecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/signUpCtrl.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/dashboardCtrl.php">Dashboard</a>
                </li>
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