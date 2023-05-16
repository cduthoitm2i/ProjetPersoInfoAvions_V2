<?php
// on remplace le x par le &times; dans la description de la motorisation dans la fiche Avion
$moteur  = $data['motorisation_avion'];
$search = array(" x ");
$replace   = array(" &times; ");
$newmoteur = str_replace($search, $replace, $moteur);
echo $newmoteur;
