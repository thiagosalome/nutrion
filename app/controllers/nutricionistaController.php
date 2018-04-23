<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";

class nutricionistaController{  

    public function getNutricionistaByEmail($email){
        if($email != null){
            $nutricionistaDao = new nutricionistaDAO();
            $nutricionista  = $nutricionistaDao->getByEmail($email);            
            return $nutricionista;
        }
    } 

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

    public function signUp(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVO();  
        
        $nutricionistaVo->setNome($_POST["nome"]);
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);
        
        $cadastrarModel = $nutricionistaModel->signUp($nutricionistaVo);
        echo $cadastrarModel;
    }

    public function update(){
        $nutricionistaVo = new nutricionistaVo();
        
        $nutricionistaVo->setId($_POST["id_nutricionista"]); 
        $nutricionistaVo->setNome($_POST["nome"]);
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);              

        $nutricionistaModel = new nutricionistaModel();        
        $nutricionistaModel=$nutricionistaModel->update($nutricionistaVo);

        echo $nutricionistaModel;        
    } 

    public function delete(){
        $nutricionistaVo = new nutricionistaVO();
        $nutricionistaVo->setId($_POST["id_nutricionista"]);  

        $nutricionistaModel = new nutricionistaModel();     
        $delete = $nutricionistaModel->delete($nutricionistaVo);

        if($delete=="success_delete"){           
            header("Location: " . HOME_URI);
        }
        echo $delete;       
    }      
}
?>