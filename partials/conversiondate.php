<?php
    //la date originale est au format YYYY-mm-dd
    $timestamp = strtotime($data['date_premier_vol_avion']);
    // On transforme la date au format dd/mm/YYYY 
    $newdatePremierVol = date("d/m/Y", $timestamp);
    echo "$newdatePremierVol";
?>
