<?php
include_once 'header.php';
?>
<section>
    <div class="container">
        <h1>Recherche d'une compagnie aérienne</h1>
        <p>Saisissez le nom de l'opérateur aérien dans le formulaire ci-dessous.</p>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title">Chercher un avion ou une compagnie</h5>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Chercher</button>
                        </form>
                        <p class="p-2 card-text text-center">Saisir le nom d'une compagnie aérienne.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>