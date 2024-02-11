<?php
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

// var_dump($result);
if ($result) {
    require "fpdf.php";
    $fpdf = new FPDF('P', 'mm', 'Letter');


    $fpdf->SetMargins(17, 17, 17);
    $fpdf->AddPage("PORTRAIT", "letter");
    $fpdf->SetFont("Arial", "", "12");

    class pdf extends FPDF
    {

        public function header()
        {

            $this->SetFont("Arial", "", "12");
            $this->Image("img/logo.jpg", 10, 20, 60, 20, "jpg");
        }

        public function footer()
        {
        }
    }

    $fpdf = new pdf();
    $fpdf->AddPage("portrait", "letter");
    $fpdf->SetFont("Arial", "B", "12");
    $fpdf->SetY(40);
    $fpdf->Cell(0, 10, "Listado de publicaciones", 5, 5, "C");

    // tabla
    $anchoColumna1 = 50;
    $anchoColumna2 = 100;
    $anchoColumna3 = 50;
    $altoFila = 10;
    $borde = 1;

    $fpdf->Cell($anchoColumna1, $altoFila, "Autor", $borde, 0, "C");
    $fpdf->Cell($anchoColumna2, $altoFila, mb_convert_encoding('Título', 'ISO-8859-1', 'UTF-8'), $borde, 0, "C");
    $fpdf->Cell($anchoColumna3, $altoFila, "Fecha publicada", $borde, 0, "C");
    $fpdf->Ln();

    foreach ($result as $fila) {
        $fpdf->Cell($anchoColumna1, $altoFila, $fila['autor'], $borde, 0, "C");
        $fpdf->Cell($anchoColumna2, $altoFila, $fila['titulo'], $borde, 0, "C");
        $fpdf->Cell($anchoColumna3, $altoFila, $fila['fecha_publicacion'], $borde, 0, "C");
        $fpdf->Ln(); // Salto de línea
    }




    $fpdf->Output();
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= COMPANY; ?></title>
        <?php include "../vistas/template/links.php"; ?>
    </head>

    <body>
        <main class="mt-5">
            <div class="container py-4">3
                <img src="<?= SERVERURL ?>vistas/assets/img/user-404.png" alt="">
                <h2>Lo sentimos...</h2>
                <p>Parece que estamos teniendo problemas para ubicar la pagina de lo que estas buscando en este momento</p>
                <a href="<?= SERVERURL ?>/publicaciones" class="btn btn-primary">Volver a las publicaciones</a>
                <a class="btn btn-primary">Reportar este problema a soporte</a>
            </div>
        </main>

        <?php include "../vistas/template/scripts.php" ?>
    </body>

    </html>
<?php
}
