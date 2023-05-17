<?php
include_once 'header.php';
require_once './entities/Avions.php';
include './includes/setvariable.php';
?>
<section>
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
            $query = "SELECT *
            FROM avion a
            INNER JOIN compagnie c
            ON a.id_compagnie = c.id_compagnie
            WHERE nom_avion='$nomAvion' AND numero_serie_avion='$numeroSerieAvion'
            ORDER BY a.id_compagnie"; 
            $result = $pdo->query($query);
            $data=$result->fetch(PDO::FETCH_ASSOC);
        ?>
    <div class="container">
        <h1>Fiche avion</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Airbus <?php echo "$nomAvion" ?>, MSN <?php echo "$numeroSerieAvion" ?>, <?php echo $data['immatriculation_compagnie_avion']?>
                            <!--Modèle avion, numéro de série, immatriculation-->
                        </h5>
                        <?php
                        require_once("./entities/Avions.php");
                        ?>
                        <table class="table table-sm table-borderless">

                            <tbody>
                                <tr>
                                    <td class="col-md-3 small">Numéro de série&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo "$numeroSerieAvion" ?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Type&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo $data['modele_avion']?></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Date premier vol&nbsp;:</td>
                                    <td class="col-md-4 small"><?php
                                                                include './partials/conversiondate.php';
                                                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Immatriculation essai&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo $data['immatriculation_essai_avion']?></td>
                                </tr>
                                <?php
                                // On test si l'avion est détruit, car aucune raison de mettre son âge actuel
                                // Si différent de Scrapped ou Written off, on affiche bien l'âge
                                 if ($statut <> "Scrapped" | $statut <> "Written off") {
                                    echo "<tr><td class='col-md-3 small'>Age de l'avion&nbsp;:</td><td class='col-md-4 small'>";
                                    include './partials/ageavion.php';
                                    echo "</td></tr>";
                                 }
                                ?>
                                <tr>
                                    <td class="col-md-3 small">Configuration sièges&nbsp;:</td>
                                    <td class="col-md-4 small">
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Première classe"><?php echo $data['config_siege_avion_F']?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe affaire"><?php echo $data['config_siege_avion_C']?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe économique supérieure"><?php echo $data['config_siege_avion_W']?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe économique"><?php echo $data['config_siege_avion_Y']?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Hex Code&nbsp;:</td>
                                    <td class="col-md-4 small"><a href="https://globe.adsbexchange.com/?icao=<?php echo $data['hex_code_avion']?>" target="_blank"><?php echo $data['hex_code_avion']?></a></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Motorisation&nbsp;:</td>
                                    <td class="col-md-4 small">
                                        <?php
                                        include './partials/searchreplace.php';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Statut&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo $data['statut_avion']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Compagnie&nbsp;: <?php echo "$nomCompagnie" ?></h5>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="small">Pays&nbsp;:</td>
                                    <td class="small"><img src="./images/logo_pays/<?php echo $data['drapeau_pays']?>" style="width:25px" alt="Drapeau"/> <?php echo $data['pays_compagnie']?></td>
                                    <td rowspan="4"><img src="./images/logo_compagnie/<?php echo $data['logo_compagnie']?>" style="width:150px;float:right" alt="Logo compagnie"/></td>
                                </tr>
                                <tr>
                                    <td class="small">Date&nbsp;:</td>
                                    <td class="small"><?php echo $data['date_creation_compagnie']?> - <?php echo $data['date_fin_compagnie']?></td>
                                </tr>
                                <tr>
                                    <td class="small">Code&nbsp;:</td>
                                    <td class="small"><?php echo $data['code_compagnie']?></td>
                                </tr>
                                <tr>
                                    <td class="small">Callsign&nbsp;:</td>
                                    <td class="small"><?php echo $data['callsign_compagnie']?></td>
                                </tr>
                                <tr>
                                    <td class="small">siteweb&nbsp;:</td>
                                    <td class="small"><a href="https://<?php echo $data['site_web_compagnie']?>" target="_blank"><?php echo $data['site_web_compagnie']?></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        } ?>
</section>
<?php
include_once 'footer.php';
?>