<?php
require "app/models/avaliacao/avaliacaoVo.php";
require "app/models/avaliacao/avaliacaoModel.php";
require "app/models/avaliacao/avaliacaoDAO.php";

class avaliacaoController{ 

    /*public function consultar(){
        include "app/views/avaliacao/consultarAvaliacao.php";
    }
    
    public function adicionar(){
        include "app/views/nutricionista/adicionarAvaliacao.php";
    }*/

    public function create($params){
        $avaliacaoVo = new avaliacaoVo(); 

        try{
            $avaliacaoVo->setInfoFisicas($params["infoFisica"]);                 
            $avaliacaoVo->setDataAval($params["data"]);
            
            $avaliacaoModel = new avaliacaoModel();
            $create = $avaliacaoModel->create($avaliacaoVo);

            echo $create;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }      
    }

    public function update(){       
        $avaliacaoModel = new avaliacaoModel();
        $avaliacaoVo = new avaliacaoVo();  
        
        $avaliacaoVo->setId($_POST["id"]);                 
        $data = explode("/",$_POST["data_avaliacao"]);        
        $avaliacaoVo->setData_nasc($data[2]."-".$data[1]."-".$data[0]);
        
        $update = $avaliacaoModel->update($avaliacaoVo);

        switch ($update) {
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: ");
                break;

            
            case "invalid_date":
                $_SESSION["msg"] = "Data de avaliação inválida";
                header("Location: ");
                break;   
            
            case "success":
                $_SESSION["msg"] = "Avaliação criada com sucesso";            
                header("Location: ");
                break;
        }        
    }

    public function delete(){
        try{
            $avaliacaoModel = new avaliacaoModel();
            $delete = $avaliacaoModel->delete($avaliacaoVo);
            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}    
?>