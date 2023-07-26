<?php
include_once 'header.php';
?>
<section>
        <!-- BackToTop Button -->
        <a href="javascript:void(0);" id="backToTop" class="back-to-top">
        <i class="arrow"></i><i class="arrow"></i>
    </a>
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
                        <p class="p-2 card-text text-end"><a href="./avion_liste_prod.php">Plus de mise à jour vers ce lien</a></p>
                    </div>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Photos récentes</h5>
                        <!--<div id="randpic" class="rounded img-fluid"></div>-->
                        <!--<img src="./images/photos/image1.webp" width="450px" class="img-fluid start" alt="...">-->
                        <div>
                            <img id="photo" src="./images/photos/image1.webp" alt="Image" width="460px" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Liste de production</h5>
                        <p>Sélectionner un modèle d'avion dans la liste ci-dessous&nbsp;:</p>
                        <table class="table table-sm table-borderless">

                            <tbody>
                                <tr>
                                    <!--Syntaxe pour éviter un tas de fichier en trop-->
                                    <!--<td><a href="select_type_avion.php?nom_avion=a220">Airbus A220</a></td>-->
                                    <td><a href="avion.php?nomAvion=A220">Airbus A220</a></td>
                                    <td><a href="avion.php?nomAvion=A300">Airbus A300</a></td>
                                    <td><a href="avion.php?nomAvion=A310">Airbus A310</a></td>
                                </tr>
                                <tr>
                                    <td><a href="avion.php?nomAvion=A318">Airbus A318</a></td>
                                    <td><a href="avion.php?nomAvion=A319">Airbus A319</a></td>
                                    <td><a href="avion.php?nomAvion=A320">Airbus A320</a></td>
                                </tr>
                                <tr>
                                    <td><a href="avion.php?nomAvion=A321">Airbus A321</a></td>
                                    <td><a href="avion.php?nomAvion=A330">Airbus A330</a></td>
                                    <td><a href="avion.php?nomAvion=A340">Airbus A340</a></td>
                                </tr>
                                <tr>
                                    <td><a href="avion.php?nomAvion=A350">Airbus A350</a></td>
                                    <td><a href="avion.php?nomAvion=A380">Airbus A380</a></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="p-2 card-text text-end"><a href="./avion_liste_prod.php">Plus de mise à jour vers ce lien</a></p>
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
                        <h5 class="card-title">Compagnies récentes</h5>
                        <table class="table table-sm table-hover table-borderless">

                            <tbody>
                                <!--<tr>
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
                                </tr>-->
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
                                    // On fait une requête SQL sur la totalité de la table mais en évitant les affichages en doublon
                                    $query = "SELECT DISTINCT * FROM compagnie ORDER BY date_creation_compagnie DESC LIMIT 0,5";
                                    $result = $pdo->query($query);
                                ?>

                                    <table id="liste_compagnie" style="width:100%" class="table table-sm table-hover table-borderless">
                                        <tbody>
                                            <?php
                                            while ($data = $result->fetch(PDO::FETCH_ASSOC)) {

                                            ?>
                                                <tr>
                                                    <td class='small' style="vertical-align:middle;width:20%"><a href="https://<?php echo $data['site_web_compagnie'] ?>" target="_blank"><img src="./images/logo_compagnie/<?php echo $data['logo_compagnie'] ?>" style="width:75px" alt="Logo compagnie" /></a></td>
                                                    <td class='small' style="vertical-align:middle;width:80%"><a href="./ficheCompagnie.php?nomCompagnie=<?php echo $data['nom_compagnie']; ?>"><?php echo $data['nom_compagnie']; ?></a></td>
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


                            </tbody>
                        </table>
                        <p class="p-2 card-text text-end"><a href="./compagnie_liste.php">Plus de mise à jour vers ce lien</a></p>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="./js/random.js"></script>
<?php
include_once 'footer.php';
?>