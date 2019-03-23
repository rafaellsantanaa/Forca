<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');

$username = $_GET['id'];
//DIVIDE ID TO E FROM
$result = preg_split("/;/",$username);

//echo $result[0];
//echo $result[1];

//ATUALIZA O RESULTADO NA TABELA NAO- JOGO NAO ACEITO  ACEITO- JOGO ACEITO
$consulta = "UPDATE invite set result = '$result[1]' where inviteId = $result[0];";

$res = mysqli_query($conexao,$consulta);

//SE O USUARIO ACEITAR JOGO ENTÃO O GAME É CRIADO

if ($result[1]==="aceito"){
    require_once('createGame.php');
}else{
    $consulta = "DELETE FROM invite where inviteId = $result[0];";
    $res = mysqli_query($conexao,$consulta);
    header("Location: ../oponentOnline.php");
}
//header("Location: ../oponentOnline.php");
?>
