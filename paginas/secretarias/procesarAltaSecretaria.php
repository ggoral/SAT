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
if ($email == ''){$email = '-';}

//Insertar Secretaria en la tabla persona-----------------------------------------
$insertarPersona = "INSERT INTO persona (usuario_id,nombre, apellido, dni, numero, calle, telefono, email, eliminado, localidad_id)
              VALUES (null, '$nombre', '$apellido', '$dni', '$numero', '$calle', '$telefono', '$email', 0, '$localidad')";
mysql_query($insertarPersona);

//Insertar Secretaria en la tabla Secretaria----------------------------------------
$insertarSecretaria = "INSERT INTO secretaria (id)
                     VALUES ((SELECT id FROM persona WHERE dni = $dni))";
mysql_query($insertarSecretaria);



header("location:listar.php");
?>

