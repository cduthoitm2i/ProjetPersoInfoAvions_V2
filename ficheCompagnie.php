<?php
include_once 'header.php';
require './includes/setvariablecompagnie.php';
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
            $query = "SELECT * FROM compagnie WHERE nom_compagnie='$nomCompagnie'";            
            $result = $pdo->query($query);
            $data=$result->fetch(PDO::FETCH_ASSOC);
        ?>
    <div class="container">
        <h1>Fiche compagnie</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">NOM COMPAGNIE&nbsp;: <?php echo "$nomCompagnie" ?> <a href="https://<?php echo $data['site_web_compagnie']?>" target="_blank"><img src="./images/logo_compagnie/<?php echo $data['logo_compagnie']?>" style="width:150px;float:right" alt="Logo compagnie"/></a></h5>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="small">Pays&nbsp;:</td>
                                    <td class="small"><img src="./images/logo_pays/<?php echo $data['drapeau_pays']?>" style="width:25px" alt="Drapeau"/> <?php echo $data['pays_compagnie']?></td>
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