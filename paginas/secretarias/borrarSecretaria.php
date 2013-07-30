<?php
include "../conectar.php";
$id = $_GET['id'];
$query = "UPDATE persona SET eliminado = 1 WHERE id = $id";
mysql_query($query);
header("location:listar.php");
?>