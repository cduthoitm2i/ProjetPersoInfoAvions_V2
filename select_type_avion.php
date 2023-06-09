<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <h1>Liste production Airbus <?php $type= $_GET['nom_avion']?></h1>
        <?php
        require_once './lib/Connexion.php';
        require_once './daos/clientDAOprod.php';
        // Ajout pour supprimer les fichiers en trop
        $type= filter_input(INPUT_GET,"type");
        $pdo = seConnecter("./conf/monsite.ini");

        // var_dump ($pdo);

        //echo "Sélection de la base avion";
        $content = "";
        $lines = selectAllPourListeTab($pdo);
        $headers = "";

        // Extraction des autres enregistrements et on affiche dans les balises html
        // On fait le corps du tableau
        // On boucle sur les colonnes à l'intérieur de la boucle pour les lignes
        try {
            $query = "SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion` WHERE nom_avion = ? ";

            // Ajout pour éviter les fichiers en trop
            $cursor = $pdo->prepare($query);
            $cursor->bindValue(1, $type);
            $cursor->execute();

        ?>
            <div class="row py-5">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="liste_avion" style="width:100%" class="table table-bordered table-hover dt-responsive">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;vertical-align:middle"><strong>MSN</strong></th>
                                            <th style="text-align:center;vertical-align:middle"><strong>Type</strong></th>
                                            <th style="text-align:center;vertical-align:middle"><strong>Opérateur</strong></th>
                                            <th style="text-align:center;vertical-align:middle"><strong>Premier vol</strong></th>
                                            <th style="text-align:center;vertical-align:middle"><strong>Immatriculation</strong></th>
                                            <th style="text-align:center;vertical-align:middle"><strong>Statut</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                            <tr>
                                                <td class='small'><a href="./ficheAvion.php"><?php echo $data['numero_serie_avion']; ?></a></td>
                                                <td class='small'><?php echo $data['modele_avion']; ?></td>
                                                <td class='small'><a href="./ficheCompagnie.php"><?php echo $data['nom_compagnie']; ?></a></td>
                                                <td class='small'><?php echo $data['date_premier_vol_avion']; ?></td>
                                                <td class='small'><a href="#"><?php echo $data['immatriculation_compagnie_avion']; ?></a></td>
                                                <td class='small'><?php echo $data['statut_avion']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        } ?>
                            <br>
                            <p style="text-align:right"><a href="./impPDF.php">Enregistrer la liste au format PDF</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>