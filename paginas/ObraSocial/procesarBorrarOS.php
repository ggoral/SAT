<?php
include '../conectar.php';

$id = $_GET["id"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `obrasocial` SET `eliminado` = true WHERE id = $id";
mysql_query($consulta);
header('location: listar.php');

?>
