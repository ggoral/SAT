<?php

$arrayFiltro = array();
$arrayFiltroP = array();
$arrayFiltroP['ordenP'];
$arrayFiltroP['ordenH'];
$arrayFiltroP['ordenO'];
$arrayFiltroP['ordenM'];


foreach ($_GET as $key => $elemento) {


    if ('ordenP' == $key) {
        $arrayFiltroP[$key] = "CONCAT(p2.nombre, p2.apellido)";
    }
    if ('ordenH' == $key) {
        $arrayFiltroP[$key] = "t.fecha_desde";
    }
    if ('ordenO' == $key) {
        $arrayFiltroP[$key] = "os.nombre";
    }
    if ('ordenM' == $key) {
        $arrayFiltroP[$key] = "CONCAT(p1.nombre, p1.apellido)";
    }
}

foreach ($arrayFiltroP as $key => $elemento) {
    $arrayFiltro[$key] = $_GET[$key];
}


$linkFiltro = " ";
$filtro = " t.fecha_desde ASC";
echo count($arrayFiltro);

if (count($arrayFiltro) > 0) {
    $linkFiltro = "?";
    $filtro = " ";
}

$and = count($arrayFiltro) - 1;

foreach ($arrayFiltro as $key => $elemento) {
        
    $linkFiltro = $linkFiltro . $key . "=" . $elemento;
    $filtro = $filtro.$arrayFiltroP[$key] . " " . $arrayFiltro[$key];

    if ($and != 0) {
        $linkFiltro = $linkFiltro . "&";
        $filtro = $filtro.", ";
        $and--;
    }
}

?>
