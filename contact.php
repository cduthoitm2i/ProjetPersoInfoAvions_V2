<?php
include_once 'header_contact.php';
//require_once('./inc/init.inc.php');
?>
<?php
// Variable pour message de fin
$responses = [];
// Vérification si on récupère bien les informations des champs
$email = filter_input(INPUT_POST, "email");
$sujet = filter_input(INPUT_POST, "sujet");
$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$message = filter_input(INPUT_POST, "message");
// Ancienne syntaxe
// if (isset($_POST['email'], $_POST['sujet'], $_POST['nom'], $_POST['prenom'], $_POST['message'])) {
if (isset($email, $sujet, $nom, $prenom, $message)) {
    // Validation de l'adresse mail
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $responses[] = 'Adresse mail pas valide&nbsp;!<br/>';
    }
    // Vérification si les champs sont remplis
    // Ancienne syntaxe
    //if (empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['message'])) {
    if (empty($email) || empty($sujet) || empty($nom) || empty($prenom) || empty($message)) {
        $responses[] = 'Merci de renseigner tous les champs&nbsp;!';
    }
    // si pas d'erreurs, on peut envoyer le mail
    if (!$responses) {
        // A qui envoyé un mail
        $to = 'cduthoit@live.fr';
        // Mail à renseigner pour la réponse&nbsp;?
        // Ancienne syntaxe
        //$from = 'cduthoit@gmail.com';
        $from = filter_input(INPUT_POST, "email");
        // Sujet du mail
        // Ancienne syntaxe
        //$sujet = $_POST['sujet'];
        $sujet = filter_input(INPUT_POST, "sujet");
        // Message du mail
        // Ancienne syntaxe
        //$message = $_POST['message'];
        $message = filter_input(INPUT_POST, "message");
        // Entête de l'email
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit' . "\n";
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        // Essai d'envoi du mail
        if (mail($to, $sujet, $message, $headers)) {
            // Mail envoyé
            //$responses[] = 'Message envoyé&nbsp;!';
            $responses[] = '<div class="alert alert-success" role="alert">Message bien envoyé&nbsp;!</div>';
            header("location: accueil.php");
        } else {
            // Mail pas envoyé
            //$responses[] = 'Message pas envoyé&nbsp;! Vérifier vos paramètres de compte mail&nbsp;!';
            $responses[] = '<div class="alert alert-danger" role="alert">Message pas envoyé&nbsp;! Merci de vérifier la configuration de votre serveur mail&nbsp;!</div>';
        }
    }
}
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="well well-sm card border-0 shadow rounded-3 my-5 p-4 p-sm-5">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <legend class="text-center">Contact</legend>
                            <!-- champs pour votre nom-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nom" type="text" placeholder="Nom" aria-label="nom" name="nom">
                                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                </div>
                            </div>
                            <!-- champs pour votre prénom-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="prenom" type="text" placeholder="Prénom" aria-label="prenom" name="prenom">
                                    <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                                </div>
                            </div>
                            <!-- champs pour le sujet du message-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="sujet" type="text" placeholder="Sujet" aria-label="sujet" name="sujet">
                                    <label for="sujet" class="col-sm-2 col-form-label">Sujet du message</label>
                                </div>
                            </div>
                            <!-- champs pour l'email -->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" aria-label="email" name="email">
                                    <label class="col-sm-2 col-form-label" for="email">E-mail</label>
                                </div>
                            </div>
                            <!-- champs pour le message -->
                            <div class="form-group mb-3">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="Merci de saisir votre message..." rows="5"></textarea>
                                </div>
                            </div>
                            <!-- bouton d'envoi -->
                            <div class="form-group">
                                <div class="form-group form-floating mb-3">
                                    <div class="d-grid col-md-12 text-right">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" value="Envoyer">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php if ($responses) : ?>
                            <?php echo implode($responses); ?>
                        <?php endif; ?>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
<?php
include_once 'footer.php';
?>