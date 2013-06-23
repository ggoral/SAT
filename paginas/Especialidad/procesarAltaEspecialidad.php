<?php

include '../conectar.php';

$nombre = $_GET["nombre"];

$sqlExiste = "Select * from especialidad where nombre ='".$nombre."' and eliminado = false";
$resultadoExiste = mysql_query($sqlExiste);
$especialidad = mysql_fetch_array($resultadoExiste);


if($especialidad){
    echo "estoy en el if";
    header('location: alta.php?errornombre='.$nombre);
    exit;
}

$consulta = "INSERT INTO `especialidad`(`id`, `nombre`,`habilitada`) VALUES (null,'$nombre',true)";

mysql_query($consulta);

                
header('location: listar.php');
?>
