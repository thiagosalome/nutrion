<?php
class DietaDAO{
    public function insert(dietaVo $dietaVo){
        require "app/bootstrap.php";
        $dieta = new Dieta;
        $paciente = $entityManager->find("Paciente", $dietaVo->getPaciente());

        $dieta->setPaciente($paciente);
        $dieta->setData(new \DateTime($dietaVo->getData()." 00:00:00"));
            
        $entityManager->persist($dieta);           
        $entityManager->flush();
        return $dieta;
    }
    public function update(DietaVo $dietavo){
        require "app/bootstrap.php";
        $update = $entityManager->find('Dieta', $dietavo->getId());

        $update->setId($dietaVo->getId());
        $update->setpaciente($dietaVo->getPaciente());
        $update->setdata(new \DateTime($dietaVo->getdata()." 00:00:00"));

        $entityManager->persist($update); 
        $entityManager->flush();

        return $update;
    }

    public function delete(dietaVo $dietaVo){
        require "app/bootstrap.php";
        $delete = new Dieta;

        $delete = $entityManager->find('Dieta', $dietaVo->getId());
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }

    public function getAll($idPaciente){
        require "app/bootstrap.php";
        $paciente = $entityManager->find("Paciente", $idPaciente);
        $dietas = $paciente->getDietas();
        return $dietas;
    }

    public function getById($idDieta){
        require "app/bootstrap.php";
        $dieta = $entityManager->find("Dieta", $idDieta);
        return $dieta;
    }
}
?>