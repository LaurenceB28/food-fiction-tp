<form class="form" action="" method="get">
    <div class="col-12 col-md-8 col-lg-4">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Connectez vous
                        <div class="logoCenter">
                            <img src="/public/assets/img/logo/LOGO_Food_Fiction.png" id="logo" alt="" />
                        </div>
                    </h2>
                    <div class="col p-2">
                        <label class="form-label" for="Email">Email</label>
                        <input type="Email" name="Email" id="Email" placeholder="Email" class="form-control" />
                    </div>
                    <div class="col p-2">
                        <label class="form-label" for="typePasswordX">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" />
                    </div>
                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">mot de passe oublié?</a></p>
                    <button class="btn btn-outline-warning btn-lg px-5" type="submit">connexion</button>
                </div>
                <div>
                    <p class="mb-0">Pas encore de compte? <a href="/controllers/signUpCtrl.php" class="text-white-50 fw-bold">S'inscrire</a></p>
                </div>
            </div>
        </div>
    </div>
</form>