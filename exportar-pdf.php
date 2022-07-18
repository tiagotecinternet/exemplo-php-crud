<?php // exportar-pdf.php

use Dompdf\Dompdf;
use Dompdf\Options;

require_once "vendor/autoload.php";

session_start(); // inicializando a session

$paragrafo = "";
foreach($_SESSION['dados'] as $fabricante){
    // operador .= de concatenação e atribuição
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>";
}

// Conteúdo HTML para o resumo usando sintaxe heredoc PHP
$data = date("d/m/Y");
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 10px;
    width: 70%; margin:auto">
        <h2>Resumo de Fabricantes - $data</h2>
        $paragrafo
    </div>
HTML;

/* Esta sintaxe funcionou */
$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

/* Nesta sintaxe não funcionou */
// $options = $dompdf->getOptions();
// $options->setDefaultFont('Courier');
// $dompdf->setOptions($options);

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Resumo de Fabricantes - ".date("d-m-Y").".pdf");