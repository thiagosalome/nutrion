<?php
require "app/models/refeicao/refeicaoDAO.php";
require "app/models/refeicao/refeicaoVo.php";
require "app/models/refeicao/refeicaoModel.php";

class refeicaoController{
    public function create(){
        $refeicaoVo = new refeicaoVo();     
        
        try{ 
            $refeicaoVo->setNome($_POST["nome"]);
            $refeicaoVo->setHorario($_POST["horario"]);            
            $refeicaoVo->setDieta($_POST["id_dieta"]);
            $alimentos = $_POST["alimento"];
            $quantidades = $_POST["quantidade"];

            $refeicaoModel = new refeicaoModel();
            $create = json_decode($refeicaoModel->create($refeicaoVo));

            if(strpos($create->message, "sucesso") !== false){
                require "app/controllers/itemRefeicaoController.php";
                $itemRefeicaoController = new itemRefeicaoController();

                for ($i = 0; $i < count($alimentos); $i++) { 
                    $params = array(
                        "refeicao" => $create->result->id,
                        "alimento" => $alimentos[$i],
                        "quantidade" => $quantidades[$i],
                    );

                    $itemRefeicaoController->create($params); 
                }
            }

            echo json_encode($create);
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }

    public function update($_PUT){
        $refeicaoVo = new refeicaoVo();  
        
        try{
            $refeicaoVo->setId($_PUT["id"]);             
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
                echo $refeicao;
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