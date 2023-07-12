<!-- <h2>Les Films</h2> -->

<div class="container" id="cards">
    <div class="row justify-content-center">
        <?php
        foreach ($medias as $media) { ?>
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
                <img src="<?php $medias->picture ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $media->title ?></h5>
                    <a href="/controllers/recipePageCtrl.php?id=<?= $media->id_medias ?>" class="btn btn-primary">Les recettes</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>