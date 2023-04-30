<?php
include_once 'header.php';
?>
<section class="signup-form">
  <div class="container signup-form-form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-4">Création d'un compte utilisateur</h5>
            <form action="includes/signup.inc.php" method="post">
              <p><span class="error">* champs requis</span></p>
              <div class="form-floating mb-3">
                <input class="form-control" id="name" type="text" placeholder="Nom" aria-label="Nom" value="Duthoit" name="name">
                <label for="name" class="col-sm-2 col-form-label">Nom</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control" id="surname" type="text" placeholder="Prénom" aria-label="Prenom" name="surname" value="Christophe">
                <label for="surname" class="col-sm-2 col-form-label">Prénom</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="toto@toto.com">
                <label class="col-sm-2 col-form-label" for="email">E-mail</label>
              </div>
              <div class="form-floating mb-3">
                <!-- Modifier en type text car ce n'est pas sécurisé pour le login, on préférera pour une inscription -->
                <input type="text" id="uid" class="form-control" placeholder="Identifiant" name="uid" maxlength="20" pattern="[a-zA-Z0-9-_.]{1,20}" value="Pseudo10">
                <label class="form-label" for="uid">Pseudo&nbsp;:</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="pwd" class="form-control" placeholder="Mot de passe" autocomplete="on" name="pwd" value="canada">
                <label class="form-label" for="pwd">Mot de passe&nbsp;:</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="pwdrepeat" class="form-control basicAutoComplete" placeholder="Mot de passe" autocomplete="on" name="pwdrepeat" aria-describedby="mdp2Aide" value="canada">
                <label class="form-label" for="pwdrepeat">Mot de passe&nbsp;:</label>
                <small id="mdp2Aide" class="form-text text-muted">Saisir une nouvelle fois votre mot de passe</small>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">Mot de passe visible</label>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="newsletter">
                <label class="form-check-label" for="newsletter">Cocher si vous souhaitez obtenir la newsletter&thinsp;?</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Créer le compte</button>
              </div>
              <label><?php
                      // Messages d'erreur
                      if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                          echo "<p>Remplir tous les champs&nbsp;!</p>";
                        } else if ($_GET["error"] == "invaliduid") {
                          echo "<p>Renseigner un nom valide&nbsp;!</p>";
                        } else if ($_GET["error"] == "invalidemail") {
                          echo "<p>Renseigner une adresse mail valide&nbsp;!</p>";
                        } else if ($_GET["error"] == "passwordsdontmatch") {
                          echo "<p>Saisir un mot de passe&nbsp;!</p>";
                        } else if ($_GET["error"] == "stmtfailed") {
                          echo "<p>Erreur, contacter l'administrateur du site&nbsp;!</p>";
                        } else if ($_GET["error"] == "usernametaken") {
                          echo "<p>Pseudo déjà utilisé, choisir un autre&nbsp;!</p>";
                        } else if ($_GET["error"] == "none") {
                          echo "<p>Vous êtes enregistré&nbsp;!</p>";
                        }
                      }
                      ?></label>
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