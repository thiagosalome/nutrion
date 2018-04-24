<?php
class nutricionistaModel{

    public function getByEmail($email){
        if($email != null){
            $nutricionistaDao = new nutricionistaDAO();
            $nutricionista  = $nutricionistaDao->getByEmail($email);            
            return $nutricionista;
        }
    }
    
    public function getById($id){
        if($id != null){
            $nutricionistaDao = new nutricionistaDAO();
            $nutricionista  = $nutricionistaDao->getById($id);            
            return $nutricionista;
        }
    }
       
    /**
     * Método para definir regras de negócio do login do nutricionista
     *
     * @param nutricionistaVO $nutricionista
     */ 
    public function signIn(nutricionistaVO $nutricionistaVo){               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha())) {
            return "Há campos vazios.";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return "O email digitado é inválido.";
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();                       
            $usuario = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());           

            if(is_object($usuario)){
                if($nutricionistaVo->getSenha() != $usuario->getSenha()){
                    return "Usuário e/ou senha inválido.";
                }
                else{
                    return "success_signin";
                }
            }
            else if($usuario == null){
                return "Usuário inexistente";
            }
            else{
                return "exception " . $usuario;
            }            
        }   
    }

    /**
     * Método para definir regras de negócio na criação e chamar método insert da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     */   
    public function signUp(nutricionistaVO $nutricionistaVo){
               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha() or empty($nutricionistaVo->getNome()))) {
            return "Há campos vazios.";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return "O email digitado é inválido.";
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionistaVo->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres."; 
        }
        else{      
            $nutricionistaDao = new nutricionistaDAO();                                
            $usuario = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            
            // Verifica se usuário já existe
            if(is_object($usuario)){
                return "Email já cadastrado.";
            }
            else if($usuario == null){
                $cadastro = $nutricionistaDao->insert($nutricionistaVo);

                if($cadastro == true){
                    return "success_signup";
                }
                else{
                    return "exception " . $usuario;
                }
            }
            else{
                return "exception " . $usuario;
            }
        }   
    }

    /**
     * Método para definir regras de negócio na edição e chamar método update da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista     
     */   
    public function update(nutricionistaVO $nutricionista){                
        if (empty($nutricionista->getEmail()) or empty($nutricionista->getSenha() or empty($nutricionista->getNome()))) {
            return "Há campos vazios";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionista->getEmail())){
            return "O email digitado é inválido";
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionista->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres"; 
        }
        else{
            //verificando se novo email já está no BD:
            $nutricionistaDao = new nutricionistaDAO(); 
            $novoEmailEmUso = $nutricionistaDao->getByEmail($nutricionista->getEmail());

           /* if($novoEmailEmUso != null){
                return "Email inserido já está sendo utilizado";
            }            
            else{   */       
            
            $update = $nutricionistaDao->update($nutricionista);
            if($update == true){
                return "success_update";
            }
            else{
                return "exception " . $update;
            }
            // }            
        }
    } 

    /**
     * Método para definir regras de negócio na exclusão e chamar método delete da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista     
     */    
    public function delete(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO();       
        $delete = $nutricionistaDao->delete($nutricionista);

        if($delete){
            return "success_delete";
        }
        else{
            return "exception " . $delete;
        }
    }
}
?>