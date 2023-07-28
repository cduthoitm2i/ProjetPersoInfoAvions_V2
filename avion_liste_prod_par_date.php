<?php
include_once 'header.php';
?>
<section>
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="backToTop" class="back-to-top">
        <i class="arrow"></i><i class="arrow"></i>
    </a>
    <div class="container">
        <h1>Liste de production</h1>
        <h2>(par date de première mise en circulation)</h2>
        <?php
        require_once './lib/Connexion.php';
        require_once './daos/clientDAOprod.php';
        $pdo = seConnecter("./conf/monsite.ini");
        // var_dump ($pdo);

        //echo "Sélection de la base avion";
        $content = "";
        $lines = selectAllPourListeTab($pdo);
        $headers = "";
        try {
            //$query = "SELECT * FROM `avion`";
            // Nouvelle requête SQL faisant le lien avec la table Compagnie
            $query = "SELECT * FROM avion a INNER JOIN compagnie c ON a.id_compagnie = c.id_compagnie ORDER BY a.date_livraison_compagnie_avion DESC";
            //$query ="SELECT DATE_FORMAT(`a`.`date_livraison_compagnie_avion`, '%d/%m/%Y'), a.numero_serie_avion, a.modele_avion, c.nom_compagnie, a.immatriculation_compagnie_avion, a.statut_avion FROM avion a INNER JOIN compagnie c ON a.id_compagnie = c.id_compagnie ORDER BY a.date_livraison_compagnie_avion DESC";
            //$query ="SELECT *, DATE_FORMAT(`a`.`date_livraison_compagnie_avion`,'%d/%m/%Y'), a.numero_serie_avion, a.modele_avion, c.nom_compagnie, a.immatriculation_compagnie_avion, a.statut_avion FROM avion a INNER JOIN compagnie c ON a.id_compagnie = c.id_compagnie ORDER BY a.date_livraison_compagnie_avion DESC";
            $result = $pdo->query($query);
        ?>

            <div class="row py-5">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="liste_avion_par_date" style="width:100%" class="table table-bordered table-hover dt-responsive">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;vertical-align:middle">Premier vol compagnie</th>
                                            <th style="text-align:center;vertical-align:middle">MSN</th>
                                            <th style="text-align:center;vertical-align:middle">Type</th>
                                            <th style="text-align:center;vertical-align:middle">Opérateur</th>
                                            <th style="text-align:center;vertical-align:middle">Immatriculation</th>
                                            <th style="text-align:center;vertical-align:middle">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                            <tr>
                                                <td class='small' style="text-align:center;"><?php echo $data['date_livraison_compagnie_avion'] ?></td>
                                                <td class='small'><a href="./ficheAvion.php?numeroSerieAvion=<?php echo $data['numero_serie_avion'] ?>&nomAvion=<?php echo $data['nom_avion']; ?>"><?php echo $data['numero_serie_avion']; ?></a></td>
                                                <td class='small'><?php echo $data['modele_avion']; ?></td>
                                                <td class='small'><a href="./ficheCompagnie.php?nomCompagnie=<?php echo $data['nom_compagnie']; ?>"><?php echo $data['nom_compagnie']; ?></a></td>                     
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