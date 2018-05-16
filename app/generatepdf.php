<?php

require_once "app/vendor/autoload.php";

//Referenciando o namespace do DOMPDF
use Dompdf\Dompdf;

if(isset($_POST["relatorio"])){
    session_start();
    $report = $_POST["relatorio"];
    $reportTitle = strtoupper($report{0}) . substr($report, 1);
    $reportFileName = $reportTitle . ".pdf";

    //Lendo arquivo html correspondente
    ob_start();
    require_once("app/pdf.php");
    $html = ob_get_clean();

    //Instanciando Dompdf
    $dompdf = new Dompdf();

    //Inserindo o html que deseja-se converter
    $dompdf->load_html($html); // Mesma coisa que loadHtml()

    //Definindo papel e orientação
    $dompdf->setPaper("A4", "portrait");

    //Renderizando o html para pdf
    $dompdf->render();

    //Enviando o pdf para o browser
    $dompdf->stream($reportFileName);
}

?>