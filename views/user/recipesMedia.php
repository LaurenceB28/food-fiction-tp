<?php
?>

<div class="container" id="cards">
    <div class="row justify-content-center">
        <?php foreach ($recipes as $recipe) { ?>
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="<?= $recipe->picture ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title"><?= $recipe->recipeName ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/controllers/recipesPageCtrl.php?id_recipes=<?= $recipe->id_medias ?>" class="btn btn-primary">La recette</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>