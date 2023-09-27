<?php
require('../libs/fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Informe Medico', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
setlocale(LC_TIME, 'es_ES.UTF-8');
$fecha_actual = strftime('%A, %d de %B de %Y');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Informacion del Paciente:', 0, 1);
$pdf->Cell(0, 10, 'Nombre: Juan Perez', 0, 1);
$pdf->Cell(0, 10, 'Edad: 40', 0, 1);
$pdf->Cell(0, 10, 'Hora de entrada: 23:34pm', 0, 1);
$pdf->Cell(0, 10, 'Hora de salida: 19:43pm', 0, 1);
$pdf->Cell(0, 10, 'Fecha de entrada:', 0, 1);
$pdf->Cell(0, 10, 'Fecha de salida:', 0, 1);
$pdf->Cell(0, 10, $fecha_actual, 0, 1);


$pdf->Ln(10);

$pdf->Cell(0, 10, 'Resumen del Tratamiento:', 0, 1);
$pdf->MultiCell(0, 10, 'El paciente, Juan Perez, ha sido diagnosticado con hipertension. Se le ha recetado medicacion para controlar su presion arterial y se le ha aconsejado realizar cambios en su estilo de vida, incluyendo una dieta baja en sodio y ejercicio regular.', 0);

$pdf->Output();
?>