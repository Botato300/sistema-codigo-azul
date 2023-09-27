<?php
require('../libs/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40,10,'');
$pdf->Output();
?>