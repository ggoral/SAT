<?php
include "procesarSeguridad.php";
?>

<?php
include '../conectar.php';

$id = $_GET["id"];
$nombre = $_GET["nombre"];
$consulta = "UPDATE `especialidad` SET `eliminado` = true WHERE id = $id";
mysql_query($consulta);
header('location: listar.php');

?>
