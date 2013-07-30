<?php

include '../conectar.php';
$dia = $_GET["id"];
$idMedico = $_GET["idM"];
$borrar = "DELETE FROM diasatencion WHERE id='$dia'";
mysql_query($borrar);


header("location: diasAtencion.php?id=$idMedico");
    
?>
