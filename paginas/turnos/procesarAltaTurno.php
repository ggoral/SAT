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
<p><span class="text-success"> El DNI ingresado es correcto </span><i class="icon-ok"></i></p>
<?php
}
else{
?>
    <span class="text-error"><small>El paciente ingresado no existe!<i class="icon-chevron-right"></i></small></span>
    <!--<a class="btn btn-danger btn-small" href="#"> Agregar Paciente</a><p></p> -->
<?php
}
?>