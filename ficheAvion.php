<?php
include_once 'header.php';
?>
    <section>
    <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-body">
                            <h5 class="card-title"><!--<?php echo $data['modele_avion']; ?> MSN <?php echo $data['numero_serie_avion']; ?> <?php echo $data['immatriculation_compagnie_avion']; ?>-->
                        Modèle avion, Numéro de série, immatriculation</h5>
                            <table class="table table-sm table-borderless">

                                <tbody>
                                    <tr>
                                        <td>Numéro de série&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Type&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Date premier vol&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Immatriculation d'essai&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Age de l'avion&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-body">
                            <h5 class="card-title">DERNIER OPÉRATEUR Nom compagnie</h5>
                            <table class="table table-sm table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Pays&nbsp;:</td>
                                        <td>drapeau image</td>
                                    </tr>
                                    <tr>
                                        <td>Date&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Code&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Callsign&nbsp;:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>siteweb&nbsp;:</td>
                                        <td>www.xxx.com</td>
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