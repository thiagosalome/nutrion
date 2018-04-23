<?php
class nutricionistaDAO{

    /**
     * Método para consulta de um nutricionista pelo email
     *
     * @param nutricionistaVO $nutricionista
     */
    public function getByEmail($email){
        require "app/bootstrap.php";        
        try{
            $nutricionista = $entityManager->getRepository("Nutricionista")->findOneBy(array("email" => $email));            
            return $nutricionista;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Método de inserção do usuário
     *
     * @param nutricionistaVO $nutricionista
     */
    public function insert(nutricionistaVo $nutricionistaVo){
        require "app/bootstrap.php"; 
        try{
            $nutricionista = new Nutricionista;
            $nutricionista->setNome($nutricionistaVo->getNome());
            $nutricionista->setEmail($nutricionistaVo->getEmail());
            $nutricionista->setSenha($nutricionistaVo->getSenha());
                
            $entityManager->persist($nutricionista);    
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }       

    /**
     * Método de edição do usuário
     *
     * @param nutricionistaVO $nutricionista
     */    
    public function update(nutricionistaVO $nutricionista){                
        require "app/bootstrap.php";
        try{
            $update = new Nutricionista;
            $update = $entityManager->find('Nutricionista',$nutricionista->getId());

            $update->setNome($nutricionista->getNome()); 
            $update->setEmail($nutricionista->getEmail());
            $update->setSenha($nutricionista->getSenha());  
            $entityManager->persist($update); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }   
    } 
    
    /**
     * Método de exclusão do usuário
     *
     * @param nutricionistaVO $nutricionista
     */
    public function delete(nutricionistaVO $nutricionista){
        require "app/bootstrap.php";
        try{                                       
            $delete = new Nutricionista;
            $delete = $entityManager->find('Nutricionista', $nutricionista->getId());

            $delete->getPacientes()->removeElement($attr);
            /*foreach ($delete->getPacientes() as $attr)
            {
                $entityManager->remove($attr);
                $entityManager->flush();
            }*/
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