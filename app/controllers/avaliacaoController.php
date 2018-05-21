<?php
require "app/models/avaliacao/avaliacaoDAO.php";
require "app/models/avaliacao/avaliacaoVo.php";
require "app/models/avaliacao/avaliacaoModel.php";

class avaliacaoController{ 

    /*public function consultar(){
        include "app/views/avaliacao/consultarAvaliacao.php";
    }
    
    public function adicionar(){
        include "app/views/nutricionista/adicionarAvaliacao.php";
    }*/

    public function create(){
        $avaliacaoModel = new avaliacaoModel();
        $avaliacaoVo = new avaliacaoVo();  
        
        $avaliacaoVo->setId($_POST["id"]);                 
        $data = explode("/",$_POST["data_avaliacao"]);        
        $avaliacaoVo->setData_nasc($data[2]."-".$data[1]."-".$data[0]);
        
        $cadastrarModel = $avaliacaoModel->create($avaliacaoVo);

        switch ($cadastrarModel) {
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: ");
                break;

            case "invalid_date":
                $_SESSION["msg"] = "Data da avaliação inválida";
                header("Location: ");
                break;   
            
            case "success":
                $_SESSION["msg"] = "Avaliação criada com sucesso";            
                header("Location: ");
                break;
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
        $avaliacaoModel = new avaliacaoModel();
        $delete = $avaliacaoModel->delete($avaliacaoVo);

        switch ($delete) {
            case "success":
                $_SESSION["msg"] = "Avaliação excluída com sucesso";            
                header("Location: ");
                echo $_SESSION["msg"];
                break;
            case "failed":
                $_SESSION["msg"] = "Erro ao excluir a avaliação";
                header("Location: ");
                echo $_SESSION["msg"];
                break; 
        }
    }
}    
?>