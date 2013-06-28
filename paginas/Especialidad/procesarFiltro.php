<?php
$filtro =" e.nombre";
if (array_key_exists('ordenNom', $_GET)) { $filtro = " CONCAT(e.nombre) ".$_GET['ordenNom'];}
?>
