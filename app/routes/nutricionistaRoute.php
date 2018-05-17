<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";

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
}


?>