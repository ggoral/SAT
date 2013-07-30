<?php
include "../conectar.php";
$dni = $_POST["dni"];
if ($dni === ""){ $dni = 0;} // ESTO LO PONGO PROVISORIO PARA QUE SI VIENE VACIO PONGA UN 0
$query = "select * from persona 
        where dni = $dni
            ";
$result=  mysql_query($query);
if(mysql_num_rows($result) != 0){
?>
<p><span class="label label-important"> El DNI ingresado ya existe! <i class=" icon-warning-sign icon-white"></i></span></p>
<?php
}
?>