<h5>MODIFIER MES INFOS</h5>
<form class="form-floating">
<div class="row g-3">
  <div class="form-floating">
    <input type="text" class="form-control" placeholder="Firstname" aria-label="First name">
    <label for="floatingPassword">Nom</label>
  </div>
  <div class="form-floating mb-3">
    <input type="text" class="form-control" placeholder="Lastname" aria-label="Last name">
    <label for="floatingPassword">Prénom</label>
  </div>
</div>
<div class="form-floating mb-3">
<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Mot de passe</label>
</div>
<!-- <a href="/controllers/updateUserCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Modifier mon compte</span></a> -->
<button type="submit" class="btn btn-warning"><a href="/controllers/updateUserCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Modifier mon compte</span></a>
<button type="submit" class="btn btn-danger"><a href="/controllers/userInfosCtrl.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Supprimer mon compte</span></a>
</button>
</form>