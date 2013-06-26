<?php
include "../conectar.php";
$provincia = $_POST['provincia'];
$query = "SELECT l.nombre, l.id
FROM  `localidad` AS l
INNER JOIN provincia AS p ON ( p.id = l.provincia_id ) 
WHERE p.nombre =  '$provincia'";
$result = mysql_query($query);
?>
<option value="">Seleccione Localidad</option>
<?php
while ($row = mysql_fetch_array($result)){
?>
<option value='<?php echo $row['id']?>'><?php echo $row['nombre']?></option>
<?php
}
?>