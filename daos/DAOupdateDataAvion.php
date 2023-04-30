<?php


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
            $sql = "UPDATE INTO avion VALUES(?,?,?,?,?,?,?,?,?)";
            $statement = $pdo->prepare($sql);

            $statement->bindValue(1, $tAttributesValues["modele_avion"]);
            $statement->bindValue(2, $tAttributesValues["nom_avion"]);
            $statement->bindValue(3, $tAttributesValues["type_avion"]);

            $statement->execute();
            $affected = $statement->rowcount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        return $affected;
    }

    ?>

