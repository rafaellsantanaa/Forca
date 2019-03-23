<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');

//VERIFICA PELO INVITEID QUAIS SÃO OS JOGARES
$consulta = "select * from invite where inviteId = $result[0];";
$sql = mysqli_query($conexao,$consulta);
$row = mysqli_num_rows($sql);

if ($row>0){
    $var = mysqli_fetch_row($sql);
    //SELECIONA O ID DOS DOIS JOGARES
    $playerId1=$var[1];
    $playerId2=$var[2];

    //SELECIONA UMA PALAVRA ALEATORIA PARA O JOGO
    $consulta = "select word from word ORDER BY RAND() LIMIT 1";
    $sql = mysqli_query($conexao,$consulta);
    $var = mysqli_fetch_row($sql);
    $word=$var[0];
   
    
    $consulta =  "INSERT IGNORE INTO game SET userId1 = $playerId1, userId2 = $playerId2, word = '$word'";
    $sql = mysqli_query($conexao,$consulta);
    header("Location: ../oponentOnline.php");
}

?>
