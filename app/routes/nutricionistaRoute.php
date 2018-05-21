<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";
require "app/class/json.php";

class nutricionistaRoute{  

    public function login(){
        include "app/views/nutricionista/login.php";
    }

    public function signOut(){
        session_start();

        if(isset($_SESSION["email_nutricionista"])){
            session_destroy();
            header("Location: " . HOME_URI);
        }
    }

    public function signIn(){
        $nutricionistaVo = new nutricionistaVO();  
        
        try{
            $nutricionistaModel = new nutricionistaModel();
            $nutricionistaVo->setEmail($_POST["email"]);
            $nutricionistaVo->setSenha($_POST["senha"]);
            
            $logarModel = $nutricionistaModel->signIn($nutricionistaVo);
            // if($logarModel == "success_signin"){
                session_start();
                $_SESSION["email_nutricionista"] = $nutricionistaVo->getEmail();
            // }
            echo $logarModel;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}


?>