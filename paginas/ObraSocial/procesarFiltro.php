<?php
include "procesarSeguridad.php";
?>

<?php
$filtro =" o.nombre";
if (array_key_exists('ordenNom', $_GET)) { $filtro = " CONCAT(o.nombre) ".$_GET['ordenNom'];}
?>
