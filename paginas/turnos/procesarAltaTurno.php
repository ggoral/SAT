<?php
include "../conectar.php";
$dni = $_GET["dni"];

if ($dni === ""){ $dni = 0;} // ESTO LO PONGO PROVISORIO PARA QUE SI VIENE VACIO PONGA UN 0

$query = "select * from persona 
        where dni = $dni
            ";
$result=  mysql_query($query);
if(mysql_num_rows($result) != 0){
?>
<p><span class="label label-success"> El DNI ingresado es correcto <i class="icon-ok icon-white"></i></span></p>
<?php
}
else{
?>
    <span class="label label-important">Ingrese un número de DNI valido!  <i class=" icon-warning-sign icon-white"></i></span>
    <!--<a class="btn btn-danger btn-small" href="#"> Agregar Paciente</a><p></p> -->
    <script language="Javascript">
           $("#obraSocial").attr("disabled","disabled");
       </script>
<?php
}
?>