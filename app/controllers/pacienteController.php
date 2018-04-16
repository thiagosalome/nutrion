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
        /*
        $pacienteVo->setNome($_POST["nome"]);
        $pacienteVo->setSexo($_POST["sexo"]);
        $pacienteVo->setTelefone($_POST["telefone"]);
        $pacienteVo->setDataNasc($_POST["datanasc"]);
        */
        
        $pacienteVo->setNome("nome");
        $pacienteVo->setSexo("f");
        $pacienteVo->setTelefone("31999999999");
        $pacienteVo->setDataNasc("01/01/2001");
    
        $cadastrarModel = $pacienteModel->create($pacienteVo);
    }

    public function update(){
    }

    public function delete(){
    }
}    
?>