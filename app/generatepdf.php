<?php
require_once "app/vendor/autoload.php";

//Referenciando o namespace do DOMPDF
use Dompdf\Dompdf;

//Lendo arquivo html correspondente
$html = file_get_contents("app/pdf.php");

//Instanciando Dompdf
$dompdf = new Dompdf();

//Inserindo o html que deseja-se converter
$dompdf->loadHtml($html);

//Definindo papel e orientação
$dompdf->setPaper("A4", "portrait");

//Renderizando o html para pdf
$dompdf->render();

//Enviando o pdf para o browser
$dompdf->stream();
?>