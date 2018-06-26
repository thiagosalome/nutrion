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
        $nutricionistasArray = array();
        $nutricionista = array();
        
        for($i = 0; $i < count($nutricionistas); $i++){
            $nutricionista["id"] = $nutricionistas[$i]->getId();
            $nutricionista["nome"] = $nutricionistas[$i]->getNome();
            $nutricionista["email"] = $nutricionistas[$i]->getEmail();
            $nutricionistaPacientes = array();
            for($j = 0; $j < count($nutricionista[$i]->getPacientes()); $j++){
                $nutricionistaPacientes[$j] = $nutricionista[$i]->getPacientes()[$j]->getId();
            }
            $nutricionista["pacientes"] = $nutricionistaPacientes;

            $nutricionistasArray[$i] = $nutricionista;
        }
        return json::generate("OK", "200", "Nutricionistas encontrados", $nutricionistasArray);
    }

    public function getById($id){
        $nutricionistaDAO = new nutricionistaDAO();
        $nutricionista = $nutricionistaDAO->getById($id);
        if($nutricionista != null){
            $nutricionistaArray = array();

            $nutricionistaArray["id"] = $nutricionista->getId();
            $nutricionistaArray["nome"] = $nutricionista->getNome();
            $nutricionistaArray["email"] = $nutricionista->getEmail();
            $nutricionistaPacientes = array();
            for($j = 0; $j < count($nutricionista->getPacientes()); $j++){
                $nutricionistaPacientes[$j] = $nutricionista->getPacientes()[$j]->getId();
            }
            $nutricionistaArray["pacientes"] = $nutricionistaPacientes;

            return json::generate("OK", "200", "Nutricionista encontrado", $nutricionistaArray);
        }
        else{
            return json::generate("OK", "200", "Nutricionista não encontrado", $nutricionista);
        }
    }
       
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
                    $nutricionistaArray = array();

                    $nutricionistaArray["id"] = $insert->getId();
                    $nutricionistaArray["nome"] = $insert->getNome();
                    $nutricionistaArray["email"] = $insert->getEmail();
                    $nutricionistaPacientes = array();
                    for($j = 0; $j < count($insert->getPacientes()); $j++){
                        $nutricionistaPacientes[$j] = $insert->getPacientes()[$j]->getId();
                    }
                    $nutricionistaArray["pacientes"] = $nutricionistaPacientes;
                    
                    return json::generate("OK", "200", "Nutricionista cadastrado com sucesso", $nutricionistaArray);
                }
            }
        }   
    }


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
            if(is_object($update)){
                $nutricionistaArray = array();

                    $nutricionistaArray["id"] = $update->getId();
                    $nutricionistaArray["nome"] = $update->getNome();
                    $nutricionistaArray["email"] = $update->getEmail();
                    $nutricionistaPacientes = array();
                    for($j = 0; $j < count($update->getPacientes()); $j++){
                        $nutricionistaPacientes[$j] = $update->getPacientes()[$j]->getId();
                    }
                    $nutricionistaArray["pacientes"] = $nutricionistaPacientes;

                return json::generate("OK", "200", "Nutricionista alterado com sucesso", $nutricionistaArray);
            }
        }
    } 
  
    public function delete(nutricionistaVO $nutricionista){
        $nutricionistaDAO = new nutricionistaDAO();       
        $delete = $nutricionistaDAO->delete($nutricionista);
        return json::generate("OK", "200", "Nutricionista deletado com sucesso", null);
    }

    public function generateKey(nutricionistaVo $nutricionistaVo){
        $nutricionistaDAO = new nutricionistaDAO();
        if($nutricionistaVo->getId() != null){
            $key = $nutricionistaDAO->setKey($nutricionistaVo);
            if(is_object($key)){
                $nutricionistaArray = array();

                    $nutricionistaArray["id"] = $key->getId();
                    $nutricionistaArray["nome"] = $key->getNome();
                    $nutricionistaArray["email"] = $key->getEmail();
                    $nutricionistaPacientes = array();
                    for($j = 0; $j < count($key->getPacientes()); $j++){
                        $nutricionistaPacientes[$j] = $key->getPacientes()[$j]->getId();
                    }
                    $nutricionistaArray["pacientes"] = $nutricionistaPacientes;

                return json::generate("OK", "200", "Chave gerada com sucesso", $nutricionistaArray);
            }
        }
    }

    public function validateKey($apiKey){
        $nutricionistaDAO = new nutricionistaDAO();
        $nutricionistas = $nutricionistaDAO->getAll();
        $validate = false;
        for ($i = 0; $i < count($nutricionistas); $i++) { 
            if($apiKey == $nutricionistas[$i]->getChave()){
                $validate = true;
            }
        }
        return $validate;
    }
}
?>