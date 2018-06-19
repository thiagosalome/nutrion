<?php
class dietaRoute{

    public function consultar(){
        include "app/views/dieta/consultarDieta.php";
    }

    public function adicionar(){
        include "app/views/dieta/adicionarDieta.php";
    }
    
    public function interna(){
        include "app/views/dieta/internaDieta.php";
    }
}