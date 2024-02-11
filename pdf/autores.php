<?php
ob_start();
require('./fpdf.php');
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage("portrait", "letter");
$pdf->Image('img/logo.jpg', 10, 20, 60, 20, 'JPG');
$peticionAjax = true;
require_once "../config/APP.php";

$autor = (isset($_GET['autor'])) ? $_GET['autor'] : "";
$to = (isset($_GET['to'])) ? $_GET['to'] : 0;
$from = (isset($_GET['from'])) ? $_GET['from'] :  0;
$tipo = $_GET['tipo'];


require_once "../controladores/publicacionControlador.php";
$ins_controlador = new publicacionControlador();

$datos = [
    "autor" => $autor,
    "to" => $to,
    "from" => $from,
    "tipo" => $tipo

];

$result = $ins_controlador->datos_publicacion_pdf_controlador($datos);



$pdf->SetFont("Arial", "B", "14");
$pdf->SetY(40);
$pdf->Cell(0, 10, "Listado de publicaciones", 5, 5, "C");
$pdf->SetFont("Arial", "", "12");
// tabla
$anchoColumna1 = 50;
$anchoColumna2 = 100;
$anchoColumna3 = 35;
$altoFila = 10;
$borde = 1;

$pdf->Cell($anchoColumna1, $altoFila, "Autor", $borde, 0, "C");
$pdf->Cell($anchoColumna2, $altoFila, mb_convert_encoding('Título', 'ISO-8859-1', 'UTF-8'), $borde, 0, "C");
$pdf->Cell($anchoColumna3, $altoFila, "Fecha publicada", $borde, 0, "C");
$pdf->Ln();

foreach ($result as $fila) {
    $pdf->Cell($anchoColumna1, $altoFila, mb_convert_encoding($fila['autor'], 'ISO-8859-1', 'UTF-8'), $borde, 0, "C");
    $pdf->Cell($anchoColumna2, $altoFila, mb_convert_encoding($fila['titulo'], 'ISO-8859-1', 'UTF-8'), $borde, 0, "C");
    $pdf->Cell($anchoColumna3, $altoFila, $fila['fecha_publicacion'], $borde, 0, "C");
    $pdf->Ln(); // Salto de línea
}

$pdf->Output();
ob_end_flush();
