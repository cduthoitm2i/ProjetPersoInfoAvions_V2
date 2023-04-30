<?php
// Set the new timezone
date_default_timezone_set('Europe/Paris');
$date = date('d-m-y');
$heure = date('h:i:s');
echo "Nous sommes le $date, il est $heure";
?>
