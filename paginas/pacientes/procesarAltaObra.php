<?php
include '../conectar.php';
$idPaciente = $_GET["id"];
$obra = $_GET["obra"];
$query = "SELECT * from pacientes_obrasociales as po
                        INNER JOIN obrasocial as o ON (po.obrasocial_id = o.id)
                        WHERE po.paciente_id=$idPaciente and obrasocial_id=$obra";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row){
    header('location: altaObra.php?errorObra='.$obra.'&id='.$idPaciente);
   exit;
}
//Inserto una nueva oba
$insertarObra = "INSERT INTO pacientes_obrasociales (paciente_id, obrasocial_id)
              VALUES ($idPaciente, $obra)";
mysql_query($insertarObra);
header("location: obrasSociales.php?id=$idPaciente");
?>
