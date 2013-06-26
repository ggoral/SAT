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
$obra2 = $_GET['obra2'];
$obra3 = $_GET['obra3'];
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

//Insertar paciente en la tabla obrasocia2---SI EXISTE-----------------------------------
if($obra2 != ""){
    $insertarObraSocial2 = "INSERT INTO pacientes_obrasociales (paciente_id, obrasocial_id)
                     VALUES ((SELECT id FROM persona WHERE dni = $dni), $obra2)";
    mysql_query($insertarObraSocial2);
}

//Insertar paciente en la tabla obrasocia3---SI EXISTE-----------------------------------
if($obra3 != ""){
    $insertarObraSocial3 = "INSERT INTO pacientes_obrasociales (paciente_id, obrasocial_id)
                     VALUES ((SELECT id FROM persona WHERE dni = $dni), $obra3)";
    mysql_query($insertarObraSocial3);
};


header("location:listar.php");
?>

