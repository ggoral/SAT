<?php
$filtro =" pe.apellido";
if (array_key_exists('ordenApe', $_GET)) { $filtro = " CONCAT(pe.apellido, pe.nombre) ".$_GET['ordenApe'];}

if (array_key_exists('ordenProv', $_GET)) { $filtro = " CONCAT(pro.nombre) ".$_GET['ordenProv'];}

if (array_key_exists('ordenLoc', $_GET)) { $filtro = " CONCAT(l.nombre) ".$_GET['ordenLoc'];}

if (array_key_exists('ordenEsp', $_GET)) { $filtro = " CONCAT(nombreE) ".$_GET['ordenEsp'];}

$buscador = " ";
$linkBuscador = "";
if (array_key_exists('nombyApe', $_GET)) {
    if ($_GET['nombyApe'] != "") {
        $buscador = $buscador . " and CONCAT(pe.nombre, pe.apellido) like '%" . $_GET['nombyApe'] . "%'";
        $linkBuscador = $linkBuscador . "&nombyApe=" . $_GET['nombyApe'];
    }
}

if (array_key_exists('matricula', $_GET)) {
    if ($_GET['matricula'] != "") {
        $buscador = $buscador . " and CONCAT(matricula) like '%" . $_GET['matricula'] . "%'";
        $linkBuscador = $linkBuscador . "&matricula=" . $_GET['matricula'];
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
        $buscador = $buscador . " and os.id =" . $_GET["obrasocial"] . " ";
        $linkBuscador = $linkBuscador . "&obrasocial=" . $_GET['obrasocial'];
    }
}

$traerObras="";
$campoOSid ="";
if (isset ($_GET['obrasocial'])){
    $traerObras = "INNER JOIN pacientes_obrasociales as po ON (po.paciente_id = pe.id)
    INNER JOIN obrasocial as os ON (os.id = po.obrasocial_id)";
    $campoOSid =", os.id as osID";
}
