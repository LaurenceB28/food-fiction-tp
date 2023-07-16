<?php if (isset($errors['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errors['global']) ?>
</div>

<?php } ?>

<form method="post" enctype="multipart/form-data">
    <h2>Modifier la recette</h2>

    <label for="recipes">Recettes:</label>
    <select class="form-select" name="recipes" id="recipes-select">
        <option value="">--Choisissez la recette--</option>
        <?php foreach ($recipes as $recipe) { ?>
            <option value="<?= $recipe->id_recipes ?>"><?= $recipe->title ?></option>
        <?php } ?>
    </select>
    <div class="form-group-mb-3">
        <label for="ingredient" class="form-label">Liste des ingredients*</label>
        <textarea class="form-control <?= isset($errors['ingredient']) ? 'is-invalid' : '' ?>" value="<?= $ingredient ?? '' ?>" name="ingredient" id="ingredient" rows="3" placeholder="Liste des ingrédients" required pattern="<?= REGEX_NO_NUMBER ?>"></textarea>
        <!-- <input type="textarea" name="ingredient" class="form-control" placeholder="Liste des ingrédients" aria-label="ingredient" maxlength="50" required> -->
    </div>
    <div class="form-group-mb-3">
        <label for="description" class="form-label">Les étapes de préparations</label>
        <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" value="<?= $description ?? '' ?>" name="description" id="description" rows="3" placeholder="Les étapes de préparation" required pattern="<?= REGEX_NO_NUMBER ?>"></textarea>
        <!-- <input type="text" name="description" class="form-control" placeholder="Description" aria-label="description" maxlength="25" required> -->
    </div>

    <!-- <div><?= $error ?? '' ?></div> -->
    <label for="picture">Photo de le recette</label>
    <input type="file" name="picture" id="picture" required accept="image/*">
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php
if (isset($block)) {
    if ($block == 1) : ?>
        <div class="alert alert-danger"><?= $message ?? '' ?></div>
    <?php else : ?>
        <div class="alert alert-success"><?= $message ?? '' ?>
        </div>

    <?php endif ?>
<?php } ?>