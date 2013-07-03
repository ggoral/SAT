<?php

$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');
//$strfecha = $fechaHOY->format('Y-m-d H:i:s');

$buscador = "t.fecha_desde > '".$strfecha."'";
$linkBuscador = "";

if (array_key_exists('fechaDesde', $_GET)) {
    if ($_GET['fechaDesde'] != "") {

        $fechaD = new \DateTime($_GET["fechaDesde"]);

        $buscador = "t.fecha_desde >= '" . $fechaD->format("Y-m-d") . "' ";
        $linkBuscador = $linkBuscador . "&fechaDesde=" . $_GET['fechaDesde'];
    }
}

if (array_key_exists('fechaHasta', $_GET)) {
    if ($_GET['fechaHasta'] != "") {
        $fechaH = new \DateTime($_GET["fechaHasta"]);
        $buscador = $buscador . " and t.fecha_hasta <= '" . $fechaH->format("Y-m-d") . "' ";
        $linkBuscador = $linkBuscador . "&fechaHasta=" . $_GET['fechaHasta'];
    }
}


include 'procesarFiltro.php';
?>
