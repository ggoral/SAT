<?php
$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');

$buscador = "DAY(t.fecha_desde) = DAY(CURRENT_DATE())";
$linkBuscador = "";

include 'procesarFiltro.php';

?>