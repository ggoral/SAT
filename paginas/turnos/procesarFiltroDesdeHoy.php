<?php
$fechaHOY = new \DateTime();
$strfecha = $fechaHOY->format('Y-m-d');
//$strfecha = $fechaHOY->format('Y-m-d H:i:s');
$buscador = "(t.fecha_desde > '".$strfecha."') AND (t.obrasocial_id = os.id)";
$linkBuscador = "";

if (array_key_exists('fechaDesde', $_GET)) {
    if ($_GET['fechaDesde'] != "") {
        $fechaD = new \DateTime($_GET["fechaDesde"]);
        $fechaD = $fechaD->format("Y-m-d");
//        $buscador = "t.fecha_desde >= '" . $fechaD->format("Y-m-d") . "' ";
        $buscador = "DATE(t.fecha_desde) >= DATE(".$fechaD.") ";
        $linkBuscador = $linkBuscador . "&fechaDesde=" . $_GET['fechaDesde'];
    }
}

if (array_key_exists('fechaHasta', $_GET)) {
    if ($_GET['fechaHasta'] != "") {
        $fechaH = new \DateTime($_GET["fechaHasta"]);
        $fechaH = $fechaH->format("Y-m-d");
//        $buscador = $buscador . " and t.fecha_hasta <= '" . $fechaH->format("Y-m-d") . "' ";
        $buscador = "DATE(t.fecha_desde) >= '".$fechaD."' AND  DATE(t.fecha_desde) <= '".$fechaH."'";
        $linkBuscador = $linkBuscador . "&fechaHasta=" . $_GET['fechaHasta'];
    }
}


include 'procesarFiltro.php';
?>
