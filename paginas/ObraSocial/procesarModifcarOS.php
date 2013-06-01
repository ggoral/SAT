<?php

include '../conectar.php';

$errornombre = $_GET["nombre"];

echo $errornombre;

$sqlExiste = "Select * from obrasocial where nombre ='".$errornombre."' and eliminado = false" ;
//
$resultadoExiste = mysql_query($sqlExiste);
$obrasocial = mysql_fetch_array($resultadoExiste);

if($obrasocial && ($obrasocial["id"] != $_GET["idOS"])){
    header('location: modificar.php?id='.$_GET["idOS"].'&errornombre='.$errornombre);
    exit;
}

$idOS = $_GET["idOS"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `obrasocial` SET `nombre`='$nombre' WHERE id = $idOS";
mysql_query($consulta);

header('location: listar.php');
?>
