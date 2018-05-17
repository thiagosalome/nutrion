<?php

class pacienteRoute{ 

    public function consultar(){
        include "app/views/paciente/consultarPaciente.php";
    }
    
    public function adicionar(){
        include "app/views/paciente/adicionarPaciente.php";
    }  
    
    public function interna(){
        include "app/views/paciente/internaPaciente.php";
    }
    
}

?>