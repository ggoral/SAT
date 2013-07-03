<?php
$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');

$buscador = "t.fecha_desde = '".$strfecha."'";
$linkBuscador = "";

include 'procesarFiltro.php';

?>