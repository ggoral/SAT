<?php

include '../conectar.php';

$nombre = $_GET["nombre"];

$consulta = "INSERT INTO `obrasocial`(`id`, `nombre`) VALUES (null,'$nombre')";

//echo $consulta;exit;

mysql_query($consulta);

                
header('location: listar.php');
?>
