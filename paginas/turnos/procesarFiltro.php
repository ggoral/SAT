<?php

$filtro = " t.fecha_desde";

if (array_key_exists('ordenP', $_GET)) {
    $filtro = " CONCAT(p2.nombre, p2.apellido) " . $_GET['ordenP'];
}
if (array_key_exists('ordenH', $_GET)) {
    $filtro = " t.fecha_desde " . $_GET['ordenH'];
}
if (array_key_exists('ordenO', $_GET)) {
    $filtro = " os.nombre " . $_GET['ordenO'];
}
if (array_key_exists('ordenM', $_GET)) {
    $filtro = " CONCAT(p1.nombre, p1.apellido) " . $_GET['ordenM'];
}


//$buscador = "DAY(t.fecha_desde) => DAY(CURRENT_DATE())";
//$linkBuscador = "";
//
//if (array_key_exists('fechaDesde', $_GET)) {
//    if ($_GET['fechaDesde'] != "") {
//        
//        $fechaD = new \DateTime($_GET["fechaDesde"]);
//        
//        $buscador ="t.fecha_desde >= '" . $fechaD->format("Y-m-d") . "' ";
//        $linkBuscador = $linkBuscador . "&fechaDesde=" . $_GET['fechaDesde'];
//    }
//}

//if (array_key_exists('fechaHasta', $_GET)) {
//    if ($_GET['fechaHasta'] != "") {
//        $fechaH = new \DateTime($_GET["fechaHasta"]);
//        $buscador = $buscador . " and t.fecha_hasta <= '" . $fechaH->format("Y-m-d") . "' ";
//        $linkBuscador = $linkBuscador . "&fechaHasta=" . $_GET['fechaHasta'];
//    }
//}

if (array_key_exists('paciente', $_GET)) {
    if ($_GET['paciente'] != "") {
        $buscador = $buscador . " and CONCAT(p2.nombre, p2.apellido) like '%" . $_GET['paciente'] . "%'";
        $linkBuscador = $linkBuscador . "&paciente=" . $_GET['paciente'];
    }
}


if (array_key_exists('medico', $_GET)) {
    if ($_GET['medico'] != "") {
        $buscador = $buscador . " and CONCAT(p1.nombre, p1.apellido) like '%" . $_GET['medico'] . "%'";
        $linkBuscador = $linkBuscador . "&medico=" . $_GET['medico'];
    }
}

if (array_key_exists('obrasocial', $_GET)) {
    if ($_GET['obrasocial'] != "") {
        $buscador = $buscador . " and os.id =" . $_GET["obrasocial"] . " ";
        $linkBuscador = $linkBuscador . "&obrasocial=" . $_GET['obrasocial'];
    }
}
?>
