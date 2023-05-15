<?php
$file = basename($path, ".php"); 
//if ($file="ficheAvion") {
$numeroSerieAvion = filter_input(INPUT_GET,'numeroSerieAvion');
$nomAvion = filter_input(INPUT_GET,'nomAvion');
$modeleAvion = filter_input(INPUT_GET,'modeleAvion');
$nomCompagnie = filter_input(INPUT_GET,'nomCompagnie');
$datePremierVol = filter_input(INPUT_GET,'datePremierVol');
$immatEssai = filter_input(INPUT_GET,'immatEssai');
$immatCompagnie = filter_input(INPUT_GET,'immatCompagnie');
$confF = filter_input(INPUT_GET,'confF');
$confC = filter_input(INPUT_GET,'confC');
$confW = filter_input(INPUT_GET,'confW');
$confY = filter_input(INPUT_GET,'confY');
$hexcode = filter_input(INPUT_GET,'hexcode');
$moteur = filter_input(INPUT_GET,'moteur');
$statut = filter_input(INPUT_GET,'statut');
//} elseif ($file="ficheCompagnie") {
    //$nomCompagnie = filter_input(INPUT_GET,'nomCompagnie'); 
    //$immatCompagnie = filter_input(INPUT_GET,'immatCompagnie');
//}
?>