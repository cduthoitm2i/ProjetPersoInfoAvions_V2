<?php
// Messages d'erreur
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo '<div class="alert alert-danger" role="alert">Remplir tous les champs&nbsp;!</div>';
  } else if ($_GET["error"] == "invaliduid") {
    echo '<div class="alert alert-danger" role="alert">Renseigner un nom valide&nbsp;!</div>';
  } else if ($_GET["error"] == "invalidemail") {
    echo '<div class="alert alert-danger" role="alert">Renseigner une adresse mail valide&nbsp;!</div>';
  } else if ($_GET["error"] == "passwordsdontmatch") {
    echo '<div class="alert alert-danger" role="alert">Saisir un mot de passe&nbsp;!</div>';
  } else if ($_GET["error"] == "stmtfailed") {
    echo '<div class="alert alert-danger" role="alert">Erreur, contacter l\'administrateur du site&nbsp;!</div>';
  } else if ($_GET["error"] == "usernametaken") {
    echo '<div class="alert alert-danger" role="alert">Pseudo déjà utilisé, choisir un autre&nbsp;!</div>';
  } else if ($_GET["error"] == "none") {
    echo '<div class="alert alert-success" role="alert">Vous êtes enregistré&nbsp;!</div>';
  }
}
