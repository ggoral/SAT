<?php
$idObra = $_GET['id'];
$idPaciente = $_GET['idPaciente'];
include '../conectar.php';
$query = "DELETE FROM pacientes_obrasociales 
          WHERE paciente_id = $idPaciente AND obrasocial_id = $idObra";
mysql_query($query);
header("location: obrasSociales.php?id=$idPaciente");
?>
