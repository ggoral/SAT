<?php

include '../conectar.php';

$errormatricula = $_GET["matricula"];

echo $errormatricula;

$sqlExiste = "Select persona.id AS id from persona inner join medico on (persona.id = medico.id) where matricula ='".$errormatricula."' and eliminado = false" ;
//
$resultadoExiste = mysql_query($sqlExiste);
$medico = mysql_fetch_array($resultadoExiste);

if($medico && ($medico["id"] != $_GET["idpersona"])){
    header('location: modificar.php?id='.$_GET["idpersona"].'&errormatricula='.$errormatricula);
    exit;
}

$id = $_GET["idpersona"];
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$localidad = $_GET["localidad"];
$provincia = $_GET["provincia"];
$dni = $_GET["dni"];
$calle = $_GET["calle"];
$numero = $_GET["numero"];
$email = $_GET["email"];
$telefono = $_GET["telefono"];
$matricula = $_GET["matricula"];
$idEspecialidad = $_GET["especialidad"];
$idObraSocial = $_GET["obra"];

//Inserto una nueva persona
$updatePersona = "UPDATE persona SET  nombre='$nombre', apellido='$apellido', dni='$dni', provincia= '$provincia', localidad='$localidad', numero='$numero', calle='$calle', telefono='$telefono', email='$email'
                   WHERE id='$id'";

mysql_query($updatePersona);

//Inserto esa persona en la tabla medico
$updateMedico = "UPDATE medico SET id='$id', matricula='$matricula'
                  WHERE id= '$id'";
mysql_query($updateMedico);

//Inserto el medico en la tabla medicos_especialidades
$updateMedicoEnEspecialidad = "UPDATE medicos_especialidades SET medico_id='$id', especialidad_id='$idEspecialidad' WHERE medico_id='$id'";
                               
mysql_query($updateMedicoEnEspecialidad);

//Inserto el medico en la tabla medicos_obrassociales
$updateMedicoEnObraSocial = "UPDATE medicos_obrasociales SET medico_id='$id', obrasocial_id='$idObraSocial' WHERE medico_id='$id'";
mysql_query($updateMedicoEnObraSocial);


header('location: listar.php');
?>
