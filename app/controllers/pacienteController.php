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

    public function create(){
        $pacienteModel = new pacienteModel();
        $pacienteVo = new pacienteVO();  
        
        $pacienteVo->setCPF($_POST[""]);
        $pacienteVo->setNome($_POST["Nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["Telefone"]);
        $pacienteVo->setEmail($_POST[""]);
        $data = explode("/",$_POST["nascimento"]);        
        $pacienteVo->setDataNasc($data[2]."-".$data[1]."-".$data[0]." 00:00:00");
        
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

            case "invalid_name"://revisar quantos caracteres, alterar no model
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
                $_SESSION["msg"] = "Data inválida";
                header("Location: ");
                break;   
            
            case "success":
                $_SESSION["msg"] = "Paciente criado com sucesso";            
                header("Location: ");
                break;

    }
}

    public function update(){
    }

    public function delete(){
    }
}    
?>