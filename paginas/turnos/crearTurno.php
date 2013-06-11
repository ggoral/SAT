<?php

include '../conectar.php';

print_r($_POST);

$paciente_dni = $_POST["dni"];
$especialidad_id = $_POST["especialidad"];
$medico_id = $_POST["medico"];
$fechaturno = $_POST["fechaturno"];
$horaturno = $_POST["turno"];
$obrasocial = $_POST["obraSocial"];


$sqlPaciente = "select * from persona as p
                inner join paciente as pa on(p.id = pa.id)
                where p.dni ='".$paciente_dni."'";



$resultadoSqlPaciente = mysql_query($sqlPaciente);
$paciente = mysql_fetch_array($resultadoSqlPaciente);

$fechaHora = $fechaturno." ".$horaturno;
$objetoFechaHora = new \DateTime($fechaHora);
$fechaHora = $objetoFechaHora->format("Y-m-d H:i:s");
$objetoFechaHora->modify('+30 minutes');


$sql = "Insert into turno (id,medico_id,paciente_id,obrasocial_id,fecha_desde,fecha_hasta,asistencia,eliminado) Values
    (null,$medico_id,".$paciente["id"].",$obrasocial,'".$fechaHora."','".$objetoFechaHora->format("Y-m-d H:i:s")."',0,0)";

mysql_query($sql);
        


header("location:listarTurnosSecretaria.php");

?>
