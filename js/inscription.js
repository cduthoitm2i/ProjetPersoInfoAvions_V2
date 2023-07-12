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
  let email = document.getElementById("email").value;
// Test que tous les champs sont remplis
  if (
    name.trim() === "" ||
    surname.trim() === "" ||
    uid.trim() === "" ||
    pwd.trim() === "" ||
    pwdrepeat.trim() === "" ||
    email.trim() === ""
  ) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Renseigner tous les champs&nbsp;!!!!</div>";
  }
  // Test que le pseudo fait plus de 6 caractères
  else if (uid.trim().length < 6) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Le pseudo ne doit pas faire moins de 6 caractères</div>";
  }
  // Test de la longueur du mot de passe
  else if (pwd.trim().length < 6 || pwd.length > 16) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Votre mot de passe doit entre compris entre 6 caractères et 16 caractères</div>";
  }
  // Test si le deux mots de passe sont identiques
  else if (pwd != pwdrepeat) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Les deux mots de passe doivent être identiques</div>";
    // Ajout contrôle sur format de l'email
  }
  // Test si la syntaxe de l'email est respectée (avec une fonction qui appelle une expression régulière)
  else if (!isEmail(email)) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>L'adresse email n'est pas correct&nbsp;!</div>";
  }
    // Test si le mot de passe est assez robuste (avec une fonction qui appelle une expression régulière)
  else if (!isMDPFort(pwd)) {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-danger' role='alert'>Le mot de passe n'est pas assez robuste&nbsp;!</div>";
  } 
  // Si tout est bon, le compte est crée
  else {
    document.getElementById("lblMessage").innerHTML =
      "<br/><div class='d-grid alert alert-success' role='alert'>Compte crée</div>";
    document.getElementById("formulaireAuthentification").submit();
    window.location = "login.php"; // Redirection vers la page de login
  }
}
window.onload = init;
