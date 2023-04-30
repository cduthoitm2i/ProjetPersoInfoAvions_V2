<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <h1>Fiche avion</h1>
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
            </div>

            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Liste de production</h5>
                        <table class="table table-sm table-borderless">

                            <tbody>
                                <tr>
                                    <td>Numéro de série</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date premier vol</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Immatriculation d'essai</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Age de l'avion</td>
                                    <td></td>
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