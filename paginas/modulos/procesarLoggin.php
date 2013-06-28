
<?php
require_once "../conectar.php";
session_start();


$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select * from usuario as u where u.username = '".$username."' and u.password = ".$password;

$resultado = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($resultado) == 1){
    $usuario = mysql_fetch_array($resultado);
}else{
    $usuario = null;
}

if($usuario){
    $_SESSION['usuario']['id'] = $usuario['id'];
    $_SESSION['usuario']['nombre'] = $username;
    $_SESSION['usuario']['rol'] = $usuario['Roles'];
}else{
    header("location: /SAT/login.php?error=error");
    exit;
}


    header("location: /SAT/index.php");

?>
