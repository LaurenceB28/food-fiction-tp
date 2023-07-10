<h1>Upload de fichiers</h1>

<form method="post" enctype="multipart/form-data">

    <div><?=$error ?? ''?></div>
    <label for="profile">Photo de profil</label>
    <input type="file" name="profile" id="profile" required accept="image/jpeg">

    <input type="submit" value="Envoyer">

</form>