<?php

include '../conectar.php';

//print_r($_GET);exit;

$id = $_GET["id"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `ObraSocial` SET `Tipo`='$nombre' WHERE id = $id";
mysql_query($consulta);

header('location: altaOS.php');
?>
