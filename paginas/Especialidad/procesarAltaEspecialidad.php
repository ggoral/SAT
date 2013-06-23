<?php

include '../conectar.php';

$nombre = $_GET["nombre"];

$sqlExiste = "Select * from obrasocial where nombre ='".$nombre."' and eliminado = false";
$resultadoExiste = mysql_query($sqlExiste);
$obrasocial = mysql_fetch_array($resultadoExiste);


if($obrasocial){
    echo "estoy en el if";
    header('location: alta.php?errornombre='.$nombre);
    exit;
}
//echo "estoy fuera del if";exit;
$consulta = "INSERT INTO `obrasocial`(`id`, `nombre`) VALUES (null,'$nombre')";

//echo $consulta;exit;

mysql_query($consulta);

                
header('location: listar.php');
?>
