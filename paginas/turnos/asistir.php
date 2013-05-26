<?php
    include "../conectar.php";
    $idTurno = $_GET["id"];
    $consulta = "UPDATE `turno` SET `asistencia`='1' WHERE id = $idTurno";
    mysql_query($consulta);
    header('location: listarTurnosSecretaria.php'); 
?>
