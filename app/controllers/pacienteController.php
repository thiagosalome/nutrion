<?php
require "app/models/paciente/pacienteDAO.php";
require "app/models/paciente/pacienteVo.php";
require "app/models/paciente/pacienteModel.php";

class pacienteController{ 

    /*
    public function search(){
        $query = $_POST[""];
        $pacienteModel = new pacienteModel();
        $search = $pacienteModel->search($query);
    }*/

    public function consultar(){
        include "app/views/paciente/consultarPaciente.php";
    }
    
    public function adicionar(){
        include "app/views/paciente/adicionarPaciente.php";
    }  
    
    public function interna(){
        include "app/views/paciente/internaPaciente.php";
    }

    public function create(){        
        $pacienteVo = new pacienteVO();     
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

    public function update(){       
        $pacienteVo = new pacienteVO();        
        $pacienteVo->setId($_POST["id_paciente"]);             
        $pacienteVo->setCPF($_POST["cpf"]);             
        $pacienteVo->setNome($_POST["nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["telefone"]);
        $pacienteVo->setEmail($_POST["email"]);       
        $pacienteVo->setDataNasc($_POST["nascimento"]);
        
        $pacienteModel = new pacienteModel();
        $update = $pacienteModel->update($pacienteVo);

        echo $update;    
    }

    public function delete(){
        $pacienteVo = new pacienteVO();
        $pacienteVo->setId($_POST["id_paciente"]);  

        $pacienteModel = new pacienteModel();     
        $delete = $pacienteModel->delete($pacienteVo);

        echo $delete;
    }

    public function getAllPatients($idNutricionista){
        $pacienteModel = new pacienteModel();
        $pacientes = $pacienteModel->getAllPatients($idNutricionista);
        return $pacientes;
    }

    public function getPatientById($idPaciente){
        $pacienteModel = new pacienteModel();
        $paciente = $pacienteModel->getPatientById($idPaciente);
        return $paciente;
    }
}    
?>