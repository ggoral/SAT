<?php
include "../conectar.php";

$medico_id = $_POST["medico"]; //ID DEL MEDICO

$mifecha = new \DateTime($_POST["fecha"]); //CREO MI FECHA QUE ME LLEGO POR POST;
$dia = $mifecha->format("D"); // ME QUEDO CON EL DIA EN INGLES


$dias = array();
$dias["Mon"] = "Lunes";
$dias["Tue"] = "Martes";
$dias["Wed"] = "Miercoles";
$dias["Thu"] = "Jueves";
$dias["Fri"] = "Viernes";
$dias["Sat"] = "Sabado";
$dias["Sun"] = "Domingo";

// CONSULTA PARA TRAERME EL HORARIO DEL MEDICO SEGUIR EL DIA SELECCIONADO;
$SQL = "select * from medico as m
inner join diasatencion as da on(da.medico_id = m.id)
where da.dia ='" . $dias[$dia] . "' and m.id =" . $medico_id;


$resultado = mysql_query($SQL);
$horario = mysql_fetch_array($resultado);

$horaInicio = $_POST["fecha"] . " " . $horario["horaDesde"]; // CREACION DEL STRING CON FECHA Y HORA
$horaFin = $_POST["fecha"] . " " . $horario["horaHasta"];

$fechaDesde = new \DateTime($horaInicio); // CREACION DEL OBJETO FECHA A PARTIR DE LA HORA CREADA 
$fechaHasta = new \DateTime($horaFin);

// ESTA CONSULTA ME DEVUELVE LOS TURNOS DEL HORARIO DEL MEDICO SELECCIONADO
$sqlTurnos = "select * from turno as t
    where t.medico_id = " . $medico_id . "
    and t.fecha_desde >= '" . $fechaDesde->format("Y-m-d H:i:s") . "' 
    and t.fecha_hasta < '" . $fechaHasta->format("Y-m-d H:i:s") . "' 
    and t.eliminado = false";
$resultadoTurnos = mysql_query($sqlTurnos);


// ACA ME QUEDO CON LOS HORARIOS DE LOS TURNOS DEL MEDICO PARA EL DIA SELECCIONADO
$turnosAsignados = array();
while ($turnoAsig = mysql_fetch_array($resultadoTurnos)) {
    $fechaTurnoAsignado = new \DateTime($turnoAsig["fecha_desde"]);
    $turnosAsignados[] = $fechaTurnoAsignado->format("H:i:s");
}


// ACA ME QUEDO CON TODOS LOS HORARIOS POSIBLES DE TURNOS
$arrayTurnos = array();
while ($fechaDesde != $fechaHasta) {
    $fechaStart = $fechaDesde->format('H:i:s');
    $fechaDesde->modify('+30 minutes');

    $arrayTurnos[] = $fechaStart;
}
// ACA A TODOS LOS HORARIOS POSIBLES LES RESTO LOS HORARIOS OCUPADOS
$arrayTurnos = array_diff($arrayTurnos, $turnosAsignados);

?>

<?php foreach ($arrayTurnos as $turno) { // ACA CREO TODOS LOS OPTIOS CORRESPONDIENTES PARA ASIGNAR UN TURNO?>
    <option value="<?php echo $turno ?>"> <?php echo $turno ?> </option>
<?php } ?>


