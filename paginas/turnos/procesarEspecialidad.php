<?php
include '../conectar.php';

$especialidad_id = $_POST["especialidad"];
$paciente_dni = $_POST["dni"];

// ESTA CONSULTA ESTA HECHA DE ESTA MANERA PARA PODER TRAER TODOS LOS MEDICOS QUE POSEEN LA MISMA OBRA SOCIAL QUE EL PACIENTE


$sql = "select DISTINCT(m.id),pm.nombre,pm.apellido from medico as m
        inner join persona as pm on(pm.id = m.id)
        inner join medicos_especialidades as me on( me.medico_id = m.id)
        inner join medicos_obrasociales as mo on(mo.medico_id = m.id)
        inner join obrasocial as om on(om.id = mo.obrasocial_id)
        inner join pacientes_obrasociales as po on (po.obrasocial_id = mo.obrasocial_id)
        inner join paciente as p on(po.paciente_id = p.id)
        inner join persona as pp on(pp.id = p.id)
        where om.eliminado = false
        and pp.dni = '".$paciente_dni."'
        and me.especialidad_id =".$especialidad_id;


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
