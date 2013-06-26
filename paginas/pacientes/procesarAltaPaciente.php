<?php
include "../conectar.php";
$dni = $_GET['dni'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$provincia = $_GET['provincia'];
$localidad = $_GET['localidad'];
$calle = $_GET['calle'];
$numero = $_GET['numero'];
$telefono = $_GET['telefono'];
$email = $_GET['email'];
$obra = $_GET['obra'];
if ($email == ''){$email = '-';}

//Insertar paciente en la tabla persona-----------------------------------------
$insertarPersona = "INSERT INTO persona (usuario_id,nombre, apellido, dni, numero, calle, telefono, email, eliminado, localidad_id)
              VALUES (null, '$nombre', '$apellido', '$dni', '$numero', '$calle', '$telefono', '$email', 0, '$localidad')";
mysql_query($insertarPersona);

//Insertar paciente en la tabla paciente----------------------------------------
$insertarPaciente = "INSERT INTO paciente (id)
                     VALUES ((SELECT id FROM persona WHERE dni = $dni))";
mysql_query($insertarPaciente);

//Insertar paciente en la tabla obrasocial--------------------------------------
$insertarObraSocial = "INSERT INTO pacientes_obrasociales (paciente_id, obrasocial_id)
                     VALUES ((SELECT id FROM persona WHERE dni = $dni), $obra)";
mysql_query($insertarObraSocial);

header("location:listar.php");
?>

