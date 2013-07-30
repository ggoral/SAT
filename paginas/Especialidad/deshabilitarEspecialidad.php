<?php
include "procesarSeguridad.php";
?>

<?php
include '../conectar.php';
$idEspecialidad = $_GET['id'];
$query =  "UPDATE `especialidad` SET `habilitada`= '0' WHERE id = $idEspecialidad";
mysql_query($query);
header('location: listar.php');
?>