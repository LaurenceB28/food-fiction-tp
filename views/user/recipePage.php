<?php ?>
<div class="container">
    <h5>Nom de la recette</h5>
    <?php foreach ($recipes as $recipe) { ?>
        <h5><?= $repcipe->title ?></h5>
    <?php } ?>


    <div class="rounded-12 overflow-hidden position-relative">
        <!-- <?php foreach ($recipes as $recipe) { ?>
        <img src="<?= $repcipe->picture ?>" alt="">
        <?php } ?>     -->
        <img src="/public/assets/img/341X192/super moelleux ross.jpg" alt="">
    </div>


    <h5>Ingredients</h5>
    <?php foreach ($recipes as $recipe) { ?>
        <h5><?= $repcipe->ingredient ?></h5>
    <?php } ?>

    <h5>Préparation</h5>
    <?php foreach ($recipes as $recipe) { ?>
        <h5><?= $repcipe->description ?></h5>
    <?php } ?>

</div>

<button onclick="onclick()" class="like__btn justify-content-center">
    <span id="icon"><svg xmlns="http://www.w3.org/2000/svg" id="monSVG" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
        </svg></span>
    <span id="count">0</span> Like
</button>


<div class="col-md-6">
    <h6>Ingredients</h6>
    <?php foreach ($recipes as $recipe) { ?>
        <ul>
            <li><?= $recipe->ingredient ?></li>
        </ul>
    <?php } ?>

</div>
<div class="col-md-6">
    <h6>Préparation</h6>
    <?php foreach ($recipes as $recipe) { ?>
        <ul>
            <li><?= $recipe->description ?></li>
        </ul>
    <?php } ?>
</div>