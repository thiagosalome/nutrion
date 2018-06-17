<?php
class DietaDAO{
    public function insert(DietaVo $dietaVo){
        require "app/bootstrap.php";
        
        try{
            $dieta = new Dieta;
            $dieta->setId($dietaVo->getId());
            $dieta->setPaciente($dietaVo->getPaciente());
            $dieta->setData(new \DateTime($dietaVo->getData_aval()." 00:00:00"));
                
            $entityManager->persist($dieta);           
            $entityManager->flush();
            return $dieta;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
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

    public function delete(DietaVo $dietavo){
        require "app/bootstrap.php";
        try{
            $dietaDAO = new DietaDAO(); 
            $dieta = new DietaVo();
            $dieta = $dietaDAO->getId($dietaVo);
                  
            $delete = new dieta;
            $delete = $entityManager->find('Dieta',$dieta->getId());
            $entityManager->remove($delete); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }  
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