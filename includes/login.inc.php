<?php

if (isset($_POST["submit"])) {

  // on récupère les informations des champs de saisie
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  // on point sur le fichier functions.inc.php pour effectuer des contrôles

  require_once './dbh.inc.php';
  require_once './functions.inc.php';

  // On vérifie que les champs ne sont pas vide
  if (emptyInputLogin($username, $pwd) === true) {
    header("location: ../login.php?error=emptyinput");
		exit();
  }

  // On insère les informations dans la BD
  loginUser($conn, $username, $pwd);

} else {
	header("location: ../login.php");
    exit();
}
