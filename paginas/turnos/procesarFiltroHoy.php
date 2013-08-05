<?php
$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');

$fechaDesdeInicio = $strfecha." "."00:00:00";
$fechaDesdeFin = $strfecha." "."23:59:00";

$buscador = "(t.fecha_desde >= '$fechaDesdeInicio' and t.fecha_desde <= '$fechaDesdeFin') AND (t.obrasocial_id = os.id)";
$linkBuscador = "";

include 'procesarFiltro.php';

?>