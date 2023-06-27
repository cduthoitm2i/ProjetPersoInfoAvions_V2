/*
 * Authentification.js
 */
function init() {
  document.getElementById("btSubmit").addEventListener(
    "click",
    (event) => {
      event.preventDefault();
      valider();
    } /// corps de la fonction anonyme
  ); /// addeventListener
} /// init

function valider() {
  let uid = document.getElementById("uid").value;
  let pwd = document.getElementById("pwd").value;
  if (uid.trim() === "" || pwd.trim() === "") {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Renseigner tous les champs&nbsp;!!!!</div>";
      header("location: ../login.php?error=emptyinput");
      exit();
  } else {
    document.getElementById("formulaireAuthentification").submit()
    header("location: ../login.php");
    exit();
  }
}
window.onload = init;
