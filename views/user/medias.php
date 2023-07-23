<!-- <h2>Les Films</h2>
<h2>Les Séries</h2> -->

<div class="container" id="cards">
    <div class="row justify-content-center">
        <?php
        foreach ($medias as $media) { ?>
            <div class="card col-12 col-sm-6 col-md-4 col-lg-3 ">
                <img src="/public/uploads/gallery/medias/<?= $media->picture ?>" class="card-img-top h-75" alt="">
                <div class="card-body">
                    <h5 class="card-title h-30"><?= $media->title ?></h5>
                    <a href="/controllers/recipesMediaCtrl.php?id_medias=<?= $media->id_medias ?>" class="btn btn-warning">Les recettes</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>