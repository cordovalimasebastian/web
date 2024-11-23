<?php
require_once('fpdf.php');

session_start();

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Título
$pdf->Cell(0, 10, 'Reporte de Compras Realizadas', 0, 1, 'C');

// Cabecera de la tabla
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'DNI', 1);
$pdf->Cell(40, 10, 'Producto', 1);
$pdf->Cell(30, 10, 'Precio Unitario', 1);
$pdf->Cell(30, 10, 'Cantidad', 1);
$pdf->Cell(40, 10, 'Precio Total', 1);
$pdf->Ln();

// Datos de las compras
$pdf->SetFont('helvetica', '', 10);
if (isset($_SESSION['compras'])) {
    foreach ($_SESSION['compras'] as $compra) {
        $pdf->Cell(40, 10, $compra['nombre'], 1);
        $pdf->Cell(40, 10, $compra['dni'], 1);
        $pdf->Cell(40, 10, $compra['producto'], 1);
        $pdf->Cell(30, 10, $compra['precio'], 1);
        $pdf->Cell(30, 10, $compra['cantidad'], 1);
        $pdf->Cell(40, 10, $compra['precioTotal'], 1);
        $pdf->Ln();
    }
}

// Salvar el archivo PDF
$pdf->Output('compras.pdf', 'I');
?>
