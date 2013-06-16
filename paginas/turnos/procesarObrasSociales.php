<?php
include '../conectar.php';
$dni = $_POST["dni"];
$query = "
    SELECT os.id, os.nombre
    FROM persona AS per
    INNER JOIN paciente AS pa ON ( pa.id = per.id ) 
    INNER JOIN pacientes_obrasociales AS po ON ( po.paciente_id = pa.id ) 
    INNER JOIN obrasocial AS os ON ( os.id = po.obrasocial_id ) 
    WHERE per.dni =$dni
    ";
$result = mysql_query($query);
?> 
<option value="0"> Ninguna </option>
<?php
while ($row = mysql_fetch_array($result) or die (mysql_error())){?>
    <option value="<?php echo $row["id"] ?>"> <?php echo $row["nombre"] ?> </option>
<?php
}
?>
