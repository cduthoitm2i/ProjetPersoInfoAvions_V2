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
        $nomAvion = filter_input(INPUT_GET, "nomAvion");
        $numeroSerieAvion = filter_input(INPUT_GET, "numeroSerieAvion");
        $pdo = seConnecter("./conf/monsite.ini");

        $content = "";
        $lines = selectAllPourListeTab($pdo);
        $headers = "";
        try {
            //$query = "SELECT * FROM avion ORDER BY modele_avion WHERE photo_avion IS NOT NULL DESC";



            $query = "SELECT * 
            FROM avion a 
            INNER JOIN compagnie c 
            ON a.id_compagnie = c.id_compagnie 
            WHERE (NOT(photo_avion='')) 
            AND (nom_avion='$nomAvion' 
            AND numero_serie_avion='$numeroSerieAvion') 
            ORDER BY nom_avion 
            DESC";
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
                                    <div class="col thunb">


                                        <img class="img-fluid" src="./images/photos/<?php echo $data['photo_avion']; ?>.jpg" data-bs-toggle="modal" data-bs-target="#simple-modal" data-bigimage="./images/photos/<?php echo $data['photo_avion']; ?>.jpg">
                                        <div class="modal fade" role="dialog" tabindex="-1" id="simple-modal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content"><button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    <div class="modal-body"><img class="img-fluid" id="image" src=""></div>
                                                </div>
                                            </div>
                                        </div>


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






    </div>
</section>
<script>
    (function (document) {
  "use strict";
  const ready = (callback) => {
    if (document.readyState != "loading") callback();
    else document.addEventListener("DOMContentLoaded", callback);
  };
  ready(() => {
    const img = document.getElementById("image");
    const simpleModal = document.getElementById("simple-modal");
    simpleModal.addEventListener("show.bs.modal", (e) => {
		const bigImage = e.relatedTarget.getAttribute('data-bigimage')
		img.src = bigImage;
    });
  });
})(document);
</script>
<?php
include_once 'footer.php';
?>