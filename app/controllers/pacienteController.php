<?php
require "app/models/paciente/pacienteDAO.php";
require "app/models/paciente/pacienteVo.php";
require "app/models/paciente/pacienteModel.php";
require "app/class/cpf.php";

class pacienteController{ 

    /*
    public function search(){
        $query = $_POST[""];
        $pacienteModel = new pacienteModel();
        $search = $pacienteModel->search($query);
    }*/

    public function create(){        
        $pacienteVo = new pacienteVO();     
        
        try{
            $pacienteVo->setIdNutricionista($_POST["id_nutricionista"]);   
            $pacienteVo->setCPF($_POST["cpf"]);//remover os pontos              
            $pacienteVo->setNome($_POST["nome"]);
            $pacienteVo->setSexo($_POST["sexo"]);
            $pacienteVo->setTelefone($_POST["telefone"]);//formato:(21) 98765-4321
            $pacienteVo->setEmail($_POST["email"]);       
            $pacienteVo->setDataNasc($_POST["nascimento"]);
            
            $pacienteModel = new pacienteModel();
            $cadastrar = $pacienteModel->create($pacienteVo);

            echo $cadastrar;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }

    public function update($_PUT){       
        $pacienteVo = new pacienteVO(); 
        
        try{
            $pacienteVo->setId($_GET["id"]);             
            $pacienteVo->setNome($_PUT["nome"]);
            $pacienteVo->setEmail($_PUT["email"]);       
            $pacienteVo->setTelefone($_PUT["telefone"]);
            $pacienteVo->setCPF($_PUT["cpf"]);             
            $pacienteVo->setSexo($_PUT["sexo"]);
            $pacienteVo->setDataNasc($_PUT["nascimento"]);
            
            $pacienteModel = new pacienteModel();
            $update = $pacienteModel->update($pacienteVo);
    
            echo $update;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function delete($_DELETE){
        $pacienteVo = new pacienteVO();
        
        try{
            $pacienteVo->setId($_GET["id"]);  
    
            $pacienteModel = new pacienteModel();     
            $delete = $pacienteModel->delete($pacienteVo);
    
            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function get($params){
        try{
            $pacienteModel = new pacienteModel();
            
            if(isset($params["id"])){
                $paciente = $pacienteModel->getById($params["id"]);
                echo $paciente;
            }
            else if(isset($params["nutricionista"])){
                $pacientes = $pacienteModel->getAll($params["nutricionista"]);
                echo $pacientes;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id do paciente para receber um paciente específico ou id do nutricionista para receber todos os pacientes referentes a ele", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}    
?>