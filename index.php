<?php
// Incluindo arquivo de conexão e verificando se possui sessão aberta
require_once('pages/conn/conn.php');
?>
<?php
  session_start();
  if ((!isset($_SESSION["username"]))){
  }else{
    header("Location: pages/oponentOnline.php");
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>JOGO DA FORCA</title>
    <meta charset="utf-8">
  </head>
  <body>   
      <div class = "inicio">
      <br><br><center>
        <div id = "textoUN">
          <H1>FORCA</H1> <bR>
          <h4> Digite um nome de usuário: </h4>
        </div>

        <form name = "login" method="post" action="pages/connectToDB.php">
          <input type ="text" class="username" name="username" style="text-transform:uppercase"/>
          <br>
          <!--<a href="pages/oponentOnline.php"> </a>*-->
          
          <input type="submit" class='start-btn' value ="ENTRAR">
        </form>
      </div>

      
      
  </body>
</html>