<?php
include '../conectar.php';

$sql = "Select p.nombre,p.apellido,m.id from medico as m
        inner join persona as p on(m.id = p.id)
        inner join medicos_especialidades as me on (m.id = me.medico_id)
        inner join especialidad as e on (e.id = me.especialidad_id)
        where e.id =".$_POST["especialidad"];

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
