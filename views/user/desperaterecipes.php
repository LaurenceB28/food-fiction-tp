<?php
?>

<h2>Recettes deseperées</h2>
<div class="container" id="cards">
    <div class="card">
        <img src="/public/assets/img/341X192/gateau ananas bree.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Gateau renversé à l'ananas de Bree Van De Kamp </h5>
            <p class="card-text">Purée de gourganes fraîches aux oignons verts et à l’aneth</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/mac&cheese bree.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Mac&Cheese Bree Van De Kamp</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/muffin bree.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Les muffins de Bree Van De Kamp</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
</div>