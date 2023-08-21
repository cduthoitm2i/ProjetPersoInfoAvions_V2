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
        <!-- Select dropdown -->
        <div class="d-flex flex-row-reverse bd-highlight mb-3">
            <form action="photo.php" method="post">
                <select name="records-limit" id="records-limit" class="custom-select">
                    <option disabled selected>Records Limit</option>
                    <?php foreach ([5, 10, 15, 20] as $limit) : ?>
                        <option <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?> value="<?= $limit; ?>">
                            <?= $limit; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
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



            $query = "SELECT * 
            FROM avion a 
            INNER JOIN compagnie c 
            ON a.id_compagnie = c.id_compagnie 
            WHERE (NOT(photo_avion='')) 
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
        <?php
         $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
         $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
         $paginationStart = ($page - 1) * $limit;


         
         $avion = $pdo->query("SELECT * FROM avion LIMIT $paginationStart, $limit")->fetchAll();
         // Get total records
         $cpt = $pdo->query("SELECT count(id_avion) AS id_avion FROM avion")->fetchAll();
         $allRecrods = $cpt[0]['id_avion'];
         
         // Calculate total pages
         $totalPages = ceil($allRecrods / $limit);
         // Prev + Next
         $prev = $page - 1;
         $next = $page + 1;
        ?>
        <nav aria-label="Page navigation example mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $totalPages; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="photo.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $totalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>



    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script>
    (function(document) {
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

    $(document).ready(function() {
        $('#records-limit').change(function() {
            $('form').submit();
        })
    });
</script>
<?php
include_once 'footer.php';
?>