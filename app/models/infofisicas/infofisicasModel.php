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
        $infoFisicasArray = array();
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
            $infoFisicasAvaliacoes = array();
            for($j = 0; $j < count($infoFisicas[$i]->getAvaliacoes()); $j++){
                $infoFisicasAvaliacoes[$j] = $infoFisicas[$i]->getAvaliacoes()[$j]->getId();
            }
            $infofisica["avaliacoes"] = $infoFisicasAvaliacoes;

            $infoFisicasArray[$i] = $infofisica;
        }
        return json::generate("OK", "200", "Informações físicas deste paciente", $infoFisicasArray);
    }

    public function getById($id){
        $infoFisicasDAO = new infofisicasDAO();  
        $infoFisica = $infoFisicasDAO->getById($id);

        if($infoFisica != null){
            $infoFisicaArray = array();

            $infoFisicaArray["id"] = $infoFisica->getId();
            $infoFisicaArray["altura"] = $infoFisica->getAltura();
            $infoFisicaArray["peso"] = $infoFisica->getPeso();
            $infoFisicaArray["imc"] = $infoFisica->getImc();
            $infoFisicaArray["cintura"] = $infoFisica->getCintura();
            $infoFisicaArray["quadril"] = $infoFisica->getQuadril();
            $infoFisicaArray["icq"] = $infoFisica->getIcq();
            $infoFisicaArray["ipaq"] = $infoFisica->getClassificacaoIPAQ();
            $infoFisicaArray["paciente"] = $infoFisica->getPaciente()->getId();
            $infoFisicaAvaliacoes = array();
            for($j = 0; $j < count($infoFisica->getAvaliacoes()); $j++){
                $infoFisicaAvaliacoes[$j] = $infoFisica->getAvaliacoes()[$j]->getId();
            }
            $infoFisicaArray["avaliacoes"] = $infoFisicaAvaliacoes;

            return json::generate("OK", "200", "Informação física encontrada", $infoFisicaArray);
        }
        else{
            return json::generate("OK", "200", "Informação física não encontrada", $infoFisica);
        }
    }
}

?>
