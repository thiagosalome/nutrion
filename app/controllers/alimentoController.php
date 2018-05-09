<?php
require "app/models/alimentos/alimentoDAO.php";
require "app/models/alimentos/alimentoVo.php";
require "app/models/alimentos/alimentoModel.php";

class alimentoController{

    public function consultar(){
        include "app/views/alimentos/consultarAlimento.php";
    }

    public function create(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}