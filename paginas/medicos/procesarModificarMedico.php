<?php

include '../conectar.php';

$errormatricula = $_GET["matricula"];


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
$dni = $_GET["dni"];
$calle = $_GET["calle"];
$numero = $_GET["numero"];
$email = $_GET["email"];
$telefono = $_GET["telefono"];
$matricula = $_GET["matricula"];
$idEspecialidad = $_GET["especialidad"];

//modifico una  persona
$updatePersona = "UPDATE persona SET dni='$dni', nombre='$nombre', apellido='$apellido', localidad_id='$localidad', calle='$calle', numero='$numero', telefono='$telefono', email='$email'
                  WHERE id = $id";

mysql_query($updatePersona);

//modifico esa persona en la tabla medico
$updateMedico = "UPDATE medico SET matricula='$matricula'
                  WHERE id= '$id'";
mysql_query($updateMedico);

//modifico el medico en la tabla medicos_especialidades
$updateMedicoEnEspecialidad = "UPDATE medicos_especialidades SET especialidad_id='$idEspecialidad'
                                WHERE medico_id='$id'";
                               
mysql_query($updateMedicoEnEspecialidad);


header('location: listar.php');
?>
