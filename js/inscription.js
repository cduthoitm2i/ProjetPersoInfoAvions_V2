/*
 * inscription.js
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
  let name = document.getElementById("name").value;
  let surname = document.getElementById("surname").value;
  let uid = document.getElementById("uid").value;
  let pwd = document.getElementById("pwd").value;
  let pwdrepeat = document.getElementById("pwdrepeat").value;

  if (
    name.trim() === "" ||
    surname.trim() === "" ||
    uid.trim() === "" ||
    pwd.trim() === "" ||
    pwdrepeat.trim() === ""
  ) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Renseigner tous les champs&nbsp;!!!!</div>";
  } else {
    if (pwd != pwdrepeat) {
      document.getElementById("lblMessage").innerHTML =
        "<br/><div class='d-grid alert alert-danger' role='alert'>Les deux mots de passe doivent être les mêmes.</div>";
    } else {
      document.getElementById("formulaireAuthentification").submit();
      ("<br/><div class='d-grid alert alert-danger' role='alert'>Compte crée</div>");
      //alert("Votre compte est crée ! Vous pouvez vous connecter.");
      //window.alert("<div class='modal' tabindex='-1'><div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5 class='modal-title'>Modal title</h5><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div><div class='modal-body'><p>Modal body text goes here.</p></div><div class='modal-footer'><button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button><button type='button' class='btn btn-primary'>Save changes</button></div></div></div></div>");

      window.location = "login.php"; // Redirection vers la page de login
    }
  }
}
window.onload = init;
