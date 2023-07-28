<?php
include_once 'header.php';
?>
<section>
    <!-- BackToTop Button -->
    <a href="javascript:void(0);" id="backToTop" class="back-to-top">
        <i class="arrow"></i><i class="arrow"></i>
    </a>
    <div class="container">
        <h1>Photographies</h1>
        <?php
        require_once './lib/Connexion.php';
        require_once './daos/clientDAOprod.php';
        $type = filter_input(INPUT_GET, "type");
        $pdo = seConnecter("./conf/monsite.ini");

        $content = "";
        $lines = selectAllPourListeTab($pdo);
        $headers = "";
        try {
            //$query = "SELECT * FROM avion ORDER BY modele_avion WHERE photo_avion IS NOT NULL DESC";



            $query = "SELECT * FROM avion a INNER JOIN compagnie c ON a.id_compagnie = c.id_compagnie WHERE (NOT(photo_avion='')) ORDER BY nom_avion DESC";
            $result = $pdo->query($query);
        ?>
            <?php
            while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="row py-5">
                    <div class="col-md-12 card mb-4">
                        <div class="table-wrap card-body">
                            <div class="container text-left">
                                <div class="row align-items-start">
                                    <div class="col">
                                        <img src="./images/photos/<?php echo $data['photo_avion']; ?>.jpg" style="width:300px" />
                                    </div>
                                    <div class="col">
                                        <strong>Avion</strong>&nbsp;: <?php echo $data['modele_avion']; ?><br />
                                        <strong>Compagnie</strong>&nbsp;: <?php echo $data['nom_compagnie']; ?>
                                    </div>
                                    <div class="col">
                                        <strong>Immatriculation</strong>&nbsp;: <?php echo $data['immatriculation_compagnie_avion']; ?><br />
                                        <strong>MSN</strong>&nbsp;: <?php echo $data['numero_serie_avion']; ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        <?php
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } ?>




        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>


    </div>
</section>
<?php
include_once 'footer.php';
?>