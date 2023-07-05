<h2>Liste des recettes</h2>

<!-- <div>
    <button type="button" id="addRecipes" class="sticky btn btn-lg btn-info">
        <a href="/controllers/addRecipesCtrl.php" id="add-btn">Ajouter</a>
    </button>
</div> -->
<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <div>
        <button type="button" id="back" class="fixed-bottom btn btn-lg btn-warning">
            <a href="/controllers/recipesListCtrl.php" id="back-btn">Retour</a>
        </button>
    </div>
<?php } ?> -->
<div id="results">
    <table class="table table-hover">

        <thead>
            <tr class="table-dark">
                <th scope="col">Nom de la recette</th>
                <th scope="col">Supprimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($recipes as $recipe) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $recipe->title ?></th>
                    <td><a href="/controllers/recipesListCtrl.php?id=<?= $recipe->id_recipes ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                <a href="/controllers/recipesListCtrl.php?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $nbrPages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($page == $page) ? "active" : "" ?>">
                    <a id="page" href="/controllers/recipesListCtrl.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $nbrPages) ? "disabled" : "" ?>">
                <a href="/controllers/recipesListCtrl.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>