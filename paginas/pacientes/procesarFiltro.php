<?php
$filtro =" pe.apellido";
if (array_key_exists('ordenApe', $_GET)) { $filtro = " CONCAT(pe.apellido, pe.nombre) ".$_GET['ordenApe'];}

if (array_key_exists('ordenProv', $_GET)) { $filtro = " CONCAT(pro.nombre) ".$_GET['ordenProv'];}

if (array_key_exists('ordenLoc', $_GET)) { $filtro = " CONCAT(l.nombre) ".$_GET['ordenLoc'];}

$buscador = " ";
$linkBuscador = "";
if (array_key_exists('nombyApe', $_GET)) {
    if ($_GET['nombyApe'] != "") {
        $buscador = $buscador . " and CONCAT(pe.nombre, pe.apellido) like '%" . $_GET['nombyApe'] . "%'";
        $linkBuscador = $linkBuscador . "&nombyApe=" . $_GET['nombyApe'];
    }
}

if (array_key_exists('dni', $_GET)) {
    if ($_GET['dni'] != "") {
        $buscador = $buscador . " and CONCAT(pe.dni) like '%" . $_GET['dni'] . "%'";
        $linkBuscador = $linkBuscador . "&dni=" . $_GET['dni'];
    }
}

if (array_key_exists('provincia', $_GET)) {
    if ($_GET['provincia'] != "") {
        $buscador = $buscador . " and CONCAT(pro.nombre) like '%" . $_GET['provincia'] . "%'";
        $linkBuscador = $linkBuscador . "&provincia=" . $_GET['provincia'];
    }
}

if (array_key_exists('localidad', $_GET)) {
    if ($_GET['localidad'] != "") {
        $buscador = $buscador . " and CONCAT(l.nombre) like '%" . $_GET['localidad'] . "%'";
        $linkBuscador = $linkBuscador . "&localidad=" . $_GET['localidad'];
    }
}

if (array_key_exists('obrasocial', $_GET)) {
    if ($_GET['obrasocial'] != "") {
        $buscador = $buscador . " and CONCAT() like '%" . $_GET['obrasocial'] . "%'";
        $linkBuscador = $linkBuscador . "&obrasocial=" . $_GET['obrasocial'];
    }
}
?>
