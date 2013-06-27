<?php
$cuerpoBusqueda = $_GET['campoBusqueda'];
$criterioBusqueda = "";
switch($_GET['criterio']){
    case "porDNI":$criterioBusqueda = "AND (pe.dni = '$cuerpoBusqueda')";
        break;
    case "porApellido":$criterioBusqueda = "AND (pe.apellido = '$cuerpoBusqueda')";
        break;
}
?>
