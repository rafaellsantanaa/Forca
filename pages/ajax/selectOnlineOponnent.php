<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');

session_start();
  if (!isset($_SESSION["username"])){
      header("Location: ../index.php");
      exit;
  }else{
    $userid = $_SESSION["userid"];
    
    $username=$_SESSION["username"];
    
  }


$consulta = "SELECT * FROM Users where active=1 and UserId != $userid";
$con = mysqli_query($conexao,$consulta) or die (mysqli_error);
?>
    
    <table>
    <h1>Jogadores Online</h1>
            <tr>
              <th>ID<th>
              <th>Usuario<th>
              <th>Status<th>
              <th>Desafio<th>
            </tr>
<?php
while($dado = $con-> fetch_array()){  
?>          
           
              <tr>
                <td> <input type="hidden" name="uid" value="<?php echo $dado["UserId"];?>"> <?php echo $dado["UserId"];?><td>
                
                <td> <input type="hidden" name="uid" value="<?php echo $dado["UserName"];?>"> <?php echo $dado["UserName"];?><td>
                <td>online<td>
                <td>
                <? $game = $dado['UserId'] ?>
                <a href="ajax/sendInvite.php?id=<?=$dado['UserId'].";".$userid?>">Jogar</a>
             
            </tr>
          <?php } ?>
    </table>
    
