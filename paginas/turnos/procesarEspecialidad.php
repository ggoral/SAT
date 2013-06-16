<?php
include '../conectar.php';

$especialidad_id = $_POST["especialidad"];
$obraSocial = $_POST["obraSocial"];

// ESTA CONSULTA ESTA HECHA DE ESTA MANERA PARA PODER TRAER TODOS LOS MEDICOS QUE POSEEN LA MISMA OBRA SOCIAL QUE EL PACIENTE


$sql = "SELECT DISTINCT(m.id), p.nombre, p.apellido 
        FROM medico AS m
        INNER JOIN persona as p ON (p.id = m.id)
        INNER JOIN medicos_especialidades as me ON (me.medico_id = m.id)
        INNER JOIN medicos_obrasociales as mo ON (mo.medico_id = m.id)
        WHERE p.eliminado = 0 AND 
        mo.obrasocial_id = $obraSocial AND
        me.especialidad_id = $especialidad_id
";



$resultado = mysql_query($sql);
?>

<option value=""> Ninguno </option>
<?php 
while($medico = mysql_fetch_array($resultado)){
?>

<option value="<?php echo $medico['id'] ?>"> <?php echo $medico["apellido"]." ".$medico["nombre"] ?> </option>

<?php
}
?>
