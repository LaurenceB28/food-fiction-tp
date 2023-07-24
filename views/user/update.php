<!-- <?php if (isset($errors['global'])) { ?>

<div class="alert alert-warning" role="alert">
    <?= nl2br($errors['global']) ?>
</div>

<?php } ?> -->

<form method="post" enctype="multipart/form-data">
    <h2>Modifier la recette</h2>

    <label for="recipes">Recettes:</label>
    <select class="form-select" name="recipes" id="recipes-select">
        <option value="">-- Choisissez la recette --</option>
        <?php foreach ($allRecipes as $recipe) {
            $isSelected = ($recipe->id_recipes == $id_recipes) ? 'selected' : '';
            ?>
            <option <?= $isSelected ?> value="<?= $recipe->id_recipes ?>"><?= $recipe->title ?></option>
        <?php } ?>
    </select> 
    <div class="form-group-mb-3">
        <label for="ingredient" class="form-label">Liste des ingredients*</label>
        <textarea class="form-control <?= isset($errors['ingredient']) ? 'is-invalid' : '' ?>"  name="ingredient" id="ingredient" rows="3" placeholder="" required pattern="<?= REGEX_TEXTAREA ?>"><?= $recipe->ingredient ?></textarea>
    </div>
    <div class="form-group-mb-3">
        <label for="description" class="form-label">Les étapes de préparations*</label>
        <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>"  name="description" id="description" rows="3" placeholder="" required pattern="<?= REGEX_TEXTAREA ?>"><?= $recipe->description  ?></textarea>
    </div>
    <!-- <div><?= $error ?? '' ?></div> -->
    <!-- <label for="picture">Photo de la recette</label>
    <input type="file" name="picture" id="picture"  accept="image/*"> -->
    <button type="submit" class="btn btn-primary">Modifier</button>
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