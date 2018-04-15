<?php

class pacienteDAO{
    public function insert(pacienteVo $pacienteVo){
        require "app/bootstrap.php";
        
        try{
            $paciente = new Paciente;
            $paciente->setNome($pacienteVo->getNome());
            $paciente->setSexo($pacienteVo->getSexo());
            $paciente->setTelefone($pacienteVo->getTelefone());
            $paciente->setDataNasc($pacienteVo->getDataNasc());
                
            $entityManager->persist($paciente);           
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }

    public function upDate(pacienteVo $pacienteVo){

    }

    public function delete(pacienteVo $pacienteVo){

    }

    public function get(pacienteVo $pacienteVo){

    }
}
?>