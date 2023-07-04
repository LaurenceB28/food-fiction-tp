<form method="post" novalidate>
    <h2>Ajouter une recette</h2>
    <div class="mb-3">
        <label for="title" class="form-label">Nom de la recette</label>
        <input type="textarea" name="title" class="form-control" placeholder="Nom de la recette" aria-label="title" maxlength="25" required>
    </div>
    <div class="mb-3">
        <label for="ingredient" class="form-label">Liste des ingredients</label>
        <input type="text" name="ingredient" class="form-control" placeholder="Liste des ingrédients" aria-label="ingredient" maxlength="25" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Les étapes de préparations</label>
        <input type="text" name="description" class="form-control" placeholder="description" aria-label="description" maxlength="25" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Ajouter</button>