<!-- <a href="/controllers/addUserCtrl.php">Ajouter un utilisateur</a> --><!-- PREMIER CONTAINER -->


<!--CATEGORIES-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<h1>Vos catégories préférées</h1>
<div class="container">
<a href="/controllers/ripaillesCtrl.php?id=<?= $recipes->id_recipes ?>">
    <div class="card" style="width: 18rem">
        <img src="/public/assets/img/SERIES/Hannibal/hannibal1.webp" class="object-fit-fill border rounded" alt="..." />
        <div class="card-body">
            <p class="card-text text-center">R.I.Pailles</p>
        </div>
    </div></a>
    <a href="/controllers/sandwishsCtrl.php?id=<?= $recipes->id ?>">
    <div class="card" style="width: 18rem">
        <img src="/public/assets/img/SERIES/Friends/ross sandwish.png" class="object-fit-fill border rounded" alt="..." />
        <div class="card-body">
            <p class="card-text text-center">Mon sandwish</p>
        </div>
    </div></a>
    <a href="/controllers/desperaterecipesCtrl.php?id=<?= $recipes->id ?>">
    <div class="card" style="width: 18rem">
        <img src="/public/assets/img/SERIES/Desperate Housewives/bree.jpg" class="object-fit-fill border rounded" alt="..." />
        <div class="card-body">
            <p class="card-text text-center">Recettes désesperées</p>
        </div>
    </div></a>
</div>


<!-- PREMIER CAROUSEL -->
<h2>Les TOP de la semaine</h2>
<div class="wrapper">
  <section id="section1">
    <a href="#section3" class="arrow__btn">‹</a>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/hannibal.webp" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/izombie.webp" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/breaking bad.jpg" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/ross sandwish.webp" alt="Describe Image">
    </a>
  </div>

  
    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/rachel fiancier.webp" alt="Describe Image">
    </a>
  </div>

    <a href="#section2" class="arrow__btn">›</a>
  </section>


  <section id="section2">
    <a href="#section1" class="arrow__btn">‹</a>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/american pie.jpg" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/avengers.jpg" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/stranger things.jpg" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/riverdale.jpg" alt="Describe Image">
    </a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/chihiro.jpg" alt="Describe Image">
    </a>
  </div>


    <a href="#section3" class="arrow__btn">›</a>
  </section>
  <section id="section3">
    <a href="#section2" class="arrow__btn">‹</a>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/bree.webp" alt="Describe Image">
    <a href=""></a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">

    <img src="/public/assets/img/imgs/true blood.jpg" alt="Describe Image">
    <a href=""></a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/kung fu panda.jpg" alt="Describe Image">
    <a href=""></a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/cookies walking dead.webp" alt="Describe Image">
    <a href=""></a>
  </div>

    <div class="item">
    <a href="/controllers/recipeCtrl.php?id=<?= $recipes->id ?>">
    <img src="/public/assets/img/imgs/pulp fiction.jpg" alt="Describe Image">
    <a href=""></a>
  </div>

    <a href="#section1" class="arrow__btn">›</a>
  </section>
</div>
