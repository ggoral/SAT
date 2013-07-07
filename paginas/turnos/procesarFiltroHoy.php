<?php
$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');

$buscador = "DAY(t.fecha_desde) = DAY(CURRENT_DATE())AND (t.obrasocial_id = os.id)";
$linkBuscador = "";

include 'procesarFiltro.php';

?>