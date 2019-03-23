<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');

$username = $_GET['id'];
//DIVIDE ID TO E FROM
$result = preg_split("/;/",$username);

$consulta = "select * from invite where  personID_to = $result[0] and personID_from = $result[1];";
$res = mysqli_query($conexao,$consulta);
$row = mysqli_num_rows($res);
echo $row;

//SE O CONVITE NÃO EXITE NO BANCO, ELE INSERE NA TABELA
if ($row > 0){
}else{
    $consulta =  "INSERT IGNORE INTO invite SET personID_to = $result[0], personID_from = $result[1]";
    $res = mysqli_query($conexao,$consulta);    
}

header("Location: ../oponentOnline.php");
?>
