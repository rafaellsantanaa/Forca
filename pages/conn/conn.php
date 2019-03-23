<?php

$dbhost 	= "localhost";
$dbname		= "game";
$dbuser		= "root";
$dbpass		= "";
 
// database connection
$conexao = mysqli_connect ($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysqli_select_db($conexao,$dbname) or die (mysql_error());
?>
