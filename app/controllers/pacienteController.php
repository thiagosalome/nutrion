<?php
require "app/models/paciente/pacienteDAO.php";
require "app/models/paciente/pacienteVo.php";
require "app/models/paciente/pacienteModel.php";
require "app/class/json.php";
require "app/class/cpf.php";

class pacienteController{ 

    /*
    public function search(){
        $query = $_POST[""];
        $pacienteModel = new pacienteModel();
        $search = $pacienteModel->search($query);
    }*/

    /*public function consultar(){
        include "app/views/paciente/consultarPaciente.php";
    }
    
    public function adicionar(){
        include "app/views/paciente/adicionarPaciente.php";
    }  
    
    public function interna(){
        include "app/views/paciente/internaPaciente.php";
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
            $pacienteVo->setId($_PUT["id_paciente"]);             
            $pacienteVo->setCPF($_PUT["cpf"]);             
            $pacienteVo->setNome($_PUT["nome"]);
            $pacienteVo->setSexo($_PUT["sexo"]);
            $pacienteVo->setTelefone($_PUT["telefone"]);
            $pacienteVo->setEmail($_PUT["email"]);       
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
            $pacienteVo->setId($_DELETE["id_paciente"]);  
    
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
            else if(isset($params["id_nutricionista"])){
                $pacientes = $pacienteModel->getAll($params["id_nutricionista"]);
                echo $pacientes;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id do paciente para receber um paciente específico ou id_nutricionista para receber todos os pacientes referentes a ele", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}    
?>