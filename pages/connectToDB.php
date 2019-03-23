<?php
// Incluindo arquivo de conexão
require_once('conn/conn.php');
?>



<html>
<head>
<title> Autenticando</title>
<script type ="text/javascript">

    function loginsuccessfully(){
        setTimeout("window.location='oponentOnline.php'",10);
    }

    function loginFailed(){
        setTimeout("window.location='../index.php'",10);
    }
</script>

</head>

<body>
<?php
session_start();
$username = $_POST['username'];
$sql = mysqli_query($conexao,"SELECT * FROM users where UserName = '$username' and active=0") ;
$row = mysqli_num_rows($sql);


if ($row>0){
    $var = mysqli_fetch_row($sql);
    $sql = mysqli_query($conexao,"UPDATE users set active=1 where UserName = '$username'") ;
   
    $_SESSION['username']=$_POST['username'];
    $_SESSION['userid']=$var[0];
    echo "<script>loginsuccessfully()</script>";
}else{
    echo "<script>loginFailed()</script>";
}
?>

</body>

</html>