<?php
class nutricionistaModel{

    public function getByEmail($email){
        if($email != null){
            $nutricionistaDao = new nutricionistaDAO();
            $nutricionista  = $nutricionistaDao->getByEmail($email);            
            return $nutricionista;
        }
    }
    
    public function getAll(){
        $nutricionistaDAO = new nutricionistaDAO();
        $nutricionistas = $nutricionistaDAO->getAll();
        $nutricionistas_array = array();
        $nutricionista = array();
        
        for($i = 0; $i < count($nutricionistas); $i++){
            $nutricionista["id"] = $nutricionistas[$i]->getId();
            $nutricionista["nome"] = $nutricionistas[$i]->getNome();
            $nutricionista["email"] = $nutricionistas[$i]->getEmail();

            $nutricionistas_array[$i] = $nutricionista;
        }
        return json::generate("OK", "200", "Nutricionistas encontrados", $nutricionistas_array);
    }

    public function getById($id){
        $nutricionistaDAO = new nutricionistaDAO();
        $nutricionista = $nutricionistaDAO->getById($id);
        if($nutricionista != null){
            $nutricionista_array = (array) $nutricionista;
            return json::generate("OK", "200", "Nutricionista encontrado", $nutricionista_array);
        }
        else{
            return json::generate("OK", "200", "Nutricionista não encontrado", $nutricionista);
        }
    }
       
    /**
     * Método para definir regras de negócio do login do nutricionista
     *
     * @param nutricionistaVO $nutricionista
     */ 
    public function signIn(nutricionistaVO $nutricionistaVo){

        if($nutricionistaVo->getConta() == "google"){
            $nutricionistaDao = new nutricionistaDAO();                                
            $nutricionista = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            
            // Se o usuário não existe
            if(!is_object($nutricionista)){
                $nutricionistaDao->insert($nutricionistaVo); // Realiza o cadastro
            }
            return json::generate("OK", "200", "Usuário logado com sucesso.", null);
        }
        else if($nutricionistaVo->getConta() == "nutrion"){
            /*if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha())) {
                return json::generate("Conflito", "409", "É necessário passar todos os dados do nutricionista", null);
            }  */ 
            if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
                return json::generate("Conflito", "409", "O email digitado é inválido", null);
            }
            else{
                $nutricionistaDao = new nutricionistaDAO();                       
                $usuario = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());           
    
                if(is_object($usuario)){
                    // Caso seja uma conta do tipo google
                    if($usuario->getConta() == "google"){
                        return json::generate("Conflito", "409", "Já existe uma conta Google vinculada a esse email.", null);
                    }
                    // else if(password_hash($nutricionistaVo->getSenha(), PASSWORD_DEFAULT) != $usuario->getSenha()){
                    // else if(!password_verify ($nutricionistaVo->getSenha(), $usuario->getSenha())){
                    else if($nutricionistaVo->getSenha() != $usuario->getSenha()){
                        return json::generate("Conflito", "409", "Usuário e/ou senha inválido.", null);
                    }
                    else{
                        return json::generate("OK", "200", "Usuário logado com sucesso.", null);
                    }
                }
                else if($usuario == null){
                    return json::generate("Conflito", "409", "Usuário inexistente", null);
                }
            }   
        }
    }

    /**
     * Método para definir regras de negócio na criação e chamar método insert da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     */   
    public function create(nutricionistaVO $nutricionistaVo){
               
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha() or empty($nutricionistaVo->getNome())) or empty($nutricionistaVo->getConta())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados do nutricionista", null);
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return json::generate("Conflito", "409", "O email digitado é inválido", null);
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionistaVo->getNome())){
            return json::generate("Conflito", "409", "O nome deve ter entre 2 e 40 caracteres.", null);
        }
        else{      
            $nutricionistaDao = new nutricionistaDAO();                                
            $nutricionista = $nutricionistaDao->getByEmail($nutricionistaVo->getEmail());            
            
            // Verifica se usuário já existe
            if(is_object($nutricionista)){
                return json::generate("Conflito", "409", "O nutricionista já foi cadastrado antes", null);
            }
            else if($nutricionista == null){
                $insert = $nutricionistaDao->insert($nutricionistaVo);

                if(is_object($insert)){
                    $insert_array = (array) $insert;
                    return json::generate("OK", "200", "Nutricionista cadastrado com sucesso", $insert_array);
                }
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
            return json::generate("Conflito", "409", "É necessário passar todos os dados do nutricionista", null);
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionista->getEmail())){
            return json::generate("Conflito", "409", "O email digitado é inválido", null);
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionista->getNome())){
            return json::generate("Conflito", "409", "O nome deve ter entre 2 e 40 caracteres.", null);
        }
        else{
            $nutricionistaDao = new nutricionistaDAO(); 
            
            $update = $nutricionistaDao->update($nutricionista);
            $update_array = (array) $update;
            return json::generate("OK", "200", "Nutricionista alterado com sucesso", $update_array);
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
        return json::generate("OK", "200", "Nutricionista deletado com sucesso", null);
    }
}
?>