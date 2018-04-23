<?php

class infofisicasModel {
    
    public function create(infofisicasVo $infofisicasVo) {
        if (empty($infofisicasVo->getPeso()) or empty($infofisicasVo->getAltura()) or empty($infofisicasVo->getImc()) or empty($infofisicasVo->getCintura()) or empty($infofisicasVo->getQuadril()) or empty($infofisicasVo->getIcq()) or empty($infofisicasVo->getClassificacaoIPAQ()) or empty($infofisicasVo->getIdPaciente())) {
            return "Há campos vazios";
        }
        else {
            $infofisicasDAO = new infofisicasDAO();                       
            
            //$paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
            // VERIFICAR SE O ID DO PACIENTE INSERIDO EXISTE --> negar a função !itsobject. Caso ele não exista, o paciente é inválido
            //if(is_object($paciente)){
            //    return "O paciente já foi cadastrado antes";
            //}
            
            $cadastro = $infofisicasDAO->insert($infofisicasVo);
            if($cadastro == true){
                return "Informações físicas do paciente criadas com sucesso";
            }
            else{
                //return "exception " . $paciente;  MENSAGEM PARA RETORNAR O ERRO
            }
        }
    }

    public function update() {

    }

    public function delete() {
        
    }
}

?>
