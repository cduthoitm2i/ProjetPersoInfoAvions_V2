<?php

    /*
userDAO.php
 */
    /*
  DAO de mon projet
 */
/*
    Pour insérer dans la base les informations de la page d'inscription
*/
   
     /**
     *
     * @param PDO $pdo
     * @param array $tAttributesValues
     * @return int
     */
    function insert(PDO $pdo, array $tAttributesValues): int
    {
        $affected = 0;
        try {
            $sql = "INSERT INTO users(nom,prenom,telephone,email,adresse,cp,ville,pseudo,mdp) VALUES(?,?,?,?,?,?,?,?,?)";
            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $tAttributesValues["nom"]);
            $statement->bindValue(2, $tAttributesValues["prenom"]);
            $statement->bindValue(3, $tAttributesValues["telephone"]);
            $statement->bindValue(4, $tAttributesValues["email"]);
            $statement->bindValue(5, $tAttributesValues["adresse"]);
            $statement->bindValue(6, $tAttributesValues["cp"]);
            $statement->bindValue(7, $tAttributesValues["ville"]);
            $statement->bindValue(8, $tAttributesValues["pseudo"]);
            $statement->bindValue(9, $tAttributesValues["mdp"]);

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }
    function update(PDO $pdo, array $tAttributesValues): int
    {
        $affected = 0;
        try {
            $sql = "UPDATE users SET nom='?', prenom= '?', telephone= '?', email= '?', adresse= '?', cp= '?', ville= '?', pseudo= '?', mdp= '?' WHERE pseudo=1";
            $statement = $pdo->prepare($sql);

            $nom = filter_input(INPUT_GET, "nom");
            $prenom = filter_input(INPUT_GET, "prenom");
            $telephone = filter_input(INPUT_GET, "telephone");
            $email = filter_input(INPUT_GET, "email");
            $adresse = filter_input(INPUT_GET, "adresse");
            $cp = filter_input(INPUT_GET, "cp");
            $ville = filter_input(INPUT_GET, "ville");
            $pseudo = filter_input(INPUT_GET, "pseudo");
            $mdp = filter_input(INPUT_GET, "mdp");

            $statement = $pdo->prepare($sql);
            
            // BIND = RELIER
            $statement->bindParam(1, $nom); 
            $statement->bindParam(2, $prenom);
            $statement->bindParam(3, $telephone);
            $statement->bindParam(4, $email);
            $statement->bindParam(5, $adresse);
            $statement->bindParam(6, $cp);
            $statement->bindParam(7, $ville);
            $statement->bindParam(8, $pseudo);
            $statement->bindParam(9, $mdp);



            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

?>

