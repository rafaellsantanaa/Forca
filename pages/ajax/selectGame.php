<?php
// Incluindo arquivo de conexão
require_once('../conn/conn.php');

$userid = $_GET['id'];
$consulta = "SELECT * FROM game where userId1 = $userid or userId2 = $userid;";
$sql = mysqli_query($conexao,$consulta);
$res = mysqli_fetch_array($sql);
$row = mysqli_num_rows($sql);

if ($row > 0){
    echo $res['gameId'];
    echo "tem jogo".$consulta;?>
    <script language= "JavaScript">
        location.href="gameOnline.php?id=<?php echo $res['gameId'].";".$userid; ?>";
    </script>
<?php
    //header("Location: jogo.php");
}

?>
