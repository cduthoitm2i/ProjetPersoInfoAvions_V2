<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Chercher un avion ou une compagnie</h5>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Chercher</button>
                        </form>
                        <p class="p-2 card-text text-center">Saisir une immatriculation, un&nbsp;numéro de&nbsp;série ou&nbsp;le&nbsp;nom d'une&nbsp;compagnie aérienne</p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <p class="p-2 card-text"><strong>Airbus</strong> diffuse toutes les informations sur les avions civils Airbus. </p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Dernières mises à jour avions</h5>
                        <table class="table table-sm table-borderless">

                            <tbody>
                                <tr>
                                    <td>A320</td>
                                    <td>Air Canada</td>
                                    <td>C-GYFY</td>
                                </tr>
                                <tr>
                                    <td>A320</td>
                                    <td>Air Canada</td>
                                    <td>C-GYFY</td>
                                </tr>
                                <tr>
                                    <td>A320</td>
                                    <td>Air Canada</td>
                                    <td>C-GYFY</td>
                                </tr>
                                <tr>
                                    <td scope="row">A320</td>
                                    <td>Air Canada</td>
                                    <td>C-GYFY</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="p-2 card-text text-end"><a href="#">Plus de mise à jour vers ce lien</a></p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Photos récentes</h5>
                        <div id="randpic" style="width: 450px;"></div>
                        <!--<img src="./images/photos/image1.png" width="450px" class="img-fluid start" alt="...">-->
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Liste de production</h5>
                        <table class="table table-sm table-borderless">

                            <tbody>
                                <tr>
                                    <!--Syntaxe pour éviter un tas de fichier en trop-->
                                    <!--<td><a href="select_type_avion.php?type=a220">Airbus A220</a></td>-->
                                    <td><a href="a220.php">Airbus A220</a></td>
                                    <td><a href="a300.php">Airbus A300</a></td>
                                    <td><a href="a310.php">Airbus A310</a></td>
                                </tr>
                                <tr>
                                    <td><a href="a318.php">Airbus A318</a></td>
                                    <td><a href="a319.php">Airbus A319</a></td>
                                    <td><a href="a320.php">Airbus A320</a></td>
                                </tr>
                                <tr>
                                    <td><a href="a321.php">Airbus A321</a></td>
                                    <td><a href="a330.php">Airbus A330</a></td>
                                    <td><a href="a340.php">Airbus A340</a></td>
                                </tr>
                                <tr>
                                    <td><a href="a350.php">Airbus A350</a></td>
                                    <td><a href="a380.php">Airbus A380</a></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="p-2 card-text text-end"><a href="#">Plus de mise à jour vers ce lien</a></p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Dernières photos publiées</h5>
                        <div class="row">
                            <?php
                            include './partials/carrousel.php';
                            ?>

                        </div>
                        <p class="p-2 card-text text-end"><a href="#">Voir l'ensemble du Top photo 24&nbsp;h</a></p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Compagnies aériennes à la une</h5>
                        <table class="table table-sm table-hover table-borderless">

                            <tbody>
                                <tr>
                                    <td style="width:20%"><img src="./images/logo_compagnie/Air France.jpg" class="w-100 shadow-1-strong" alt=""/></td>
                                    <td style="width:80%">Air France</td>
                                </tr>
                                <tr>
                                    <td style="width:20%"><img src="./images/logo_compagnie/Air Canada.jpg" class="w-100 shadow-1-strong" alt="" /></td>
                                    <td style="width:80%">Air Canada</td>
                                </tr>
                                <tr>
                                    <td style="width:20%"><img src="./images/logo_compagnie/Delta Air Lines.jpg" class="w-100 shadow-1-strong" alt="" /></td>
                                    <td style="width:80%">Delta Air Lines</td>
                                </tr>
                                <tr>
                                    <td style="width:20%"><img src="./images/logo_compagnie/Emirates.jpg" class="w-100 shadow-1-strong" alt="" /></td>
                                    <td style="width:80%">Emirates</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="p-2 card-text text-end"><a href="#">Plus de mise à jour vers ce lien</a></p>
                    </div>
                </div>
            </div>
        </div>

</section>
<?php
include_once 'footer.php';
?>