<?php

class relatorioController{
    
    public function tipo(){
        // Rota para view de login e cadastro
        include "app/views/relatorios/relatorios.php";
    }

    public function gerar(){
        include "app/generatepdf.php";
    }
}

?>