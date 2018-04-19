<?php
require "app/models/paciente/pacienteDAO.php";
require "app/models/paciente/pacienteVo.php";
require "app/models/paciente/pacienteModel.php";

class pacienteController{ 

    public function consultar(){
        include "app/views/nutricionista/consultarPaciente.php";
    }
    
    public function adicionar(){
        include "app/views/nutricionista/adicionarPaciente.php";
    }

    public function search(){
        $query = $_POST[""];
        $pacienteModel = new pacienteModel();
        $search = $pacienteModel->search($query);
    }

    public function create(){
        $pacienteModel = new pacienteModel();
        $pacienteVo = new pacienteVO();  
        
        $pacienteVo->setCPF($_POST["cpf"]);//remover os pontos              
        $pacienteVo->setNome($_POST["Nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["Telefone"]);//formato:(21) 98765-4321
        $pacienteVo->setEmail($_POST["email"]);       
        $data = explode("/",$_POST["nascimento"]);        
        $pacienteVo->setDataNasc($data[2]."-".$data[1]."-".$data[0]);
        
        $cadastrarModel = $pacienteModel->create($pacienteVo);

        switch ($cadastrarModel) {
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: ");
                break;

            case "invalid_CPF":
                $_SESSION["msg"] = "CPF inválido";
                header("Location: ");
                break;

            case "already_registered":
                $_SESSION["msg"] = "Paciente já cadastrado.";
                header("Location: ");
                break;

            case "invalid_name":
                $_SESSION["msg"] = "O nome deve ter entre 2 e 40 caracteres.";
                header("Location: ");
                break;  

            case "not_an_mobile_number":
                $_SESSION["msg"] = "Telefone inválido";
                header("Location: ");
                break;

            case "not_an_email":
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: ");
                break;
           
            case "invalid_date":
                $_SESSION["msg"] = "Data de nascimento inválida";
                header("Location: ");
                break;   
            
            case "success":
                $_SESSION["msg"] = "Paciente criado com sucesso";            
                header("Location: ");
                break;
        }        
    }

    public function update(){       
        $pacienteVo = new pacienteVO();        
        $pacienteVo->setCPF($_POST["cpf"]);             
        $pacienteVo->setNome($_POST["Nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["Telefone"]);
        $pacienteVo->setEmail($_POST["email"]);       
        $data = explode("/",$_POST["nascimento"]);        
        $pacienteVo->setDataNasc($data[2]."-".$data[1]."-".$data[0]);
        
        $pacienteModel = new pacienteModel();
        $update = $pacienteModel->update($pacienteVo);

        switch ($update) {
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: ");
                break;

            case "invalid_CPF":
                $_SESSION["msg"] = "CPF inválido";
                header("Location: ");
                break;

            case "already_registered":
                $_SESSION["msg"] = "Paciente já cadastrado.";
                header("Location: ");
                break;

            case "invalid_name":
                $_SESSION["msg"] = "O nome deve ter entre 2 e 40 caracteres.";
                header("Location: ");
                break;  

            case "not_an_mobile_number":
                $_SESSION["msg"] = "Telefone inválido";
                header("Location: ");
                break;

            case "not_an_email":
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: ");
                break;
           
            case "invalid_date":
                $_SESSION["msg"] = "Data de nascimento inválida";
                header("Location: ");
                break;   
            
            case "success":
                $_SESSION["msg"] = "Paciente criado com sucesso";            
                header("Location: ");
                break;
        }        
    }

    public function delete(){
        $pacienteModel = new pacienteModel();
                
        $delete = $pacienteModel->delete($pacienteVo);

        switch ($delete) {
            case "success":
                $_SESSION["msg"] = "Paciente excluído com sucesso";            
                header("Location: ");
                echo $_SESSION["msg"];
                break;
            case "failed":
                $_SESSION["msg"] = "Erro ao excluir o paciente";
                header("Location: ");
                echo $_SESSION["msg"];
                break; 
        }
    }
}    
?>