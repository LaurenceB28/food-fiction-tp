<form class="form" action="" method="post" enctype="multipart/form-data">
    <div class="col-12 col-md-8 col-lg-4">
        <div class="card bg-light text-white">
            <div class="card-body text-center">
                <div class="mb-md-5 mt-md-4 pb-4">
                    <h2 class="fw-bold mb-2 text-uppercase">Inscrivez vous
                        <div class="logo-center">
                            <img id="logo" src="/public/assets/img/logo/LOGO_Food_Fiction.png" alt="" />
                        </div>
                    </h2>
                    <div class="col p-2">
                        <label class="form-label" for="firstname">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Prénom">
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="lastname">Nom de famille</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom de famille">
                    </div>

                    <div class="col p-2">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="email" class="form-control" />
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="typePasswordX">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" />
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="passwordCheck">Confirmer votre mot de passe</label>
                        <input type="password" name="passwordCheck" id="passwordCheck" placeholder="Confirmer votre mot de passe" class="form-control" required />
                    </div>
                    <div class="col p-2">
                        <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">mot de passe oublié?</a></p>
                    </div>
                    <label for="picture">Photo de Profil</label>
                        <input type="file" name="picture" id="picture" required accept="image/*"><br>
                    <button class="btn btn-outline-warning btn-lg px-5" type="submit">Inscription</button>
                </div>
                <div>
                    <p class="mb-0 text-dark">Déja Inscrit? <a href="/controllers/signInCtrl.php" class="text-dark-50 fw-bold">Se connecter</a></p>
                </div>
            </div>
        </div>
    </div>
</form>