

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
<h2>Liste des médias</h2>
<div id="results">
    <table class="table table-hover">

        <thead>
            <tr class="table-dark">
                <th scope="col">Nom du média</th>
                <th scope="col">Supprimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($medias as $media) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $media->title ?></th>
                    <td><a href="/controllers/mediasListCtrl.php?id=<?= $media->id_medias ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                <a href="/controllers/mediasListCtrl.php?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $nbrPages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($page == $page) ? "active" : "" ?>">
                    <a id="page" href="/controllers/mediasListCtrl.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $nbrPages) ? "disabled" : "" ?>">
                <a href="/controllers/mediasListCtrl.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>