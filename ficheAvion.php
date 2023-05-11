<?php
include_once 'header.php';
require_once './entities/Avions.php';
include './includes/setvariable.php';
?>
<section>
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
                                <tr>
                                    <td class="col-md-3 small">Age de l'avion&nbsp;:</td>
                                    <td class="col-md-4 small"><?php
                                                                include './partials/ageavion.php';
                                                                ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Configuration sièges&nbsp;:</td>
                                    <td class="col-md-4 small">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Première classe"><?php echo $confF ?></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="<em>Classe affaire</em>"><?php echo $confC ?></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Classe économique supérieure"><?php echo $confW ?></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Classe économique"><?php echo $confY ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Hex Code&nbsp;:</td>
                                    <td class="col-md-4 small"><a href="https://globe.adsbexchange.com/?icao=<?php echo "$hexcode" ?>" target="_blank"><?php echo "$hexcode" ?></a></td>
                                </tr>
                                <tr>
                                    <td class="col-md-3 small">Motorisation&nbsp;:</td>
                                    <td class="col-md-4 small"><?php echo "$moteur" ?></td>
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
                                    <td class="small">drapeau image</td>
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
</section>
<?php
include_once 'footer.php';
?>