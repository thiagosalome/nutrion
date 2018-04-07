<?php
class nutricionistaModel{
    
    /**
     * Método para definir regras de negócio na exclusão e chamar método delete da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function delete(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO;

        // validar senha? confirmar a senha

        if($nutricionistaDao->delete($nutricionista)){
            return "sucess";
        }
        else{
            return "failed";
        }
    }

    /**
     * Método para definir regras de negócio na edição e chamar método update da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function update(nutricionistaVO $nutricionista,$emailUsuarioLogado){              
        if (empty($nutricionista->getEmail()) or empty($nutricionista->getSenha() or empty($nutricionista->getNome()))) {
            return "empty";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionista->getEmail())){
            return "not_an_email";
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionista->getNome())){
            return "invalid_name"; 
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();
            $update = $nutricionistaDao->update($nutricionista,$emailUsuarioLogado);
            if($update != true){
                return "failed";
            }
            else{
                return "sucess";
            }

            //verificar se novo email já está no BD:
            /*
                $user = $nutricionistaDao->getByEmail($nutricionista->getEmail());            
                if($user != null){
                    return "already_registered";
                }            
                else{
                    $update = $nutricionistaDao->update($nutricionista);
                    if($update != true){
                        return "failed";
                    }
                    else{
                        return "sucess";
                    }
                }*/
        }
    }    
   
    public function signIn(nutricionistaVO $nutricionistaVo){
               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha())) {
            return "empty";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return "not_an_email";
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();                       
            $user = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            if($user == null){
                return "unregistered";
            }            
            else{ 
                if($nutricionistaVo->getSenha()!=$user->getSenha()){
                    return "loginfailed";
                }
                else{
                    return "sucess";
                }
            }
        }   
    }

    public function signUp(nutricionistaVO $nutricionistaVo){
               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha() or empty($nutricionistaVo->getNome()))) {
            return "empty";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return "not_an_email";
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionistaVo->getNome())){
            return "invalid_name"; 
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();                       
            $user = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            if($user != null){
                return "already_registered";
            }            
            else{
                $cadastro = $nutricionistaDao->insert($nutricionistaVo);
                if($cadastro != true){
                    return "failed";
                }
                else{
                    return "sucess";
                }
            }
        }   
    }
}
?>