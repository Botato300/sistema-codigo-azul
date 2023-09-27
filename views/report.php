<?php
require('../libs/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,10,'2023-09-26,08:00 AM,10:30 AM ,Maria Gonzalez, 45, Apendice laparoscopica, Dr. Juan Perez, Ninguna');
$pdf->Cell(40,20,'2023-09-26,11:15 AM,12:45 PM, Carlos Rodriguez, 60 , Cirugia cardiaca, Dr. Ana Garcia ,Infeccion postoperatoria');
$pdf->Output();
?>