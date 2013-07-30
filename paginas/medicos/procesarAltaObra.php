<?php

include '../conectar.php';
$idMedico = $_GET["id"];
$obra = $_GET["obra"];
$sqlExiste = "SELECT * from medicos_obrasociales
                        INNER JOIN obrasocial on (medicos_obrasociales.obrasocial_id = obrasocial.id)
                        WHERE medico_id=$idMedico and obrasocial_id=$obra";
$resultadoExiste = mysql_query($sqlExiste);
$obraRepetida = mysql_fetch_array($resultadoExiste);


if($obraRepetida){
   
    header('location: altaObra.php?errorObra='.$obra.'&id='.$idMedico);
   exit;
}
//Inserto una nueva oba
$insertarObra = "INSERT INTO medicos_obrasociales (medico_id, obrasocial_id)
              VALUES ($idMedico, $obra)";
mysql_query($insertarObra);



header("location: obrasSociales.php?id=$idMedico");
    
?>
