<?php

include '../conectar.php';
$idMedico = $_GET["id"];
$dia = $_GET["dia"];
$horaDesde = $_GET["horaDesde"];
$horaHasta = $_GET["horaHasta"];
$diaAnt = $_GET["diaAnt"];



//Inserto una nueva persona
$modificarDia = "UPDATE diasatencion SET dia='$dia', horaDesde='$horaDesde', horaHasta='$horaHasta' 
                WHERE dia='$diaAnt'";

mysql_query($modificarDia);


header('location: listar.php');
    
?>
