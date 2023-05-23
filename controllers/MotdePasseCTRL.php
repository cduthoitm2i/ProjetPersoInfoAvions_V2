<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoi mail</title>
</head>

<body>
    <?php
    /*
 * Envoi d'un email avec un mot de passe provisoire !!!
 */
    ini_set("SMTP", "smtp-cduthoit59.alwaysdata.net");
    //ini_set("smtp_port", "25");
    ini_set("sendmail_from", "cduthoit59@alwaysdata.net"); // --- Remplace le FROM dans les entêtes
    //$destinataire = "$email";
    // --- utf8_decode() : UTF8 vers ISO 8859-1
    $objet =iconv('UTF-8', 'windows-1252', "Changer votre mot de passe");

    $message = "";
    $message .= "<div style='background-color:silver;text-align:center;width=300px'>";
    $message .= "<p style='font-size:large;'>Mot de passe oublié ! No Problemo</p>";
    $message .= "<p style='font-size:large;'>Pour créer un nouveau mot de passe, cliquez sur le bouton</p>";
    $message .= "<p><a style='display:inline-block;font-size:large;background-color:black;color:white;text-decoration:none;padding-top:10px;padding-bottom:10px;padding-left:100px;padding-right:100px;' href='https://cduthoit59.alwaysdata.net/ProjetPersoInfoAvions_V2/controllers/MotDePasseOublieCTRLEtape2.php'>Cliquez</a></p>";
    $message .= "";
    $message .= "<p style='background-color:white;color:dimgray;padding:10px'>Ce lien est valable 1 heure et est à usage unique.</p>";
    $message .= "</div>";

    $entetes = "Content-Type: text/html; charset=UTF-8\r\n";
    $entetes .= "Content-Transfer-Encoding: 8bit\n";

    $bOk = mail($email, $objet, $message, $entetes);
    if ($bOk) {
        $message = "Mail 1 envoy&eacute; avec succ&egrave;s; Consultez votre boîte de réception de votre messagerie !";
    } else {
        $message = "Erreur d'envoi du Mail 1";
    }

    include "../controllers/MotDePasseOublieViewEtape2.php";



    ?>
</body>

</html>