<?php
require "app/models/itemRefeicao/itemRefeicaoDAO.php";
require "app/models/itemRefeicao/itemRefeicaoVo.php";
require "app/models/itemRefeicao/itemRefeicaoModel.php";
class itemRefeicao{
    public function create(){
        $itemRefeicaoModel = new itemRefeicaoModel;
        $itemRefeicaoVo = new itemRefeicaoVo;

        $itemRefeicaoVo->setAlimento($_POST["alimento"]);
        $itemRefeicaoVo->setQuantidade($_POST["quantidade"]);

        $create = $itemRefeicaoModel->create($itemRefeicaoVo);        
        echo $create;
    }
    public function update(){
        $itemRefeicaoModel = new itemRefeicaoModel;
        $itemRefeicaoVo = new itemRefeicaoVo;

        $itemRefeicaoVo->setId($_POST["id"]);
        $itemRefeicaoVo->setAlimento($_POST["alimento"]);
        $itemRefeicaoVo->setQuantidade($_POST["quantidade"]);

        $update = $itemRefeicaoModel->create($itemRefeicaoVo);        
        echo $update;
    }
    public function delete(){
        $itemRefeicaoModel = new itemRefeicaoModel;
        $itemRefeicaoVo = new itemRefeicaoVo;
        
        $itemRefeicaoVo->getId($_POST["id"]);
        $delete = $itemRefeicaoModel->delete($itemRefeicaoVo);

        echo $delete;
    }
    public function get(){

    }
}
?>