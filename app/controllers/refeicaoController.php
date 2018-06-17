<?php
require "app/models/refeicao/refeicaoDAO.php";
require "app/models/refeicao/refeicaoVo.php";
require "app/models/refeicao/refeicaoModel.php";

class refeicaoController{
    public function create(){
        $refeicaoVo = new refeicaoVo();     
        
        try{ 
            $refeicaoVo->setHorario($_POST["horario"]);            
            $refeicaoVo->setNome($_POST["nome"]);
            $refeicaoVo->setDieta($_POST["dieta"]);
            
            $refeicaoModel = new refeicaoModel();
            $create = $refeicaoModel->create($refeicaoVo);

            echo $create;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }

    public function update($_PUT){
        $refeicaoVo = new refeicaoVo();  
        
        try{
            $refeicaoVo->setId($_GET["id"]);             
            $refeicaoVo->setNome($_PUT["nome"]);
            $refeicaoVo->setHorario($_PUT["horario"]);       
            $refeicaoVo->setDieta($_PUT["dieta"]);
            
            $refeicaoModel = new refeicaoModel();
            $update = $refeicaoModel->update($refeicaoVo);
    
            echo $update;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function delete($_DELETE){
        $refeicaoVo = new refeicaoVo();
        
        try{
            $refeicaoVo->setId($_GET["id"]);  
    
            $refeicaoModel = new refeicaoModel();     
            $delete = $refeicaoModel->delete($refeicaoVo);
    
            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function get($params){
        try{
            $refeicaoModel = new refeicaoModel();  
            
            if(isset($params["id"])){
                $refeicao = $refeicaoModel->getById($params["id"]);
                echo $paciente;
            }
            else if(isset($params["dieta"])){
                $refeicoes = $refeicaoModel->getAll($params["dieta"]);
                echo $refeicoes;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id da refeição para receber uma refeição específica ou dieta para receber todas as refeições referentes a ela", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}
?>