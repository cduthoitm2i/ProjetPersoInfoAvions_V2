</body>
<script>
    /*$(document).ready(function() {
        var table = $('#liste_avion').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });*/
    $(document).ready(function() {
        var table = $('#liste_avion').DataTable({
            "pageLength": 25,
            // Problème de perte des flèches en ajoutant language
            //language: {
            //    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            //},
        });

        table.columns().iterator('column', function(ctx, idx) {
            $(table.column(idx).header()).append('<span class="sort-icon"/>');
        });
    });
    $(document).ready(function() {
        var table = $('#liste_compagnie').DataTable({
            "pageLength": 25
        });

        table.columns().iterator('column', function(ctx, idx) {
            $(table.column(idx).header()).append('<span class="sort-icon"/>');
        });
    });
    $(document).ready(function() {
        var table = $('#liste_avion_par_date').DataTable({
            "order": [0, 'desc'],
            "pageLength": 25
        });

        table.columns().iterator('column', function(ctx, idx) {
            $(table.column(idx).header()).append('<span class="sort-icon"/>');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<footer id="sticky-footer" class="flex-shrink-0 py-4 text-dark" style="background-color: #e3f2fd;">
    <div class="container">
        <div class="row">
            <div class="col-md-4"><span class="align"><small>Copyright &copy; 2023 Airbus web</small></span></div>
            <div class="col-md-4 offset-md-4"><span><small>
                        <?php
                        include './partials/date.php';
                        ?>
                    </small></span></div>
        </div>
    </div>
</footer>

</html>