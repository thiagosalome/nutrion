<?php
class nutricionistaDAO{

    /**
     * Método para consulta de um nutricionista pelo email
     *
     * @param nutricionistaVO $nutricionista
     */
    public function getByEmail($email){
        require "app/bootstrap.php";        
        $nutricionista = $entityManager->getRepository("Nutricionista")->findOneBy(array("email" => $email));            
        return $nutricionista;
    }

    /**
     * Método para consulta de um nutricionista pelo id
     *
     * @param nutricionistaVO $nutricionista
     */
    public function getById($id){
        require "app/bootstrap.php";        
        $nutricionista = $entityManager->getRepository("Nutricionista")->findOneBy(array("id" => $id));            
        return $nutricionista;
    }

    public function getAll(){
        require "app/bootstrap.php";
        $nutricionista = $entityManager->getRepository("Nutricionista")->findAll();
        return $nutricionista;
    }

    /**
     * Método de inserção do usuário
     *
     * @param nutricionistaVO $nutricionista
     */
    public function insert(nutricionistaVo $nutricionistaVo){
        require "app/bootstrap.php"; 
        $nutricionista = new Nutricionista;
        $nutricionista->setNome($nutricionistaVo->getNome());
        $nutricionista->setEmail($nutricionistaVo->getEmail());
        $nutricionista->setSenha($nutricionistaVo->getSenha());
        $nutricionista->setConta($nutricionistaVo->getConta());
            
        $entityManager->persist($nutricionista);    
        $entityManager->flush();
        return $nutricionista;
    }       

    /**
     * Método de edição do usuário
     *
     * @param nutricionistaVO $nutricionista
     */    
    public function update(nutricionistaVO $nutricionista){                
        require "app/bootstrap.php";
        $update = $entityManager->find('Nutricionista',$nutricionista->getId());

        $update->setNome($nutricionista->getNome()); 
        $update->setEmail($nutricionista->getEmail());
        $update->setSenha($nutricionista->getSenha());  
        $entityManager->persist($update); 
        $entityManager->flush();
        return $update;
    } 
    
    /**
     * Método de exclusão do usuário
     *
     * @param nutricionistaVO $nutricionista
     */
    public function delete(nutricionistaVO $nutricionista){
        require "app/bootstrap.php";
        $delete = $entityManager->find('Nutricionista',$nutricionista->getId());
        $entityManager->remove($delete);
        $entityManager->flush();

        return true;
    }  
}
?>