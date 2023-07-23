<h2>Les recettes</h2>
<div class="container" id="cards">
    <?php foreach ($recipes as $recipe) { ?>
        <div class="card col-12 col-sm-6 col-md-4 col-lg-4">
            <img src="/public/uploads/gallery/medias/<?= $recipe->recipePicture ?>" class="card-img-top h-75" alt="">
            <div class="card-body ">
                <h5 class="card-title h-30"><?= $recipe->recipeName ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="/controllers/recipePageCtrl.php?id_recipes=<?= $recipe->id_recipes ?>" class="btn btn-warning">La recette</a>
            </div>
        </div>
    <?php } ?>
</div>