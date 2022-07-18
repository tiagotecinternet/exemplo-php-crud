<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(); // objeto

$conteudoHtml = "<h2 style='text-align:center'>PHP para PDF</h2>
                <p style='color:red;text-shadow:black 2px 2px 5px'>Testando lib domPDF</p>";

// $dompdf->loadHtml('hello world'); // método
$dompdf->loadHtml($conteudoHtml);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape'); // ou portrait

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();