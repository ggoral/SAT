<?php
$filtro =" pe.apellido";
if (array_key_exists('ordenApe', $_GET)) { $filtro = " CONCAT(pe.apellido, pe.nombre) ".$_GET['ordenApe'];}

if (array_key_exists('ordenProv', $_GET)) { $filtro = " CONCAT(pro.nombre) ".$_GET['ordenProv'];}

if (array_key_exists('ordenLoc', $_GET)) { $filtro = " CONCAT(l.nombre) ".$_GET['ordenLoc'];}
?>
