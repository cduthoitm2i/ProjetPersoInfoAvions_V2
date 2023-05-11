<?php
// on récupère la date du jour
$aujourdhui = date("Y-m-d");
// On fait la différence entre la date d'ajourd'hui et la date du premier vol de l'avion
$diff = date_diff(date_create($datePremierVol), date_create($aujourdhui));
// On affiche le résultat au format année et mois
echo $diff->format('%y.%m' . '&nbsp;ans'); 
?>