<?php
    require_once("./Avions.php");
    $info = new Avions(1,"50010","Airbus A220 CS100","Swiss International Air Lines");
    echo $info->getNumeroSerieAvion() . " - " .$info->getModeleAvion(); 
    $info->setNumeroSerieAvion("50011");
    echo "<br>" . $info->getNumeroSerieAvion() . " - " .$info->getModeleAvion(); 
    //$info->setmodeleAvion("Airbus A220 CS100");
    //$info->setnomCompagnie("Swiss International Air Lines");
