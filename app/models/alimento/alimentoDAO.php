<?php
class alimentoDAO{
  
    public function getByNome($nome){
        /*  PRECISA TESTAR
        require "app/bootstrap.php";        
        try{
            $alimento = $entityManager->getRepository("Alimento")->findOneBy(array("nome" => $nome));            
            return $alimento;          
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        */
    }

    public function getAllAliments(){
        require "app/bootstrap.php";
        try{
            $alimento = $entityManager->getRepository("Alimento")->findAll();
            return $alimento;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    public function insert(alimentoVo $alimentoVo){
        require "app/bootstrap.php"; 
        try{
            $insert = new Alimento;

            $insert->setNome($alimentoVo->getNome());
            $insert->setMedida($alimentoVo->getMedida());
            $insert->setTipoproteina($alimentoVo->getTipoproteina());
            $insert->setCaloria($alimentoVo->getCaloria());
            $insert->setProteina($alimentoVo->getProteina());
            $insert->setCarboidrato($alimentoVo->getCarboidrato());
            $insert->setGordura($alimentoVo->getGordura());

            $entityManager->persist($insert); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }       

    public function update(alimentoVo $alimentoVo){                
        require "app/bootstrap.php";
        try{
            $update = $entityManager->find('Alimento', $alimentoVo->getId());

            $update->setNome($alimentoVo->getNome());
            $update->setMedida($alimentoVo->getMedida());
            $update->setTipoproteina($alimentoVo->getTipoproteina());
            $update->setCaloria($alimentoVo->getCaloria());
            $update->setProteina($alimentoVo->getProteina());
            $update->setCarboidrato($alimentoVo->getCarboidrato());
            $update->setGordura($alimentoVo->getGordura());

            $entityManager->persist($update); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    } 
    
    public function delete(alimentoVo $alimentoVo){
        require "app/bootstrap.php";
        try{                                       
            $delete = $entityManager->find('Alimento', $alimentoVo->getId());
            $entityManager->remove($delete); 
            $entityManager->flush();

            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }  
}
?>