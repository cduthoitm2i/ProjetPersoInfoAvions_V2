<?php
// Messages d'erreur
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<br/><div class='d-grid alert alert-danger' role='alert'>Renseigner tous les champs&nbsp;!</div>";
  } else if ($_GET["error"] == "wronglogin") {
    echo "<br/><div class='d-grid alert alert-danger' role='alert'>Mauvais login&nbsp;!</div>";
  }
}
