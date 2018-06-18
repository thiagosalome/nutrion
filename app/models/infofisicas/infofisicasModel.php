<?php

class infofisicasModel {
    
    public function create(infofisicasVo $infofisicasVo) {
        if(empty($infofisicasVo->getIdPaciente())){
            return json::generate("Conflito", "409", "É necessário passar id do paciente referente a essa informação física.", null);
        }
        if (empty($infofisicasVo->getPeso()) or empty($infofisicasVo->getAltura()) or empty($infofisicasVo->getImc()) or empty($infofisicasVo->getCintura()) or empty($infofisicasVo->getQuadril()) or empty($infofisicasVo->getIcq()) or empty($infofisicasVo->getClassificacaoIPAQ())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados das informações físicas", null);
        }
        else {
            $infoFisicasDAO = new infofisicasDAO();                       
            $insert = $infoFisicasDAO->create($infofisicasVo);
            //$paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
            // VERIFICAR SE O ID DO PACIENTE INSERIDO EXISTE --> negar a função !itsobject. Caso ele não exista, o paciente é inválido
            //if(is_object($paciente)){
            //    return "O paciente já foi cadastrado antes";
            //}
            
            
            if(is_object($insert)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Informações Físicas cadastradas com sucesso", $insert_array);
            }
        }
    }

    public function getAll($idPaciente){
        $infoFisicasDAO = new infofisicasDAO();  
        $infoFisicas = $infoFisicasDAO->getAll($idPaciente);
        $infofisicas_array = array();
        $infofisica = array();
        
        for($i = 0; $i < count($infoFisicas); $i++){
            $infofisica["id"] = $infoFisicas[$i]->getId();
            $infofisica["altura"] = $infoFisicas[$i]->getAltura();
            $infofisica["peso"] = $infoFisicas[$i]->getPeso();
            $infofisica["imc"] = $infoFisicas[$i]->getImc();
            $infofisica["cintura"] = $infoFisicas[$i]->getCintura();
            $infofisica["quadril"] = $infoFisicas[$i]->getQuadril();
            $infofisica["icq"] = $infoFisicas[$i]->getIcq();
            $infofisica["ipaq"] = $infoFisicas[$i]->getClassificacaoIPAQ();

            $infofisicas_array[$i] = $infofisica;
        }
        return json::generate("OK", "200", "Informações físicas deste paciente", $pacientes_array);
    }

    public function getById($id){
        $infoFisicasDAO = new infofisicasDAO();  
        $infoFisica = $infoFisicasDAO->getById($id);
        if($infoFisica != null){
            $infofisica_array = (array) $infoFisica;
            return json::generate("OK", "200", "Informação física encontrada", $infofisica_array);
        }
        else{
            return json::generate("OK", "200", "Informação física não encontrada", $infoFisica);
        }
    }
}

?>
