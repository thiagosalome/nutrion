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
        
        $pacienteVo->setNome($_POST["Nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["Telefone"]);
       
        $data = explode("/",$_POST["nascimento"]);        
        $pacienteVo->setDataNasc($data[2]."-".$data[1]."-".$data[0]." 00:00:00");
        
        
    
        $cadastrarModel = $pacienteModel->create($pacienteVo);
    }

    public function update(){
    }

    public function delete(){
    }
}    
?>