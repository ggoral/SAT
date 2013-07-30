<?php
include "procesarSeguridad.php";
?>

<?php
include '../conectar.php';
$idOS = $_GET['id'];
$query =  "UPDATE `obrasocial` SET `habilitada`='0' WHERE id = $idOS";
mysql_query($query);
header('location: listar.php');
?>