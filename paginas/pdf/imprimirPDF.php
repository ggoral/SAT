<?php
require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
//    $this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Turno Num: '.$_GET['id'],0,0,'C');
    // Salto de línea
    $this->Ln(20);
}
// Pie de página
function Footer()
{
    $cadena = htmlentities("CLINICA LA PLATA");
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,$cadena);
}
}
$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','I',16);
$pdf->Cell(40,10,'Doctor: '.$_GET['doctor']);
$pdf->Ln();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'----------------------------------------------');
$pdf->Ln();
$pdf->Cell(40,10,'Paciente: '.$_GET['paciente']);
$pdf->Ln();
$pdf->Cell(40,10,'Obra Social: '.$_GET['obrasocial']);
$pdf->Ln();
$pdf->Cell(40,10,'Horario: '.$_GET['horaDia']);
$pdf->Ln();
$pdf->Cell(40,10,'----------------------------------------------');
$pdf->Output();
?>
