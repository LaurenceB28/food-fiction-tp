<form class="form" action="" method="get" enctype="multipart/form-data">
    <div class="col-12 col-md-6">
        <div class="card bg-dark text-white">
            <div class="card-body text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Contact
                        <div class="logoCenter">
                            <img src="/public/assets/img/logo/LOGO_Food_Fiction.png" id="logo" alt="" />
                        </div>
                    </h2>
                    <div class="col p-2">
                        <label class="form-label" for="Email">Email</label>
                        <input type="Email" name="Email" id="Email" placeholder="Email" class="form-control" />
                    </div>
                    <div class="col p-2">
                        <label for="exampleFormControlTextarea1" name="Contact" id="Contact" class="form-label">Votre recette ICI :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre recette ..." rows="8"></textarea>
                    </div>
                    <p>Ou votre recette ICI :</p>
                    <input type="file" id="file" name="file" accept="image/png, image/jpeg, image/pdf">
                    <div  class="col p-2">
                        <button class="btn btn-outline-warning btn-md px-3" type="submit">Envoyer</button>
                    </div>
                    <div>
                        <p class="mb-0">Pas encore de compte? <a href="/controllers/signUpCtrl.php" class="text-white-50 fw-bold">S'inscrire</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>