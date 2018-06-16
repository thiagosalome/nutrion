<?php
class dietaRoute{

    public function consultar(){
        include "app/views/dieta/consultarDieta.php";
    }

    public function adicionar(){
        include "app/views/dieta/adicionarDieta.php";
    }
}