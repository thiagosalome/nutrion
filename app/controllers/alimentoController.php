<?php
require "app/models/alimento/alimentoDAO.php";
require "app/models/alimento/alimentoVo.php";
require "app/models/alimento/alimentoModel.php";

class alimentoController{

    public function consultar(){
        include "app/views/alimentos/consultarAlimento.php";
    }

    public function adicionar(){
        include "app/views/alimentos/adicionarAlimento.php";
    }  

    public function create(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}