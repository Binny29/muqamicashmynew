<?php

//database configuration
	
	$host       = "localhost";
	$user       = "root";
	$pass       = "";
	$database   = "thepwsdz_apimuqamicash";
$connect    = new mysqli($host, $user, $pass,$database) or die("Error : ".mysql_error());
?>
