<?php
//--------- BDD
$mysqli = new mysqli("mysql-cduthoit59.alwaysdata.net", "308217", "Q7NxCwCkazcbUsj", "cduthoit59_bd_avions_airbus");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
$mysqli->set_charset("utf8");
 
//--------- SESSION
//session_start();
 
//--------- CHEMIN
define("RACINE_SITE","/ProjetPersoInfoAvions/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");