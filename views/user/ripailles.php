<?php
?>

<h2>R.I.Pailles</h2>
<div class="container" id="cards">
    <div class="card">
        <img src="/public/assets/img/341X192/feves d'hannibal.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Les fèves d'hannibal Lecter </h5>
            <p class="card-text">Purée de gourganes fraîches aux oignons verts et à l’aneth</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/crevettes BeetleJuice.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Les crevettes géantes de Beetlejuice</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/ailes de poulet Susperia.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Les ailes de poulet dans Suspiria</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
</div>
