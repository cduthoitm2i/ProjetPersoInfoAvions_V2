<?php
include_once 'header.php';
?>
<section class="signup-form">
  <div class="container signup-form-form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-4">Authentification</h5>
            <form action="includes/login.inc.php" method="post">
              <div class="form-floating mb-3">
                <!-- Modifier en type text car ce n'est pas sécurisé pour le login, on préférera pour une inscription -->
                <input type="text" id="uid" class="form-control" placeholder="Identifiant" name="uid" aria-describedby="IdentifiantAide" value="Pseudo10" />
                <label class="form-label" for="uid">Pseudo&nbsp;:</label>
                <small id="IdentifiantAide" class="form-text text-muted">Saisir votre identifiant</small>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="pwd" class="form-control" placeholder="Mot de passe" autocomplete="on" name="pwd" aria-describedby="mdpAide" value="canada" />
                <label class="form-label" for="pwd">Mot de passe&nbsp;:</label>
                <small id="mdpAide" class="form-text text-muted">Saisir votre mot de passe</small>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck" name="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">Mot de passe visible</label>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="chkSeSouvenir" name="chkSeSouvenir">
                <label class="form-check-label" for="chkSeSouvenir">Se souvenir de moi</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Connexion</button>
              </div>
              <label>
                <?php
                // Messages d'erreur
                if (isset($_GET["error"])) {
                  if ($_GET["error"] == "emptyinput") {
                    echo "<p>Renseigner tous les champs&nbsp;!</p>";
                  } else if ($_GET["error"] == "wronglogin") {
                    echo "<p>Mauvais login&nbsp;!</p>";
                  }
                } ?>
              </label>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<?php
include_once 'footer.php';
?>