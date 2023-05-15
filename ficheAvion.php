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
            //$query = "SELECT * FROM `avion`";
            // Nouvelle requête SQL faisant le lien avec la table Compagnie
            $query = "SELECT a.*, c.* FROM avion a INNER JOIN compagnie c ON a.id_compagnie = c.id_compagnie ORDER BY a.id_compagnie"; 
            $result = $pdo->query($query);
        ?>
    <div class="container">
        <h1>Fiche avion</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Airbus <?php echo "$nomAvion" ?>, MSN <?php echo "$numeroSerieAvion" ?>, <?php echo "$immatCompagnie" ?>
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
                                    <td class="col-md-4 small"><?php echo "$modeleAvion" ?></td>
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
                                    <td class="col-md-4 small"><?php echo "$immatEssai" ?></td>
                                </tr>
                                <?php
                                // On test si l'avion est détruit, car aucune raison de mettre son âge actuel
                                // Si différent de Scrapped, on affiche bien l'âge
                                 if ($statut <> "Scrapped" | $statut <> "Written off") {
                                    echo "<tr><td class='col-md-3 small'>Age de l'avion&nbsp;:</td><td class='col-md-4 small'>";
                                    include './partials/ageavion.php';
                                    echo "</td></tr>";
                                 }
                                ?>
                                <tr>
                                    <td class="col-md-3 small">Configuration sièges&nbsp;:</td>
                                    <td class="col-md-4 small">
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Première classe"><?php echo $confF ?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe affaire"><?php echo $confC ?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe économique supérieure"><?php echo $confW ?></a>
                                        <a href="" data-toggle="tooltip" data-placement="top" title="Classe économique"><?php echo $confY ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Hex Code&nbsp;:</td>
                                    <td class="col-md-4 small"><a href="https://globe.adsbexchange.com/?icao=<?php echo "$hexcode" ?>" target="_blank"><?php echo "$hexcode" ?></a></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Motorisation&nbsp;:</td>
                                    <td class="col-md-4 small"><!--<?php echo "$newmoteur" ?>-->
                                        <?php
                                        include './partials/searchreplace.php';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Statut&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo "$statut" ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">DERNIER OPÉRATEUR&nbsp;: <?php echo "$nomCompagnie" ?></h5>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="small">Pays&nbsp;:</td>
                                    <td class="small"><?php echo 'drapeau_pays'?></td>
                                </tr>
                                <tr>
                                    <td class="small">Date&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">Code&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">Callsign&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">siteweb&nbsp;:</td>
                                    <td class="small">www.xxx.com</td>
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