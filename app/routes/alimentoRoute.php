<?php
class alimentoRoute{

    public function consultar(){
        include "app/views/alimentos/consultarAlimento.php";
    }

    public function adicionar(){
        include "app/views/alimentos/adicionarAlimento.php";
    }
}