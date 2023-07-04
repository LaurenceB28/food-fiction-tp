<?php

?>

<h3>Liste des utilisateurs</h3>

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
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Mail</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Supprimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($users as $user) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $user->firstname ?></th>
                    <th scope="row"><?= $user->lastname ?></th>
                    <th scope="row"><?= $user->email ?></th>
                    <th scope="row"><?= $user->pseudo ?></th>

                    <td><a href="/controllers/usersListCtrl.php?id=<?= $recipe->id_recipes ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page == 1) ? "disabled" : "" ?>">
                <a href="/controllers/usersListCtrl.php?page=<?= $page - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $nbrPages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($page == $page) ? "active" : "" ?>">
                    <a id="page" href="/controllers/usersListCtrl.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $nbrPages) ? "disabled" : "" ?>">
                <a href="/controllers/usersListCtrl.php?page=<?= $page + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>