<?php

class infofisicasDAO {
    public function create(infofisicasVo $infofisicasVo) {
        require "app/bootstrap.php"; 
        $insert = new InfoFisicas;
        $paciente = $entityManager->find("Paciente", $infofisicasVo->getIdPaciente());

        $insert->setPaciente($paciente); 
        $insert->setPeso($infofisicasVo->getPeso());
        $insert->setAltura($infofisicasVo->getAltura());
        $insert->setImc($infofisicasVo->getImc());
        $insert->setCintura($infofisicasVo->getCintura());
        $insert->setQuadril($infofisicasVo->getQuadril());
        $insert->setIcq($infofisicasVo->getIcq());
        $insert->setClassificacaoIPAQ($infofisicasVo->getClassificacaoIPAQ());
            
        $entityManager->persist($insert);           
        $entityManager->flush();
        
        return $insert;
    }


    public function getAll($idPaciente) {
        require "app/bootstrap.php";
        $paciente = $entityManager->find("Paciente", $idPaciente);
        $infofisicas = $paciente->getInfoFisicas();       
        return $infofisicas;
    }

    public function getById($idInfoFisica){
        require "app/bootstrap.php";
        $infoFisica = $entityManager->find("InfoFisicas", $idInfoFisica);
        return $infoFisica;
    }
}

?>
