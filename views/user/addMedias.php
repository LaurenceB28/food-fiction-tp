<form method="post">
    <h2>Ajouter un Média</h2>
    <div class="form-group-mb-3">
        <div class="form-check">
            <input class="form-check-input" name="type" id="type" type="checkbox" value="<?= $type ?? '' ?>" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Série
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="type" id="type" type="checkbox" value="<?= $type ?? '' ?>" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Film
            </label>
        </div>
        <label for="title" class="form-label">Nom du média*</label>
        <input type="textarea" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $title ?? '' ?>" name="title" placeholder="Nom du média" aria-label="title" maxlength="25" required pattern="<?= REGEX_NO_NUMBER ?>">
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>

    <?php
    if (isset($block)) {
        if ($block == 1) : ?>
            <div class="alert alert-danger"><?= $message ?? '' ?></div>
        <?php else : ?>
            <div class="alert alert-success"><?= $message ?? '' ?>
            </div>

        <?php endif ?>
    <?php } ?>