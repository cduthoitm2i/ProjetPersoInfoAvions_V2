<?php

$servername = "mysql-cduthoit59.alwaysdata.net";
$dBUsername = "308217";
$dBPassword = "Q7NxCwCkazcbUsj";
$dBName = "cduthoit59_bd_avions_airbus_v2";



$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
