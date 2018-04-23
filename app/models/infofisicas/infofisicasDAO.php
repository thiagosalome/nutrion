<?php

class infofisicasDAO {
    public function create(infofisicasVo $infofisicasVo) {
        require "app/bootstrap.php"; 
        try{
            $infofisicas = new InfoFisicas;
            $infofisicas->setPeso($nfofisicasVo->getPeso());
            $infofisicas->setAltura($nfofisicasVo->getAltura());
            $infofisicas->setImc($nfofisicasVo->getImc());
            $infofisicas->setCintura($nfofisicasVo->getCintura());
            $infofisicas->setQuadril($nfofisicasVo->getQuadril());
            $infofisicas->setIcq($nfofisicasVo->getIcq());
            $infofisicas->setClassificacaoIPAQ($nfofisicasVo->getClassificacaoIPAQ());
            $infofisicas->setIdPaciente($nfofisicasVo->getIdPaciente());        
                
            $entityManager->persist($infofisicas);           
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }

    public function update(infofisicasVo $infofisicasVo) {

    }

    public function delete() {

    }

    public function getByIdPaciente($idPaciente) {
        require "app/bootstrap.php";        
        try{
            $infofisica = $entityManager->getRepository("InfoFisicas")->findBy(array("id_paciente" => $idPaciente));            
            return $infofisica;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}

?>
