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

    public function signIn(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVO();  
        
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);
        
        $logarModel = $nutricionistaModel->signIn($nutricionistaVo);
        if($logarModel == "success_signin"){
            session_start();
            $_SESSION["email_nutricionista"] = $nutricionistaVo->getEmail();
        }
        echo $logarModel;
    }

    public function create(){
        $nutricionistaVo = new nutricionistaVO();  
        
        try{
            $nutricionistaVo->setNome($_POST["nome"]);
            $nutricionistaVo->setEmail($_POST["email"]);
            $nutricionistaVo->setSenha($_POST["senha"]);
            
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
            $update = $nutricionistaModel->update($nutricionistaVo);
    
            /*if($update == "success_update"){
                $nutricionista  = $nutricionistaModel->getById($_POST["id_nutricionista"]);   
                session_start();
                $_SESSION["email_nutricionista"] = $nutricionista->getEmail();
                $_SESSION["nome_nutricionista"] = $nutricionista->getNome();
                $_SESSION["senha_nutricionista"] = $nutricionista->getSenha();      
            }*/

            echo $update;      
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
            $delete = $nutricionistaModel->delete($nutricionistaVo);
    
            /*if($delete=="success_delete"){
                session_start();
                if(isset($_SESSION["email_nutricionista"])){
                    session_destroy();
                }        
            }*/
            echo $delete;
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