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

    public function getAll(){
        /*  PRECISA TESTAR
        require "app/bootstrap.php";        
        try{
            $alimento = $entityManager->getRepository("Alimento")->findAll());            
            return $alimento;          
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        */
    }
    
    public function insert(alimentoVo $alimento){
        require "app/bootstrap.php"; 
        try{
            $insert = new Alimento;
            $insert = $entityManager->find('Alimento', $alimentoVo->getId());

            $insert->setNome($alimentoVo->getNome());
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