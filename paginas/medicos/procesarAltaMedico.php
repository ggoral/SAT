<?php

include '../conectar.php';

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


$sqlExiste = "Select * from medico inner join persona on( medico.id = persona.id) where matricula ='$matricula' and eliminado = false";
$resultadoExiste = mysql_query($sqlExiste);
$medico = mysql_fetch_array($resultadoExiste);


if($medico){
    echo "estoy en el if";
    header('location: alta.php?errormatricula='.$matricula);
   exit;
}
//Inserto una nueva persona
$insertoPersona = "INSERT INTO persona (id, nombre, apellido, dni, provincia, localidad, numero, calle, telefono, email, eliminado) 
    VALUES (null, '$nombre', '$apellido', '$dni', '$provincia', '$localidad', '$numero', '$calle', '$telefono', '$email', 0)";

mysql_query($insertoPersona);

//Inserto esa persona en la tabla medico
$insertoMedico = "insert into medico (id, matricula) values ((select id from persona where dni =  '$dni'),'$matricula')";
mysql_query($insertoMedico);

//Inserto el medico en la tabla medicos_especialidades
$insertoMedicoEnEspecialidad = "insert into medicos_especialidades (medico_id, especialidad_id) values ((select id from persona where dni =  '$dni'), '$idEspecialidad')";
mysql_query($insertoMedicoEnEspecialidad);

//Inserto el medico en la tabla medicos_obrassociales
$insertoMedicoEnObraSocial = "insert into medicos_obrasociales (medico_id, obrasocial_id) values ((select id from persona where dni =  '$dni'), '$idObraSocial')";
mysql_query($insertoMedicoEnObraSocial);


header('location: listar.php');
    
?>
