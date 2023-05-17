<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <h1>Liste des compagnies aériennes</h1>
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
            $query = "SELECT DISTINCT * FROM compagnie";
            $result = $pdo->query($query);
        ?>

            <div class="row py-5">
                <div class="col-lg-12 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="liste_compagnie" style="width:100%" class="table table-bordered dt-responsive">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;vertical-align:middle">Nom compagnie</th>
                                            <th style="text-align:center;vertical-align:middle">Pays</th>
                                            <th style="text-align:center;vertical-align:middle">Logo compagnie</th>
                                            <th style="text-align:center;vertical-align:middle">Site web</th>
                                            <th style="text-align:center;vertical-align:middle">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {

                                        ?>
                                             <tr>
                                                <td class='small' style="vertical-align:middle"><a href="./ficheCompagnie.php?nomCompagnie=<?php echo $data['nom_compagnie']; ?>"><?php echo $data['nom_compagnie']; ?></a></td>
                                                <td class='small' style="vertical-align:middle"><img src="./images/logo_pays/<?php echo $data['drapeau_pays']?>" style="width:25px" alt="Drapeau"/> <?php echo $data['pays_compagnie']?></td>
                                                <td class='small' style="text-align:center;vertical-align:middle"><a href="https://<?php echo $data['site_web_compagnie']?>" target="_blank"><img src="./images/logo_compagnie/<?php echo $data['logo_compagnie']?>" style="width:100px" alt="Logo compagnie"/></a></td>
                                                <td class='small' style="vertical-align:middle"><a href="https://<?php echo $data['site_web_compagnie']?>" target="_blank"><?php echo $data['site_web_compagnie']?></a></td>
                                                <td class='small' style="vertical-align:middle"><?php echo $data['statut_compagnie']; ?></td>
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
                            <p style="text-align:right"><a href="./impPDFcompagnie.php">Enregistrer la liste au format PDF</a></p>
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