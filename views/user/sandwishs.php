<?php
?>

<h2>Mon sandwish</h2>
<div class="container" id="cards">
    <div class="card">
        <img src="/public/assets/img/341X192/super moelleux ross.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Le super moelleux de Ross </h5>
            <p class="card-text">Purée de gourganes fraîches aux oignons verts et à l’aneth</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id_medias ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/grilled cheese glee.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Le grilled cheese de Glee</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id_medias ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
    <div class="card">
        <img src="/public/assets/img/341X192/sandwish boulettes joey.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Le sandwish de Joey</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id_medias ?>" class="btn btn-primary">La recette</a>
        </div>
    </div>
</div>
