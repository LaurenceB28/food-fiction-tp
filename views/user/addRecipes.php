<form method="post">
    <h2>Ajouter une recette</h2>
    <div class="form-group-mb-3">
        <label for="title" class="form-label">Nom de la recette*</label>
        <input type="textarea" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?=$title ?? '' ?>" name="title"  placeholder="Nom de la recette" aria-label="title" maxlength="25" required pattern="<?= REGEX_NO_NUMBER ?>">
    </div>
    <div class="form-group-mb-3">
        <label for="ingredient" class="form-label">Liste des ingredients*</label>
        <textarea class="form-control <?= isset($errors['ingredient']) ? 'is-invalid' : '' ?>" value="<?=$ingredient ?? '' ?>" name="ingredient" id="ingredient" rows="3"  placeholder="Liste des ingrédients" required pattern="<?= REGEX_NO_NUMBER ?>"></textarea>
        <!-- <input type="textarea" name="ingredient" class="form-control" placeholder="Liste des ingrédients" aria-label="ingredient" maxlength="50" required> -->
    </div>
    <div class="form-group-mb-3">
        <label for="description" class="form-label">Les étapes de préparations</label>
        <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" value="<?=$description ?? '' ?>" name="description" id="description" rows="3" placeholder="Les étapes de préparation" required pattern="<?= REGEX_NO_NUMBER ?>"></textarea>
        <!-- <input type="text" name="description" class="form-control" placeholder="Description" aria-label="description" maxlength="25" required> -->
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>

    <?php
    if(isset($block)){
    if ($block == 1) : ?>
        <div class="alert alert-danger"><?= $message ?? '' ?></div>
    <?php else : ?>
        <div class="alert alert-success"><?= $message ?? '' ?>
        </div>
        
    <?php endif ?>
    <?php } ?>