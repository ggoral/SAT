<?php

include '../conectar.php';
$dia = $_GET["id"];

$borrar = "DELETE FROM diasatencion WHERE id='$dia'";
mysql_query($borrar);


header('location: listar.php');
    
?>
