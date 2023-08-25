<?php
include_once 'header.php';
?>
<?php
$hostname = "mysql-cduthoit59.alwaysdata.net";
$username = "308217";
$password = "Q7NxCwCkazcbUsj";
try {
    $connection = new PDO("mysql:host=$hostname;dbname=cduthoit59_bd_avions_airbus_v2", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
<?php
// Database


// Set session
session_start();
if (isset($_POST['records-limit'])) {
    $_SESSION['records-limit'] = $_POST['records-limit'];
}

$limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
$avion = $connection->query("SELECT * FROM avion a 
  INNER JOIN compagnie c 
  ON a.id_compagnie = c.id_compagnie 
  WHERE (NOT(photo_avion='')) 
  ORDER BY nom_avion 
  DESC LIMIT $paginationStart, $limit")->fetchAll();
// Get total records
$sql = $connection->query("SELECT count(id_avion) AS id_avion FROM avion  WHERE (NOT(photo_avion=''))")->fetchAll();
$allRecrods = $sql[0]['id_avion'];

// Calculate total pages
$totalPages = ceil($allRecrods / $limit);
// Prev + Next
$prev = $page - 1;
$next = $page + 1;
?>
<!-- BackToTop Button -->
<a href="javascript:void(0);" id="backToTop" class="back-to-top">
    <i class="arrow"></i><i class="arrow"></i>
</a>

<div class="container mt-5">
    <h1>Photographies</h1>

    <!-- Select dropdown -->
    <div class="d-flex flex-row-reverse bd-highlight mb-3">
        <form action="photo.php" method="post">
            <select name="records-limit" id="records-limit" class="custom-select">
                <option disabled selected>photos par/page</option>
                <?php foreach ([5, 10, 15, 20] as $limit) : ?>
                    <option <?php if (isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?> value="<?= $limit; ?>">
                        <?= $limit; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . $prev;
                                            } ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php if ($page == $i) {
                                            echo 'active';
                                        } ?>">
                    <a class="page-link" href="photo.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php if ($page >= $totalPages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page >= $totalPages) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . $next;
                                            } ?>">Next</a>
            </li>
        </ul>
    </nav>
    <!-- Datatable -->
    <table class="table table-bordered mb-5">

        <tbody>
            <?php foreach ($avion as $data) : ?>
                <tr>

                    <td style="vertical-align:middle;width:30%">
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
                    </td>
                    <td style="width:35%">
                        <strong>Avion</strong>&nbsp;: <?php echo $data['modele_avion']; ?><br />
                        <strong>Compagnie</strong>&nbsp;: <?php echo $data['nom_compagnie']; ?>
                    </td>
                    <td style="width:35%">
                        <strong>Immatriculation</strong>&nbsp;: <?php echo $data['immatriculation_compagnie_avion']; ?><br />
                        <strong>MSN</strong>&nbsp;: <?php echo $data['numero_serie_avion']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Pagination -->
    <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . $prev;
                                            } ?>">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php if ($page == $i) {
                                            echo 'active';
                                        } ?>">
                    <a class="page-link" href="test.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php if ($page >= $totalPages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link" href="<?php if ($page >= $totalPages) {
                                                echo '#';
                                            } else {
                                                echo "?page=" . $next;
                                            } ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>

<?php
include_once 'footer.php';
?>
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