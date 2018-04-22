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
        include "app/views/nutricionista/consultarPaciente.php";
    }
    
    public function adicionar(){
        include "app/views/nutricionista/adicionarPaciente.php";
    }    
    
    public function create(){        
        $pacienteVo = new pacienteVO();     
        $pacienteVo->setIdNutricionista($_POST["id_nutricionista"]);   
        $pacienteVo->setCPF($_POST["cpf"]);//remover os pontos              
        $pacienteVo->setNome($_POST["Nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["Telefone"]);//formato:(21) 98765-4321
        $pacienteVo->setEmail($_POST["email"]);       
        $data = explode("/",$_POST["nascimento"]);        
        $pacienteVo->setDataNasc($data[2]."-".$data[1]."-".$data[0]);
        
        $pacienteModel = new pacienteModel();
        $cadastrar = $pacienteModel->create($pacienteVo);

        echo $cadastrar;       
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

        echo $update;    
    }

    public function delete(){
        $pacienteModel = new pacienteModel();                
        $delete = $pacienteModel->delete($pacienteVo);

        echo $delete;
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