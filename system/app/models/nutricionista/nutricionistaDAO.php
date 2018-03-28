<?php
class nutricionistaDAO{

    /**
     * Método de inserção do usuário
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function insert(nutricionistaVo $nutricionistaVo){
        require "app/bootstrap.php"; // Fazendo o require do arquivo bootstrap.php para poder utilizar o entityManager

        try{
            $nutricionista = new Nutricionista;
            $nutricionista->setNome($nutricionistaVo->getNome());
            $nutricionista->setEmail($nutricionistaVo->getEmail());
            $nutricionista->setSenha($nutricionistaVo->getSenha());
    
            // O método persist recebe um objeto de forma a colocá-lo na fila de instruções a serem executadas
            $entityManager->persist($nutricionista);
    
            // O método flush executa no banco de dados todas as funções definidas pelo persist
            $entityManager->flush();

            return true;
        }
        catch (Expection $e){
            return false;
        }
    }    

    /**
     * Método de exclusão do usuário
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function delete(nutricionistaVO $nutricionista){
        require "app/bootstrap.php";
        try{                     
            $excluir = $entityManager->find('Nutricionista',$nutricionista->getId());
            $entityManager->remove($excluir); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        }        
    }

    /**
     * Método de edição do usuário
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function update(nutricionistaVO $nutricionista){
        require "app/bootstrap.php";
        try{
            // pegar usuario logado:
            $n=new NutricionistaVo();
            $n->setId(1);

            $update = $entityManager->find('Nutricionista',$n->getId());

            $update->setNome($nutricionista->getNome()); 
            $update->setEmail($nutricionista->getEmail()); 
            $entityManager->persist($update); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        }   
    }
     
    public function getByEmail($email){
        require "app/bootstrap.php";        
        try{
            $nutricionista = $entityManager->getRepository("Nutricionista")->findOneBy(array("email" => $email));            
            return $nutricionista;
        }
        catch(Exception $e){
            return false;
        }
    }
}
?>