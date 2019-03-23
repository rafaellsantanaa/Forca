<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');
?>

<?php

session_start();

if (!isset($_SESSION["username"])){
    header("Location: ../../index.php");
    exit;
}else{

$username = $_SESSION["username"];
$sql = mysqli_query($conexao,"UPDATE users set active=0 where UserName = '$username'");
session_destroy();
header("Location: ../../index.php");
}
?>