<?php

include '../conectar.php';
include 'reportePDF.php';

//exit;

$fd = new \DateTime($_POST['fechaDesde']);
$fh = new \DateTime($_POST['fechaHasta']);

$strfechaDesde = $fd->format("Y-m-d") . " 00:00:00";
$strfechaHasta = $fh->format("Y-m-d") . " 23:59:00";

$query = "SELECT ppac.nombre as nombrePaciente, ppac.apellido as apellidoPaciente,pmed.nombre as nombreMedico, 
            pmed.apellido as apellidoMedico, m.matricula,t.fecha_desde,t.fecha_hasta, os.nombre as nombreOS FROM `turno` as t
inner join medico as m on (m.id = t.medico_id)
inner join persona as pmed on (pmed.id = m.id)
inner join paciente as pac on (pac.id = t.paciente_id)
inner join persona as ppac on (ppac.id = pac.id)
inner join obrasocial as os on (os.id = t.obrasocial_id) 
where t.fecha_desde >= '$strfechaDesde' and t.fecha_hasta <= '$strfechaHasta'";

if ($_POST['estado'] == 'Cancelados') {
    
    
    $query = $query . " 
and t.eliminado = true
order by t.fecha_desde";

    $pdf = new reporteCanceladoPDF('P', 'mm', 'A4');
}
if ($_POST['estado'] == 'Pendientes') {

    $query = $query ." and t.asistencia = false 
and t.eliminado = false
order by t.fecha_desde";

    $pdf = new reportePendientePDF('P', 'mm', 'A4');
}

$resultado = mysql_query($query);


//$pdf = new reportePendientePDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->SetFontSize(8);




$header = array();
$header[] = "Nombre paciente";
$header[] = "Apellido Paciente";
$header[] = "Nombre medico";
$header[] = "Apellido medico";
$header[] = "Matricula";
$header[] = "Obra social";
$header[] = "Fecha desde";


$pdf->ImprovedTable($header, $resultado);
//
//while ($fila = mysql_fetch_array($resultado)) {
////    echo $fila['id'];
//    $pdf->Cell(40, 10, 'ID: ' . $fila['id']);
//    $pdf->Ln();
//}

$pdf->Output();
?>
