<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";
require "app/class/json.php";

class nutricionistaController{  

    /*public function login(){
        include "app/views/nutricionista/login.php";
    }

    public function signOut(){
        session_start();

        if(isset($_SESSION["email_nutricionista"])){
            session_destroy();
            header("Location: " . HOME_URI);
        }
    }*/

    public function getNutricionistaByEmail($email){
        if($email != null){
            $nutricionistaModel = new nutricionistaModel();
            $nutricionista  = $nutricionistaModel->getByEmail($email);            
            return $nutricionista;
        }
    }

    public function create(){
        $nutricionistaVo = new nutricionistaVO();  
        
        try{
            $nutricionistaVo->setNome($_POST["nome"]);
            $nutricionistaVo->setEmail($_POST["email"]);
            // $nutricionistaVo->setSenha(password_hash($_POST["senha"], PASSWORD_DEFAULT));
            // $nutricionistaVo->setSenha(password_hash($_POST["senha"], PASSWORD_BCRYPT));
            $nutricionistaVo->setSenha($_POST["senha"]);
            $nutricionistaVo->setConta("nutrion");
            
            $nutricionistaModel = new nutricionistaModel();
            $cadastrar = $nutricionistaModel->create($nutricionistaVo);
            echo $cadastrar;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function update($_PUT){
        $nutricionistaVo = new nutricionistaVo();
        
        try{
            $nutricionistaVo->setId($_PUT["id_nutricionista"]); 
            $nutricionistaVo->setNome($_PUT["nome"]);
            $nutricionistaVo->setEmail($_PUT["email"]);
            $nutricionistaVo->setSenha($_PUT["senha"]);              
    
            $nutricionistaModel = new nutricionistaModel();        
            $update = json_decode($nutricionistaModel->update($nutricionistaVo));
    
            if(strpos($update->message, "sucesso") !== false){
                $nutricionistaDAO = new NutricionistaDAO();
                $nutricionista  = $nutricionistaDAO->getById($_PUT["id_nutricionista"]);   
                session_start();
                $_SESSION["email_nutricionista"] = $nutricionista->getEmail();
                $_SESSION["nome_nutricionista"] = $nutricionista->getNome();
                $_SESSION["senha_nutricionista"] = $nutricionista->getSenha();      
            }

            echo json_encode($update);
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    } 

    public function delete($_DELETE){
        $nutricionistaVo = new nutricionistaVO();
        
        try{
            $nutricionistaVo->setId($_DELETE["id_nutricionista"]);  
    
            $nutricionistaModel = new nutricionistaModel();     
            $delete = json_decode($nutricionistaModel->delete($nutricionistaVo));
    
            if(strpos($delete->message, "sucesso") !== false){
                session_start();
                if(isset($_SESSION["email_nutricionista"])){
                    session_destroy();
                }        
            }
            echo json_encode($delete);
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function get($params){
        try{
            $nutricionistaModel = new nutricionistaModel();
            
            if(isset($params["id"])){
                $nutricionista = $nutricionistaModel->getById($params["id"]);
                echo $nutricionista;
            }
            else{
                $nutricionistas = $nutricionistaModel->getAll();
                echo $nutricionistas;
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}
?>