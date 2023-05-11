<?php
include_once 'header.php';
require './includes/setvariablecompagnie.php';
?>
<section>
    <div class="container">
        <h1>Fiche compagnie</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">NOM COMPAGNIE&nbsp;: <?php echo "$nomCompagnie" ?></h5>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="small">Pays&nbsp;:</td>
                                    <td class="small">drapeau image</td>
                                </tr>
                                <tr>
                                    <td class="small">Date&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">Code&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">Callsign&nbsp;:</td>
                                    <td class="small"></td>
                                </tr>
                                <tr>
                                    <td class="small">siteweb&nbsp;:</td>
                                    <td class="small">www.xxx.com</td>
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