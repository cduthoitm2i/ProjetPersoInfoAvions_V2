<?php
include_once 'header_contact.php';
//require_once('./inc/init.inc.php');
?>
<?php
// Variable pour message de fin
$responses = [];
// Vérification si on récupère bien les informations des champs
if (isset($_POST['email'], $_POST['sujet'], $_POST['nom'], $_POST['message'])) {
    // Validation de l'adresse mail
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $responses[] = 'Email is not valid!';
    }
    // Vérification si les champs sont remplis
    if (empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['nom']) || empty($_POST['message'])) {
        $responses[] = 'Please complete all fields!';
    }
    // si pas d'erreurs, on peut envoyer le mail
    if (!$responses) {
        // A qui envoyé un mail
        $to      = 'cduthoit@live.fr';
        // Send mail from which email address?
        $from = 'cduthoit@gmail.com';
        // Sujet du mail
        $sujet = $_POST['sujet'];
        // Message du mail
        $message = $_POST['message'];
        // Entête de l'email
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/plain; charset=utf-8' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit' . "\n";
        $headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        // Essai d'envoi du mail
        if (mail($to, $sujet, $message, $headers)) {
            // Mail envoyé
            //$responses[] = 'Message envoyé&nbsp;!';
            $responses[] = '<div class="alert alert-success" role="alert">Message bien envoyé&nbsp;!</div>';
        } else {
            // Mail pas envoyé
            //$responses[] = 'Message pas envoyé&nbsp;! Vérifier vos paramètres de compte mail&nbsp;!';
            $responses[] = '<div class="alert alert-danger" role="alert">Message pas envoyé&nbsp;! Merci de vérifier la configuration de votre serveur mail&nbsp;!</div>';
        }
    }
}
?>
<section>
    <!--<div class="container signup-form-form">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-4">Formulaire de contact</h5>
                        <form class="contact" method="post" action="">
                            <div class="fields">
                                <label for="email">
                                    <i class="fas fa-envelope"></i>
                                    <input id="email" type="email" name="email" placeholder="Votre email" required>
                                </label>
                                <label for="name">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" placeholder="Votre nom" required>
                                    <label>
                                        <input type="text" name="subject" placeholder="Votre message" required>
                                        <textarea name="msg" placeholder="Message" required></textarea>
                            </div>
                            <input type="submit">
                            <?php if ($responses) : ?>
                                <p class="responses"><?php echo implode('<br>', $responses); ?></p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
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
                                    <input class="form-control" id="nom" type="text" placeholder="Nom" aria-label="nom" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); ?>" name="nom">
                                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                </div>
                            </div>
                            <!-- champs pour votre prénom-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="prenom" type="text" placeholder="Prénom" aria-label="prenom" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']); ?>" >
                                    <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                                </div>
                            </div>
                            <!-- champs pour le sujet du message-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="sujet" type="text" placeholder="Sujet" aria-label="sujet" name="sujet" value="<?php if (isset($_POST['sujet'])) echo htmlspecialchars($_POST['sujet']); ?>" >
                                    <label for="sujet" class="col-sm-2 col-form-label">Sujet du message</label>
                                </div>
                            </div>
                            <!-- champs pour l'email -->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" aria-label="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" >
                                    <label class="col-sm-2 col-form-label" for="email">E-mail</label>
                                </div>
                            </div>
                            <!-- champs pour le message -->
                            <div class="form-group mb-3">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="Merci de saisir votre message..." rows="5"><?php if (isset($_POST['message'])) echo htmlspecialchars($_POST['message']); ?></textarea>
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