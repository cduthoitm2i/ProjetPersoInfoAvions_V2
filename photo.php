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
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="img col-md-4 col-xs-6 mb-2 p-3">
                                                <img src="./images/photos/<?php echo $data['photo_avion']; ?>.jpg" style="width:350px" />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="p-5">
                                                <div>
                                                    <table class="table table-borderless" style="width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="vertical-align:middle;width:50%">
                                                                    <strong>Avion</strong>&nbsp;: <?php echo $data['modele_avion']; ?><br/>
                                                                    <strong>Compagnie</strong>&nbsp;: <?php echo $data['nom_compagnie']; ?>
                                                                </td>
                                                                <td style="vertical-align:middle;width:50%">
                                                                    <strong>Immatriculation</strong>&nbsp;: <?php echo $data['immatriculation_compagnie_avion']; ?><br/>
                                                                    <strong>MSN</strong>&nbsp;: <?php echo $data['numero_serie_avion']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Lieu et date</strong>&nbsp;: <br/>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <strong>Photographe</strong>&nbsp;: <br/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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