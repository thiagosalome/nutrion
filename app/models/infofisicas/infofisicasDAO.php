<?php

class infofisicasDAO {
    public function create(infofisicasVo $infofisicasVo) {
        require "app/bootstrap.php"; 
        try{
            $infofisicas = new InfoFisicas;
            $infofisicas->setPeso($infofisicasVo->getPeso());
            $infofisicas->setAltura($infofisicasVo->getAltura());
            $infofisicas->setImc($infofisicasVo->getImc());
            $infofisicas->setCintura($infofisicasVo->getCintura());
            $infofisicas->setQuadril($infofisicasVo->getQuadril());
            $infofisicas->setIcq($infofisicasVo->getIcq());
            $infofisicas->setClassificacaoIPAQ($infofisicasVo->getClassificacaoIPAQ());
            $infofisicas->setIdPaciente($infofisicasVo->getIdPaciente());        
                
            $entityManager->persist($infofisicas);           
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
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
