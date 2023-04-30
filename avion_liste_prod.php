<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <h1>Liste de production</h1>
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
            $query = "SELECT numero_serie_avion, modele_avion, nom_compagnie, date_premier_vol_avion, immatriculation_compagnie_avion, statut_avion FROM `avion`";
            $result = $pdo->query($query);
        ?>

            <div class="row py-5">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="liste_avion" style="width:100%" class="table table-bordered table-hover dt-responsive">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;vertical-align:middle">MSN</th>
                                            <th style="text-align:center;vertical-align:middle">Type</th>
                                            <th style="text-align:center;vertical-align:middle">Opérateur</th>
                                            <th style="text-align:center;vertical-align:middle">Premier vol</th>
                                            <th style="text-align:center;vertical-align:middle">Immatriculation</th>
                                            <th style="text-align:center;vertical-align:middle">Statut</th>
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