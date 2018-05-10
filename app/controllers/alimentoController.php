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
    /*  PRECISA TESTAR  
        $alimentoVo = new alimentoVo();
        $alimentoVo->setId($_POST["id"]);  
        $alimentoVo->setNome($_POST["nome"]);
        $alimentoVo->setProteina($_POST["proteina"]);
        $alimentoVo->setCarboidrato($_POST["carboidrato"]);
        $alimentoVo->setCaloria($_POST["caloria"]);
        $alimentoVo->setGordura($_POST["gordura"]);

        $alimentoModel = new alimentoModel();
        $update = $alimentoModel->update($alimentoVo);

        echo $update;
    */
    }

    public function delete(){
    /*  PRECISA TESTAR    
        $alimentoVo = new alimentoVO();
        $alimentoVo->setId($_POST["id"]);  

        $alimentoModel = new alimentoModel();     
        $delete = $alimentoModel->delete($alimentoVo);

        echo $delete;
    */
    }
}