<?php
include '../conectar.php';

$id = $_GET["id"];
$medico = $_GET["idMedico"];
$consulta = "DELETE FROM medicos_obrasociales WHERE obrasocial_id = $id AND medico_id = $medico ";
mysql_query($consulta);
header("location: obrasSociales.php?id=$medico");

?>
