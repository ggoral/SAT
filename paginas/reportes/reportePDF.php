<?php

require('../pdf/fpdf.php');

class reportePendientePDF extends FPDF {

// Cabecera de página
    function Header() {
        // Logo
//    $this->Image('logo_pb.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Reporte de turnos pendientes', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

// Pie de página
    function Footer() {
        $cadena = htmlentities("CLINICA LA PLATA");
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, $cadena);
    }

    function ImprovedTable($header, $data) {
        // Anchuras de las columnas
        $w = array(25, 25, 25, 25, 25, 28, 20);
        // Cabeceras
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Datos



        while ($fila = mysql_fetch_array($data)) {
            
            $fechaD = new \DateTime($fila['fecha_desde']);


            $this->Cell($w[0], 6, $fila['nombrePaciente'], 'LR');
            $this->Cell($w[1], 6, $fila['apellidoPaciente'], 'LR');
            $this->Cell($w[2], 6, $fila['nombreMedico'], 'LR');
            $this->Cell($w[3], 6, $fila['apellidoMedico'], 'LR');
            $this->Cell($w[3], 6, $fila['matricula'], 'LR');
            $this->Cell($w[5], 6, $fila['nombreOS'], 'LR');
            $this->Cell($w[6], 6, $fechaD->format('d-m-Y'), 'LR');
//            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
//            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R');
            $this->Ln();
        }

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
class reporteCanceladoPDF extends FPDF {

// Cabecera de página
    function Header() {
        // Logo
//    $this->Image('logo_pb.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Reporte de turnos cancelados', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

// Pie de página
    function Footer() {
        $cadena = htmlentities("CLINICA LA PLATA");
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, $cadena);
    }

    function ImprovedTable($header, $data) {
        // Anchuras de las columnas
        $w = array(25, 25, 25, 25, 25, 28, 20);
        // Cabeceras
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Datos



        while ($fila = mysql_fetch_array($data)) {

            $fechaD = new \DateTime($fila['fecha_desde']);


            $this->Cell($w[0], 6, $fila['nombrePaciente'], 'LR');
            $this->Cell($w[1], 6, $fila['apellidoPaciente'], 'LR');
            $this->Cell($w[2], 6, $fila['nombreMedico'], 'LR');
            $this->Cell($w[3], 6, $fila['apellidoMedico'], 'LR');
            $this->Cell($w[3], 6, $fila['matricula'], 'LR');
            $this->Cell($w[5], 6, $fila['nombreOS'], 'LR');
            $this->Cell($w[6], 6, $fechaD->format('d-m-Y'), 'LR');
//            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R');
//            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R');
            $this->Ln();
        }

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }

}
?>
