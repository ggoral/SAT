<?php
include "../conectar.php";
$id = $_GET['idSecretaria'];
$dni = $_GET['dni'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$provincia = $_GET['provincia'];
$localidad = $_GET['localidad'];
$calle = $_GET['calle'];
$numero = $_GET['numero'];
$telefono = $_GET['telefono'];
$email = $_GET['email'];
if ($email == ''){$email = '-';}




//Actualiza Datos de persona
$editarPersona = "UPDATE persona SET dni='$dni', nombre='$nombre', apellido='$apellido', localidad_id='$localidad', calle='$calle', numero='$numero', telefono='$telefono', email='$email'
                  WHERE id = $id";
mysql_query($editarPersona);
header("location:listar.php");
?>
