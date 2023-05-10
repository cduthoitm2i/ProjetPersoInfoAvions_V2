  </body>

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
<script>
    /*$(document).ready(function() {
        var table = $('#liste_avion').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });*/
    $(document).ready(function() {
        var table = $('#liste_avion').DataTable({
            "pageLength": 25
        });

        table.columns().iterator('column', function(ctx, idx) {
            $(table.column(idx).header()).append('<span class="sort-icon"/>');
        });
    });
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</html>