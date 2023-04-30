<?php

    /*
 client.php
 */
    /*
  DAO de mon projet
 */

    /**
     *
     * @param PDO $pdo
     * @return array
     */

    function selectAll(PDO $pdo): array
    {
        /*
     * Renvoie un tableau ordinal de tableaux associatifs
     */
        $list = array();

        try {
            // Premier filtre, je sélectionne tous les avions de la liste
            // $cursor = $pdo->query("SELECT * FROM avion");
            // Deuxième filtre, je sélectionne tous les avions de la liste avec le nom_avion A220
            // $cursor = $pdo->query("SELECT * FROM `avion` WHERE nom_avion = 'A220';");
            // Troisième filtre, je sélectionne tous les avions de la liste avec le nom_avion A318
            // $cursor = $pdo->query("SELECT * FROM `avion` WHERE nom_avion = 'A318';");
            // Troisième filtre, je sélectionne tous les avions de la liste avec le nom_avion A318
            // $cursor = $pdo->query("SELECT * FROM `avion` WHERE nom_avion = 'A318';");
            // Quatrième filtre, je sélectionne tous les avions de la liste avec le modele_avion Airbus A220 CS100
            // $cursor = $pdo->query("SELECT * FROM `avion` WHERE modele_avion = 'Airbus A220 CS100';");
            // Cinquième filtre, je sélectionne tous les avions de la liste avec la compagnie Delta Airlines
            // $cursor = $pdo->query("SELECT * FROM `avion` WHERE nom_compagnie = 'Delta Airlines';");
            // Sixième filtre, je sélectionne tous les avions de la liste et je tri par le numéro de série dans l'ordre ascendant
            // $cursor = $pdo->query("SELECT * FROM `avion` ORDER BY `avion`.`numero_serie_avion` ASC");
            // Septième filtre, je sélectionne certaines informations (modele_avion, nom_avion, numero_serie_avion)
            // $cursor = $pdo->query("SELECT modele_avion, nom_avion, numero_serie_avion FROM `avion` ORDER BY `avion`.`numero_serie_avion` ASC");
            // Huitième filtre, je sélectionne certaines informations (modele_avion, nom_avion, numero_serie_avion) et j'inverse l'affichage
            // $cursor = $pdo->query("SELECT modele_avion, numero_serie_avion, nom_avion FROM `avion` ORDER BY `avion`.`numero_serie_avion` ASC");
            // Neuvième filtre, je sélectionne certaines informations (modele_avion, nom_avion, numero_serie_avion) et j'inverse l'affichage
            $cursor = $pdo->query("SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion` WHERE nom_avion = 'A220'");

            // Renvoie un tableau ordinal de tableaux associatifs
            $list = $cursor->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $message = array("message" => $e->getMessage());
            $list[] = $message;
        }
        return $list;
    }

    /**
     *
     * @param PDO $pdo
     * @param string $id
     * @return array
     */
    function selectOne(PDO $pdo, string $id): array
    {
        /*
     * Renvoie un tableau associatif
     */
        try {
            $sql = "SELECT * FROM avion WHERE modele_avion = ?";
            $cursor = $pdo->prepare($sql);
            $cursor->bindValue(1, $id);
            $cursor->execute();
            // Renvoie un tableau associatif
            $line = $cursor->fetch(PDO::FETCH_ASSOC);
            if ($line === FALSE) {
                $line["message"] = "Enregistrement inexistant !";
            }
            $cursor->closeCursor();
        } catch (PDOException $e) {
            //$line["Error"] = $e->getMessage();
            $line["Error"] = "Une erreur s'est produite !!!";
        }
        return $line;
    }

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
            $sql = "INSERT INTO villes(cp,nom_ville,id_pays) VALUES(?,?,?)";
            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $tAttributesValues["cp"]);
            $statement->bindValue(2, $tAttributesValues["nom_ville"]);
            $statement->bindValue(3, $tAttributesValues["id_pays"]);

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

    /**
     *
     * @param PDO $pdo
     * @param array $tAttributesValues
     * @return int
     */
    function update(PDO $pdo, array $tAttributesValues): int
    {
        $affected = 0;
        try {
            $sql = "UPDATE INTO villes(cp,nom_ville,id_pays) VALUES(?,?,?)";
            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $tAttributesValues["cp"]);
            $statement->bindValue(2, $tAttributesValues["nom_ville"]);
            $statement->bindValue(3, $tAttributesValues["id_pays"]);

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }


    /**
     *
     * @param PDO $pdo
     * @param string $id
     * @return int
     */
    function delete(PDO $pdo, string $id): int
    {
        $affected = 0;
        try {
            $sql = "DELETE FROM villes WHERE cp = ?";

            $statement = $pdo->prepare($sql);
            $statement->bindValue(1, $id);
            $statement->execute();

            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }
    ?>

