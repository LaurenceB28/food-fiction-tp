<h2>Ajouter un Média</h2>
<form method="post" enctype="multipart/form-data">

    <div class="form-group-mb-3">
        <label for="type" class="form-label">Type de média* :</label>
        <div class="form-check">
            <input class="form-check-input" name="type" id="type" type="radio" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Série
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="type" id="type" type="radio" value="2" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Film
            </label>
        </div>

        <label for="title" class="form-label">Genres* (vous pouvez cocher plusieurs cases) :</label>
        <?php
        foreach ($genreAll as $genre) { ?>
            <div class="form-check">
                <input class="form-check-input" name="genres[]" type="checkbox" value="<?= $genre->id_genres ?>" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"><?= $genre->genre ?></label>
            </div>
        <?php } ?>
        <label for="title" class="form-label">Nom du média*</label>
        <input type="textarea" class="form-control" value="<?= $title ?? '' ?>" name="title" placeholder="Nom du média" aria-label="title" maxlength="100" required pattern="<?= REGEX_NO_NUMBER ?>">
    </div>


    <div><?= $error ?? '' ?></div>
    <label for="picture">Photo du Média</label>
    <!-- <input type="file" name="picture" id="picture" required accept="image/jpeg, image/jpg, image/png, image/webp"> -->
    <input type="file" name="picture" id="picture" required accept="image/*">
    <!-- <input type="submit" value="Envoyer"> -->
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php
if (isset($block)) {
    if ($block == 1) : ?>
        <div class="alert alert-danger"><?= $message ?></div>
    <?php else : ?>
        <div class="alert alert-success"><?= $message ?>
        </div>
    <?php endif ?>
<?php } ?>
<!-- <input type="textarea" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $title ?>" name="title" placeholder="Nom du média" aria-label="title" maxlength="25" required pattern="<?= REGEX_NO_NUMBER ?>"> -->