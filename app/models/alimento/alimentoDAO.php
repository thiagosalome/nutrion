<?php
class alimentoDAO{
  
    public function getBy(){
        require "app/bootstrap.php";        
        try{
                       
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    public function insert(alimentoVo $alimento){
        require "app/bootstrap.php"; 
        try{
            
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }       

    public function update(alimentoVo $alimentoVo){                
    /*  PRECISA TESTAR  
        require "app/bootstrap.php";
        try{
            $update = new Alimento;
            $update = $entityManager->find('Alimento', $alimentoVo->getId());

            $update->setNome($alimentoVo->getNome());
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
    */   
    } 
    
    public function delete(alimentoVo $alimentoVo){
    /*  PRECISA TESTAR    
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
    */     
    }  
}
?>