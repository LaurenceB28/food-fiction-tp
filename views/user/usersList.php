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
                    <td><a href="/controllers/recipeCtrl.php?id=<?= $user->id_users ?>"><span class="btn btn-outline-info border border-info">Modifier</span></a></td>

                    <td><a href="/controllers/usersListCtrl.php?id_users=<?= $user->id_users ?>"><span class="btn btn-outline-danger border border-danger">Supprimer</span></a></td>
                    <td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination pagination-lg">
            <?php
            for ($page = 1; $page <= $nbPages; $page++) {
                if ($page == $currentPage) { ?>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                            <?= $page ?>
                            <span class="visually-hidden">(current)</span>
                        </span>
                    </li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="?currentPage=<?= $page ?>&search=<?= $search ?>"><?= $page ?></a></li>
            <?php }
            } ?>
        </ul>
    </nav>