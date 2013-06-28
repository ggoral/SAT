<?php
include "procesarSeguridad.php";
?>

<?php

include '../conectar.php';

$errornombre = $_GET["nombre"];

echo $errornombre;

$sqlExiste = "Select * from especialidad where nombre ='".$errornombre."' and eliminado = false" ;
//
$resultadoExiste = mysql_query($sqlExiste);
$especialidad = mysql_fetch_array($resultadoExiste);

if($especialidad && ($especialidad["id"] != $_GET["idEspecialidad"])){
    header('location: modificar.php?id='.$_GET["idEspecialidad"].'&errornombre='.$errornombre);
    exit;
}

$idEspecialidad = $_GET["idEspecialidad"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `especialidad` SET `nombre`='$nombre' WHERE id = $idEspecialidad";
mysql_query($consulta);

header('location: listar.php');
?>
