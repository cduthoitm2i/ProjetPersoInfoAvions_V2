<?php
if (isset($_POST["submit"])) {
  // On récupère les informations du fichier signup.php via la bouton type submit
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdrepeat"];

  // on fait le lien vers les fonctions de contôle et la connexion à la base
  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // On test les champs restés vide
  if (emptyInputSignup($name, $surname, $email, $username, $pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=emptyinput");
		exit();
  }
	// on test le nom avec la fonction invalidUid se trouvant dans le fichier functions.inc.php
  if (invalidUid($uid) !== false) {
    header("location: ../signup.php?error=invaliduid");
		exit();
  }
	// on test l'adresse mail avec la fonction invalidEmail se trouvant dans le fichier functions.inc.php
  if (invalidEmail($email) !== false) {
    header("location: ../signup.php?error=invalidemail");
		exit();
  }
	// on test que les deux adresses mail sont identique avec la fonction pwdMatch se trouvant dans le fichier functions.inc.php
  if (pwdMatch($pwd, $pwdRepeat) !== false) {
    header("location: ../signup.php?error=passwordsdontmatch");
		exit();
  }
	// on test que le username n'existe pas déjà dans la bd en l'interrogeant avec la fonction uidExists se trouvant dans le fichier functions.inc.php (requête SQL SELECT * FROM ...)
  if (uidExists($conn, $username) !== false) {
    header("location: ../signup.php?error=usernametaken");
		exit();
  }
  // si aucune erreur, on crée l'utilisateur dans la base
  // insertion dans la base à l'aide de la fonction createUser se trouvant dans le fichier functions.inc.php (requête SQL INSERT INTO ...)
  createUser($conn, $name, $surname, $email, $username, $pwd);
} else {
	header("location: ../signup.php");
    exit();
}
