<!DOCTYPE html>
<!--
C:\xampp\htdocs\PDOCours\AuthentificationAvecJeton\
AuthentificationAvecJetonView.php
http://localhost/PDOCours/AuthentificationAvecJeton/AuthentificationAvecJetonView.php
 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AuthentificationAvecJetonView</title>
    </head>
    <body>
        <h1>AuthentificationAvecJetonView</h1>
        <form action="" method="POST">
            <input type="text" name="usersUiD" value="Pseudo99" />
            <input type="text" name="usersPwd" value="mdp" />
            <input type="submit" />
        </form>
        <?php
        setcookie("jeton_authentification", "yyy", time() + (3600 * 24 * 14));
        $message = "";
        $usersUiD = filter_input(INPUT_POST, "usersUiD");
        $usersPwd = filter_input(INPUT_POST, "usersPwd");
 
        if ($usersUiD != null && $usersPwd != null) {
            echo "<hr>$usersUiD<hr>";
            echo "<hr>$usersPwd<hr>";
            try {
                // Connexion
                $cnx = new PDO("mysql:host=mysql-cduthoit59.alwaysdata.net;port=3306;dbname=cduthoit59_bd_avions_airbus_v2;", "308217", "Q7NxCwCkazcbUsj");
                $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $cnx->exec("SET NAMES 'UTF8'");
                // Préparation et exécution du SELECT SQL
                $select = "SELECT * FROM users WHERE usersUiD = ? AND usersPwd = ?";
                $curseur = $cnx->prepare($select);
                $curseur->bindValue(1, $usersUiD);
                $curseur->bindValue(2, $usersPwd);
                $curseur->execute();
 
                $record = $curseur->fetch();
                if ($record == false) {
                    $_SESSION["connecte"] = 0;
                    $message = "ID ou mot de passe incorrects";
                } else {
                    $cookieJeton = filter_input(INPUT_COOKIE, "jeton_authentification");
                    echo "<hr>$cookieJeton<hr>";
 
                    $jetonBD = $record["jeton"];
                    echo "<hr>$jetonBD<hr>";
                    if ($jetonBD == $cookieJeton) {
                        $_SESSION["connecte"] = 1;
                        $message = "Connexion OK";
                    } else {
                        $_SESSION["connecte"] = 0;
                        $message = "Connexion OK : jeton incorrect";
                    }
                }
                $curseur->closeCursor();
            }
            // Gestion des erreurs
            catch (PDOException $e) {
                $message = $e->getMessage();
            }
            $cnx = null;
        }
        ?>
        <p>
            <?php
            echo $message;
            ?>
        </p>
 
        <a href="./login.php">Mon compte</a>
    </body>
</html>