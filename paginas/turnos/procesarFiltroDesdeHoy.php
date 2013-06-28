<?php

$buscador = "DAY(t.fecha_desde) >= DAY(CURRENT_DATE())";
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
