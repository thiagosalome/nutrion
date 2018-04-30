<?php
require "app/models/alimentos/alimentosDAO.php";
require "app/models/alimentos/alimentosVo.php";
require "app/models/alimentos/alimentosModel.php";

class alimentosController{

    public function consultar(){
        include "app/views/alimentos/consultarAlimento.php";
    }
}