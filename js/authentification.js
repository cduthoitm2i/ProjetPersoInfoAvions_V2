/*
 * authentification.js
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
  } else {
    document.getElementById("formulaireAuthentification").submit();
  }
}
window.onload = init;
