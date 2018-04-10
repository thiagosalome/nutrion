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
            return $e->getMessage();
        }
    }    

    /**
     * Método de exclusão do usuário
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function delete($emailUsuarioLogado){
        require "app/bootstrap.php";
        try{
            $nutricionistaDAO = new nutricionistaDAO(); 
            $nutricionistaLogado = new nutricionistaVo();
            $nutricionistaLogado = $nutricionistaDAO->getByEmail($emailUsuarioLogado);
                  
            $delete = new Nutricionista;
            $delete = $entityManager->find('Nutricionista',$nutricionistaLogado->getId());
            $entityManager->remove($delete); 
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
    //public function update(nutricionistaVO $nutricionista,$emailUsuarioLogado){
    public function update(nutricionistaVO $nutricionista){
        
        if(isset($_SESSION['loggeduser'])){ 
            $emailUsuarioLogado = $_SESSION["loggeduser"];
            //echo $emailUsuarioLogado;
        }
        
        require "app/bootstrap.php";
        try{
            //$nutricionistaDAO = new UsuarioDAO; 
            //$nutricionistaLogado = new UsuarioVO;
            $nutricionistaLogado = new nutricionistaVo();
            //$nutricionistaLogado = $nutricionistaDAO->getByEmail($emailUsuarioLogado);
            //$nutricionistaLogado->setEmail($emailUsuarioLogado);
            $nutricionistaDAO = new nutricionistaDAO;
            $nutricionistaLogado = $nutricionistaDAO->getByEmail($emailUsuarioLogado);

            $update = new Nutricionista;
            $update = $entityManager->find('Nutricionista',$nutricionistaLogado->getId());

            $update->setNome($nutricionista->getNome()); 
            $update->setEmail($nutricionista->getEmail());
            $update->setSenha($nutricionista->getSenha());  
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
            return $e->getMessage();
        }
    }
}
?>