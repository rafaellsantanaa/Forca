<?php
// Incluindo arquivo de conexão
require_once('conn/conn.php');
?>

<?php
  session_start();
  if (!isset($_SESSION["username"])){
      header("Location: ../index.php");
      exit;
  }else{
    $username = $_SESSION["username"];
    $userid = $_SESSION["userid"];
    $consulta = "SELECT * FROM Users where active=1 and UserId != $userid";
    $con = mysqli_query($conexao,$consulta) or die (mysqli_error);
  }

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
        
      <title>JOGADORES ONLINE</title>
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/style.css">

      <meta charset="utf-8">


      
      <script type="text/javascript">
      
        

      </script>
        
      <!--FUNÇÃO QUE INICIA O CONVITE DO DUELO -->
      <script type="text/javascript">

       var tempo = window.setInterval(carrega, 1000);
        function carrega()
        {
        $('#onlineusers').load("ajax/selectOnlineOponnent.php");
        $('#onlineinvite').load("ajax/selectInvite.php");
        $('#gamestart').load("ajax/selectGame.php?id=<?=$userid?>")
        }

      </script>
      <!-- FIM DA FUNÇÃO -->


  </head>
  <body>
      
      <div class = "oponente">
       
        <br>
        <div id = "loguser">
          <?php ECHO "Olá $username"."!  :)"?>
          <a href="ajax/logout.php">| Sair |</a>
        </div>
        
        

        <div id = "onlineusers">
      
        </div>

        <div id = "onlineinvite">

        </div>
        
        <div id = "gamestart">

        </div>
      
      </div>
  </body>

  </body>
</html>