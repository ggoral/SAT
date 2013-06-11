<?php
include '../conectar.php';
$idOS = $_GET['id'];
$query =  "UPDATE `obrasocial` SET `habilitada`='1' WHERE id = $idOS";
mysql_query($query);
header('location: listar.php');
?>
