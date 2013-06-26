<?php
$filtro =" t.fecha_desde";

if (array_key_exists('ordenP', $_GET)) {
      $filtro = " CONCAT(p2.nombre, p2.apellido) ".$_GET['ordenP'];
}
if (array_key_exists('ordenH', $_GET)) {
      $filtro = " t.fecha_desde ".$_GET['ordenH'];
}
if (array_key_exists('ordenO', $_GET)) {
      $filtro = " os.nombre ".$_GET['ordenO'];
}
if (array_key_exists('ordenM', $_GET)) {
      $filtro = " CONCAT(p1.nombre, p1.apellido) ".$_GET['ordenM'];
}


?>
