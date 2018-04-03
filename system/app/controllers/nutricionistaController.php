<?php
require "app/models/nutricionista/nutricionistaDAO.php";
require "app/models/nutricionista/nutricionistaVo.php";
require "app/models/nutricionista/nutricionistaModel.php";

class nutricionistaController{  

    public $emailUsuarioLogado;

    public function login(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/login.php";
    }

    public function dashboard(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/dashboard.php";
    }

    public function signIn(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVO();  
        
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);
        
        $logarModel = $nutricionistaModel->signIn($nutricionistaVo);
        session_start();
        switch ($logarModel) {               
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "not_an_email":
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "unregistered":
                $_SESSION["msg"] = "Usuário inválido ou inexistente.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "loginfailed":
                $_SESSION["msg"] = "Usuário e/ou senha inválido.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "sucess":
                $_SESSION["msg"] = "Usuário logado com sucesso";
                $_SESSION["loggeduser"] = $nutricionistaVo->getEmail();
                $emailUsuarioLogado = $nutricionistaVo->getEmail();               
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;
        }
    }

    public function signUp(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVO();  
        
        $nutricionistaVo->setNome($_POST["nome"]);
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);
        
        $logarModel = $nutricionistaModel->signUp($nutricionistaVo);
        session_start();
        switch ($logarModel) {               
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "not_an_email":
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "invalid_name":
                $_SESSION["msg"] = "O nome deve ter entre 2 e 40 caracteres.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "already_registered":
                $_SESSION["msg"] = "Email já cadastrado.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case "failed":
                $_SESSION["msg"] = "Erro ao cadastrar o usuário.";
                header("Location: /nutrion/system/nutricionista/login");
                break;    

            case "sucess":
                $_SESSION["msg"] = "Usuário cadastrado com sucesso";
                $emailUsuarioLogado = $nutricionistaVo->getEmail(); 
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;
        }
    }

    public function delete(){
        $nutricionistaModel = new nutricionistaModel();
        //$nutricionistaVo = new nutricionistaVO();
        
        $deleteNutricionista = $nutricionistaModel->delete();

        switch ($deleteNutricionista) {
            case "success":
                $_SESSION["msg"] = "Usuário excluído com sucesso";            
                header("Location: /nutrion/system/nutricionista/login");
                echo $_SESSION["msg"];
                break;
            case "failed":
                $_SESSION["msg"] = "Erro ao excluir o usuário.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                echo $_SESSION["msg"];
                break; 
        }
    }

    public function update(){                          
        $novoNutricionista = new nutricionistaVo();
        /* $nutricionista->setNome($_POST["nome"]);
        $nutricionista->setEmail($_POST["email"]);
        $nutricionista->setSenha($_POST["senha"]); */
        session_start();
        $novoNutricionista->setNome("nome");
        $novoNutricionista->setEmail("email@email.com");
        $novoNutricionista->setSenha("senha");

        

        $nutricionistaModel = new nutricionistaModel();
        //$nutricionistaModel=$nutricionistaModel->update($novoNutricionista,$emailUsuarioLogado);
        $nutricionistaModel=$nutricionistaModel->update($novoNutricionista);
        switch ($nutricionistaModel) {
            case "empty":
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case "not_an_email":
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case "invalid_name":
                $_SESSION["msg"] = "O nome deve ter entre 2 e 40 caracteres.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case "already_registered":
                $_SESSION["msg"] = "Email já cadastrado.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case "failed":
                $_SESSION["msg"] = "Erro ao atualizar o usuário.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;    

            case "sucess":
                $_SESSION["msg"] = "Usuário atualizado com sucesso";            
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;
        }
    }
}
?>