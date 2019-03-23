<?php
// Incluindo arquivo de conexão
require_once('conn/conn.php');

$userid = $_GET['id'];
$userid = preg_split("/;/",$userid);
$useridMain = $userid[1];


$consulta = "SELECT * FROM game where userId1 = $userid[1] or userId2 = $userid[1];";

$sql = mysqli_query($conexao,$consulta);
$res = mysqli_fetch_array($sql);
$row = mysqli_num_rows($sql);


if ($row > 0){
    //RECEBENDO INFORMAÇÕES DO JOGO /PALAVRA/ USUARIOS ETC
    $consulta = "SELECT * FROM game where gameId ='".$res['gameId']."'";
 
    $sql = mysqli_query($conexao,$consulta);
    $res = mysqli_fetch_array($sql);
    $row = mysqli_num_rows($sql);

    if ($row>0){

        $gameId = $res['gameId'];
        if ($useridMain === $res['userId1'])
        {
            $userid2 = $res['userId2'];
        }else{
            $userid2 = $res['userId1'];
        }
        $word = $res['word'];
        
        //Consulta nome de usuarios
        $consulta = "SELECT * FROM users where userId = $useridMain;";
        $sql = mysqli_query($conexao,$consulta);
        $res = mysqli_fetch_array($sql);
        $row = mysqli_num_rows($sql);
        if($row>0){
            $userNameMain = $res['UserName'];
        }
        
        $consulta = "SELECT * FROM users where userId = $userid2;";
        $sql = mysqli_query($conexao,$consulta);
        $res = mysqli_fetch_array($sql);
        $row = mysqli_num_rows($sql);
        if($row>0){
            $userName2 = $res['UserName'];
        }
    }

    //echo $word.$useridMain.$userNameMain.$userid2.$userName2;
    ?>
    <script language= "JavaScript">
        location.href="gameOnline.php?id=<?php echo $res['gameId'].";".$userid; ?>";
    </script>
<?php
    //header("Location: jogo.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../css/style.css"> 
      <title>REDIRECIONANDO ONLINE</title>

      <meta charset="utf-8">



      <script type = "text/javascript">
        var count=new Number();
        var count=61;

        function start(){
            if ((count-1) >=0) {
                count = count-1;
                time.innerText=count;
                setTimeout('start();',1000);
            }

        }

      </script>

  </head>
   <body onload="start();">
        <div class = "gameOnline"> 

            <div id = "fraseInicio">
                <br><br><br>
                <h1>Desafio com <?php echo $userName2 ?> iniciado! <br><br> Palavra: <?php echo $word ?><h1>
            </div>

            <div id = "time" >
            </div>
            <div id = "palavra">
                <input type = "text" id= "letra0" maxlength="1">
                <input type = "text" id= "letra1" maxlength="1">
                <input type = "text" id= "letra2" maxlength="1">
                <input type = "text" id= "letra3" maxlength="1">
                <input type = "text" id= "letra4" maxlength="1">
                <input type = "text" id= "letra5" maxlength="1">
                <input type = "text" id= "letra6" maxlength="1">
                <input type = "text" id= "letra7" maxlength="1">
                <input type = "text" id= "letra8" maxlength="1">
                <input type = "text" id= "letra9" maxlength="1">
                <input type = "text" id= "letra10" maxlength="1">
                <input type = "text" id= "letra11" maxlength="1">
                <input type = "text" id= "letra12" maxlength="1">
                <input type = "text" id= "letra13" maxlength="1">
                <input type = "text" id= "letra14" maxlength="1">
                <input type = "text" id= "letra15" maxlength="1">
                <input type = "text" id= "letra16" maxlength="1">
                <input type = "text" id= "letra17" maxlength="1">
            </div>
            
            <div id = "letraSugerida">
                <br><br><br>
                <input type ="Text" class="letra"  maxlength="1" size="1" style="text-transform:uppercase">                
                <input type="submit" class='start-btn' value ="ENVIAR">
            </div>

        </div>

  </body>
</html>