<?php

include '../conectar.php';
$idMedico = $_GET["id"];
$dia = $_GET["dia"];
$horaDesde = $_GET["horaDesde"];
$horaHasta = $_GET["horaHasta"];
$sqlExiste = "Select * from diasatencion where medico_id='$idMedico' and dia ='$dia'";
$resultadoExiste = mysql_query($sqlExiste);
$diaRepetido = mysql_fetch_array($resultadoExiste);


if($diaRepetido){
   
    header('location: altaDia.php?errordia='.$dia.'&id='.$idMedico);
   exit;
}
//Inserto una nueva persona
$insertarDia = "INSERT INTO diasatencion (medico_id, dia, horaDesde, horaHasta)
              VALUES ($idMedico, '$dia', '$horaDesde', '$horaHasta')";
mysql_query($insertarDia);



header("location: diasAtencion.php?id=$idMedico");
    
?>
