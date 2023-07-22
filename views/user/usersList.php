<?php

?>

<h2>Liste des utilisateurs</h2>


<div id="results">
    <table class="table table-hover">

        <thead>
            <tr class="table-dark">
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Mail</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
                <th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($users as $user) { ?>
                <tr class="table-light">
                    <th scope="row"><?= $user->lastname ?></th>
                    <th scope="row"><?= $user->firstname ?></th>
                    <th scope="row"><?= $user->email ?></th>
                    <!-- <th scope="row"><?= $user->pseudo ?></th> -->
                    <td><a href="/controllers/updateUserCtrl.php?id_users=<?= $user->id_users ?>"><span class="btn btn-outline-info border border-info">Modifier</span></a></td>

                    <td><a href="/controllers/deleteUserCtrl.php?id_users=<?= $user->id_users ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="/controllers/usersListCtrl.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
            </li>
            <?php for ($page = 1; $page <= $nbPages; $page++) : ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a id="page" href="/controllers/usersListCtrl.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>">
                <a href="/controllers/usersListCtrl.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>