<?php
class nutricionistaModel{
    
    /**
     * Método para definir regras de negócio na exclusão e chamar método delete da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    //public function delete(nutricionistaVO $nutricionista){
    public function delete(){
        $nutricionistaDao = new nutricionistaDAO();
        $nutricionista = new nutricionistaVo();

        session_start();
        if(isset($_SESSION['loggeduser'])){ 
            $emailUsuarioLogado = $_SESSION["loggeduser"];
            //echo $emailUsuarioLogado;
        }

        //$nutricionista = $nutricionistaDao->getByEmail($emailUsuarioLogado);
        // validar senha? confirmar a senha

        $delete = $nutricionistaDao->delete($emailUsuarioLogado);

        if($delete){
            return "success";
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
    //public function update(nutricionistaVO $nutricionista,$emailUsuarioLogado){  
    public function update(nutricionistaVO $nutricionista){                
        if (empty($nutricionista->getEmail()) or empty($nutricionista->getSenha() or empty($nutricionista->getNome()))) {
            return "Há campos vazios.";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionista->getEmail())){
            return "O email digitado é inválido.";
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionista->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres."; 
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();
            //$update = $nutricionistaDao->update($nutricionista,$emailUsuarioLogado);
            $update = $nutricionistaDao->update($nutricionista);
            if($update != true){
                return "failed";
            }
            else{
                return "success";
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
                        return "success";
                    }
                }*/
        }
    }    
   
    public function signIn(nutricionistaVO $nutricionistaVo){
               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha())) {
            return "Há campos vazios.";
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return "O email digitado é inválido.";
        }
        else{
            $nutricionistaDao = new nutricionistaDAO();                       
            $user = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            

            //Caso não encontrou o usuário
            if(is_object($user)){
                if($nutricionistaVo->getSenha() != $user->getSenha()){
                    return "Usuário e/ou senha inválido.";
                }
                else{
                    return "success_signin";
                }
            }
            else if($user == null){
                return "Usuário inexistente.";
            }
            else{
                return "exception " . $user;
            }
            
        }   
    }

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
            $user = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            
            // Verifica se usuário já existe
            if(is_object($user)){
                return "Email já cadastrado.";
            }
            else if($user == null){
                $cadastro = $nutricionistaDao->insert($nutricionistaVo);

                if($cadastro == true){
                    return "success_signup";
                }
                else{
                    return "exception " . $user;
                }
            }
            else{
                return "exception " . $user;
            }
        }   
    }
}
?>