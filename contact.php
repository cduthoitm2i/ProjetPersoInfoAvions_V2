<?php
include_once 'header_contact.php';
require_once("./inc/init.inc.php");
// Message de fin
$reponses = [];
// Vérification du bon remplissage de tous les champs
if (isset($filter_input['email'], $filter_input['sujet'], $filter_input['nom'], $filter_input['prenom'], $filter_input['message'])) {
    // Validation adresse mail
    if (!filter_var($filter_input['email'], FILTER_VALIDATE_EMAIL)) {
        $reponses[] = 'Adresse mail invalide!';
    }
    // Vérification que tous les champs ne sont pas vide
    if (empty($filter_input['email']) || empty($filter_input['sujet']) || empty($filter_input['nom']) || empty($filter_input['prenom']) || empty($filter_input['message'])) {
        $reponses[] = 'Compléter tous les champs!';
    }
    // Si aucune erreur avant, on continue
    if (!$reponses) {
        // A qui envoyer le mail
        $to = 'cduthoit@live.fr';
        // 
        $from = 'cduthoit@gmail.com';
        // Sujet du message
        $sujet = $filter_input['sujet'];
        // Mail message
        $message = $filter_input['message'];
        // Mail entête (avant on paramètre pour les caractères spéciaux soient corrects dans l'entête du mail de réception en définissant le codage utf-8)
        // Test effectué avec des emojis, résultat ok
        $headers = 'MIME-Version: 1.0' . "\n";
        $headers .= 'Content-type: text/plain; charset=utf-8' . "\n";
        $headers .= 'Content-Transfer-Encoding: 8bit' . "\n";
        $headers .= 'From: ' . $from . "\r\n" . 'Reply-To: ' . $filter_input['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        // Essai d'envoi du mail
        if (mail($to, $sujet, $message, $headers)) {
            // Envoi réussi
            $reponses[] = 'Message bien envoyé!';
        } else {
            // Echec
            $reponses[] = 'Message pas envoyé! Merci de vérifier la configuration de votre serveur mail!';
        }
    }
}
?>
<section class="signup-form">
    <div class="container signup-form-form">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="well well-sm card border-0 shadow rounded-3 my-5 p-4 p-sm-5">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <legend class="text-center">Contact</legend>
                            <!-- champs pour votre nom-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nom" type="text" placeholder="Nom" aria-label="Nom" value="<?php if (isset($_POST['nom'])) echo htmlspecialchars($_POST['nom']); ?>" name="nom" required>
                                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                </div>
                            </div>

                            <!-- champs pour votre prénom-->
                            <div class="form-group">

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="prenom" type="text" placeholder="Prénom" aria-label="Prenom" name="prenom" value="<?php if (isset($_POST['prenom'])) echo htmlspecialchars($_POST['prenom']); ?>" required>
                                    <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                                </div>
                            </div>
                            <!-- champs pour le sujet du message-->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="sujet" type="text" placeholder="Sujet" aria-label="Sujet" name="sujet" value="<?php if (isset($_POST['sujet'])) echo htmlspecialchars($_POST['sujet']); ?>" required>
                                    <label for="sujet" class="col-sm-2 col-form-label">Sujet du message</label>
                                </div>
                            </div>
                            <!-- champs pour l'email -->
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" required>
                                    <label class="col-sm-2 col-form-label" for="email">E-mail</label>
                                    <!--<span class="error"><?php echo $emailErr; ?></span>-->
                                </div>
                            </div>
                            <!-- champs pour le message -->
                            <div class="form-group mb-3">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="Merci de saisir votre message..." rows="5"><?php if (isset($_POST['commentaire'])) echo htmlspecialchars($_POST['commentaire']); ?></textarea>
                                </div>
                            </div>
                            <!-- bouton d'envoi -->
                            <div class="form-group">
                                <div class="form-group form-floating mb-3">
                                    <div class="d-grid col-md-12 text-right">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php if ($reponses) : ?>
                            <p class="reponses"><?php echo implode('<br>', $reponses); ?></p>
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