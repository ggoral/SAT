<?php
include '../conectar.php';

$id = $_GET["id"];
$consulta = "UPDATE `persona` SET `eliminado` = true WHERE id = $id";
mysql_query($consulta);
header('location: listar.php');

?>
