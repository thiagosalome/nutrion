<?php

require_once "app/vendor/autoload.php";
// include "app/pdf.php";

//Referenciando o namespace do DOMPDF
use Dompdf\Dompdf;

//Instanciando Dompdf
$dompdf = new Dompdf();

//Lendo arquivo html correspondente
$html = file_get_contents("app/pdf.php");

//Inserindo o html que deseja-se converter
$dompdf->loadHtml($html);

//Definindo papel e orientação
$dompdf->setPaper("A4", "portrait");

//Renderizando o html para pdf
$dompdf->render();

//Enviando o pdf para o browser
$dompdf->stream();
?>