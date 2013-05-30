<?php

include '../conectar.php';

//print_r($_GET);exit;

$idOS = $_GET["idOS"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `obrasocial` SET `nombre`='$nombre' WHERE id = $idOS";
mysql_query($consulta);

header('location: listar.php');
?>
