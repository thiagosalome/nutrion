<?php
require "app/models/itemRefeicao/itemRefeicaoDAO.php";
require "app/models/itemRefeicao/itemRefeicaoVo.php";
require "app/models/itemRefeicao/itemRefeicaoModel.php";

class itemRefeicaoController{
    public function create($params){
        $itemRefeicaoVo = new itemRefeicaoVo;

        try{
            $itemRefeicaoVo->setRefeicao($params["refeicao"]);
            $itemRefeicaoVo->setAlimento($params["alimento"]);
            $itemRefeicaoVo->setQuantidade($params["quantidade"]);
            
            $itemRefeicaoModel = new itemRefeicaoModel;
            $create = $itemRefeicaoModel->create($itemRefeicaoVo);        
            // echo $create;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }
    public function update($_PUT){        
        $itemRefeicaoVo = new itemRefeicaoVo;

        try{
            $itemRefeicaoVo->setId($_POST["id"]);
            $itemRefeicaoVo->setAlimento($_POST["alimento"]);
            $itemRefeicaoVo->setQuantidade($_POST["quantidade"]);

            $itemRefeicaoModel = new itemRefeicaoModel;
            $update = $itemRefeicaoModel->create($itemRefeicaoVo);        
            echo $update;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }
    public function delete($_DELETE){        
        $itemRefeicaoVo = new itemRefeicaoVo;
        try{
        
            $itemRefeicaoVo->getId($_POST["id"]);

            $itemRefeicaoModel = new itemRefeicaoModel;
            $delete = $itemRefeicaoModel->delete($itemRefeicaoVo);

            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }
    public function get($params){
        try{
            $itemRefeicaoModel = new itemRefeicaoModel();
            
            if(isset($params["id"])){
                $itemRefeicao = $itemRefeicaoModel->getById($params["id"]);
                echo $itemRefeicao;
            }            
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id do itemRefeicao para receber um itemRefeicao específico", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}
?>