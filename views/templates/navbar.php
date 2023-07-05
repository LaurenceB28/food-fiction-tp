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
                    <a class="nav-link" href="#">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/controllers/signInCtrl.php">Connexion</a>
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
            <!-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline--bs-primary-bg-subtle" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form> -->
        </div>
    </div>
</nav>