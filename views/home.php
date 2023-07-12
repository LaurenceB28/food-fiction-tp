<!-- <a href="/controllers/addUserCtrl.php">Ajouter un utilisateur</a> --><!-- PREMIER CONTAINER -->


<!--CATEGORIES-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<h1>Vos catégories préférées</h1>
<div class="container">
  <a href="/controllers/recipesGenresCtrl.php?genre=9">
    <div class="card" style="width: 18rem">
      <img src="/public/assets/img/SERIES/Hannibal/hannibal1.webp" class="object-fit-fill border rounded" alt="..." />
      <div class="card-body">
        <p class="card-text text-center">R.I.Pailles</p>
      </div>
    </div>
  </a>
  <a href="/controllers/recipesGenresCtrl.php?genre=2">
    <div class="card" style="width: 18rem">
      <img src="/public/assets/img/SERIES/Friends/ross sandwish.png" class="object-fit-fill border rounded" alt="..." />
      <div class="card-body">
        <p class="card-text text-center">Mon sandwish</p>
      </div>
    </div>
  </a>
  <a href="/controllers/recipesGenresCtrl.php?genre=21">
    <div class="card" style="width: 18rem">
      <img src="/public/assets/img/SERIES/Desperate Housewives/bree.jpg" class="object-fit-fill border rounded" alt="..." />
      <div class="card-body">
        <p class="card-text text-center">Recettes désesperées</p>
      </div>
    </div>
  </a>
</div>


<!-- PREMIER CAROUSEL -->
<h2>Les TOP de la semaine</h2>
<div class="wrapper">
  <section id="section1">
    <a href="#section3" class="arrow__btn">‹</a>

    
    <?php
foreach ($recipes as $recipe) {?>
  <div class="item">
  <a href="/controllers/recipePageCtrl.php?=<?php $recipe->id_recipes?>">
        <img src="<?php $recipe->picture ?>" alt="Describe Image">
      </a>
    </div>
<?php } ?>

  <!-- <div class="item">
    <a href="/controllers/recipeCtrl.php?genre=2">
    <img src="/public/assets/img/imgs/rachel fiancier.webp" alt="Describe Image">
    </a>
  </div> -->

    <a href="#section2" class="arrow__btn">›</a>
  </section>


  <section id="section2">
    <a href="#section1" class="arrow__btn">‹</a>
<?php
foreach ($medias as $media) {?>
  <div class="item">
  <a href="/controllers/recipePageCtrl.php?=<?php $recipe->id_recipes?>">
        <img src="<?php $media->picture ?>" alt="Describe Image">
      </a>
    </div>
<?php } ?>
    

    <!-- <div class="item">
      <a href="/controllers/recipeCtrl.php?genre=6">
        <img src="/public/assets/img/imgs/avengers.jpg" alt="Describe Image">
      </a>
    </div> -->


    <a href="#section3" class="arrow__btn">›</a>
  </section>
  <section id="section3">
    <a href="#section2" class="arrow__btn">‹</a>

    <?php
foreach ($medias as $media) {?>
  <div class="item">
  <a href="/controllers/recipePageCtrl.php?=<?php $recipe->id_recipes?>">
  <a href="/controllers/recipePageCtrl.php?=<?php $recipe->id_medias?>">
        <img src="<?php $media->picture ?>" alt="Describe Image">
      </a>
    </div>
<?php } ?>

    <!-- <div class="item">
      <a href="/controllers/recipeCtrl.php?genre=21">
        <img src="/public/assets/img/imgs/bree.webp" alt="Describe Image">
        <a href=""></a>
    </div>-->

    <a href="#section1" class="arrow__btn">›</a>
  </section>
</div>