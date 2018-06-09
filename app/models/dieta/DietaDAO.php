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
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }
    public function update(DietaVo $dietavo){

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
            return false;
        }  
    }
    public function getAll(){
        
    }
}
?>