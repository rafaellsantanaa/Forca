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


$consulta = "SELECT B.UserName,A.inviteId FROM invite A inner join users B ON B.userId = A.PersonID_from where A.PersonID_to=$userid and A.result = ''";
$con = mysqli_query($conexao,$consulta) or die (mysqli_error);
?>
    
    <table>
    <h1>Convites</h1>
              <tr>
        
              <th>Desafiante<th>
              <th>Status<th>
              <th>Desafio<th>
            </tr>
<?php
while($dado = $con-> fetch_array()){  
?>          
           
              <tr>
                
                <td> <input type="hidden" name="uid" value="<?php echo $dado["UserName"];?>"> <?php echo $dado["UserName"];?><td>
               
                <td>  <a href="ajax/sendInviteAnswer.php?id=<?=$dado['inviteId'].";"."aceito"?>" class="acept">Aceitar</a> <td>
                
                <td>  <a href="ajax/sendInviteAnswer.php?id=<?=$dado['inviteId'].";"."nao"?>" class="decline">Recusar</a> <td>
                
             
            </tr>
          <?php } ?>
    </table>
    
