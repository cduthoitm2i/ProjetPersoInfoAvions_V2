<?php
include_once 'header.php';
?>
<style>
  .modal-footer {
    border-top: 0px;
  }
</style>
<section class="signup-form">
  <div class="container signup-form-form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-4">Authentification</h5>
            <form action="includes/login.inc.php" method="post" id="formulaireAuthentification">
              <div class="form-floating mb-3">
                <!-- Modifier en type text car ce n'est pas sécurisé pour le login, on préférera pour une inscription -->
                <input type="text" id="uid" class="form-control" placeholder="Identifiant" name="uid" aria-describedby="IdentifiantAide" value="" />
                <label class="form-label" for="uid">Pseudo&nbsp;:</label>
                <small id="IdentifiantAide" class="form-text text-muted">Saisir votre identifiant</small>
              </div>
              <div class="form-floating mb-3">
                <input type="password" id="pwd" class="form-control" placeholder="Mot de passe" autocomplete="on" name="pwd" aria-describedby="mdpAide" value="" />
                <label class="form-label" for="pwd">Mot de passe&nbsp;:</label>
                <small id="mdpAide" class="form-text text-muted">Saisir votre mot de passe</small>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck" name="rememberPasswordCheck">
                <label class="form-check-label" id="labelcheckbox" for="rememberPasswordCheck">Afficher le mot de passe</label>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="chkSeSouvenir" name="chkSeSouvenir">
                <label class="form-check-label" for="chkSeSouvenir">Se souvenir de moi</label>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="btSubmit" id="btSubmit">Connexion</button>
              </div>
              <label>
                <?php
                // Messages d'erreur
                if (isset($_GET["error"])) {
                  if ($_GET["error"] == "emptyinput") {
                    echo "<br/><div class='d-grid alert alert-danger' role='alert'>Renseigner tous les champs&nbsp;!</div>";
                  } else if ($_GET["error"] == "wronglogin") {
                    echo "<br/><div class='d-grid alert alert-danger' role='alert'>Mauvais login&nbsp;!</div>";
                  }
                }
                 ?>

              </label>
              <label id="lblMessage"></label>
            </form>
            <p><a href="#" data-target="#exampleModal" data-toggle="modal">Mot de passe oublié</a></p>
            <!--modal-->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
              <div class="modal-dialog" style="width: 400px;">
                <div class="modal-content text-center">
                  <div class="modal-header h5 justify-content-center" style="background-color: #e3f2fd;">J'ai oublié mon mot de passe</div>
                  <div class="modal-body px-5">
                    <p class="py-2">Renseigner votre adresse mail. </p>
                    <form action="./controllers/MotdePasseCTRL.php" method="POST">
                      <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control my-3" value="cduthoit@live.fr" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                        <button type="submit" name="btEnvoyerEmail" class="btn w-100" style="background-color: #e3f2fd;">Envoyer un nouveau mot de passe</button>
                      </div>
                    </form>
                    <div class="d-flex justify-content-between mt-4">
                      <a class="" href="./login.php">Login</a>
                      <a class="" href="./signup.php">Register</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="./js/login.js"></script>
<!--<script src="./js/authentification.js"></script>-->
<?php
include_once 'footer.php';
?>