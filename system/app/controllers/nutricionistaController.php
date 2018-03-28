<?php

/*
    Passos:
        Criar método cadastrar (action)
            Instanciar classe nutricionistaModel
            Instanciar class nutricionistaVo
            Setar os valores no objeto do nutricionistaVo através do post ($_POST['nome'])
            Verificar se o método insert da model foi inserido (if($model->insert($nutricionista)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"

        Criar método cadastro (rota para view)

        Criar método edita (rota para view)
            Instanciar classe nutricionistaModel
            Criar variável $nutricionista que recebe $model->getById($_GET["id"]);
            Passar os dados do $nutricionista para cada section referente
                Ex: $_SESSION["id"] = $nutricionista->getId();
        
        Criar método atualizar (action)
            Instanciar classe nutricionistaModel
            Instanciar class nutricionistaVo
            Setar os valores no objeto do nutricionistaVo através do post ($_POST['nome']), incluindo $id
            Verificar se o método update da model foi inserido (if($model->update($nutricionista)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"

        Fazer includes das Models(VO,DAO,Model) e DB
*/

require_once "app/models/nutricionista/nutricionistaDAO.php";
require_once "app/models/nutricionista/nutricionistaVo.php";
require_once "app/models/nutricionista/nutricionistaModel.php";

class nutricionistaController{

    public function cadastrar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVo();
        
        $nutricionistaVo->setNome($_POST["nome"]); ///verificar campos!!!
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);

        $insertModel = $nutricionistaModel->insertModel($nutricionistaVo);
        session_start();
        switch ($insertModel) {
            case 0:
                $_SESSION["msg"] = "Erro ao cadastrar usuário.";
                header("Location: /nutrion/system/nutricionista/login");
                break;
            
            case 1:
                $_SESSION["msg"] = "Usuário cadastrado com sucesso.";
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case 2:
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case 3:
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: /nutrion/system/nutricionista/login");
                break;
            
            case 4:
                $_SESSION["msg"] = "O nome deve ter entre 2 e 40 caracteres.";
                header("Location: /nutrion/system/nutricionista/login");
                break;
            
            case 5:
                $_SESSION["msg"] = "Esse usuário já está cadastrado no banco.";
                header("Location: /nutrion/system/nutricionista/login");
                break;
        }
    }

    public function login(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/login.php";
    }

    public function dashboard(){
        // Rota para view de login e cadastro
        include "app/views/nutricionista/dashboard.php";
    }

    public function logar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionistaVo = new nutricionistaVO();  
        
        $nutricionistaVo->setEmail($_POST["email"]);
        $nutricionistaVo->setSenha($_POST["senha"]);
        
        $logarModel = $nutricionistaModel->logarModel($nutricionistaVo);
        session_start();
        switch ($logarModel) {
            case 0:
                $_SESSION["msg"] = "Usuário inválido ou inexistente.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case 1:
                $_SESSION["msg"] = "Usuário logado com sucesso";
                $_SESSION["email"] = $nutricionistaVo->getEmail();
                header("Location: /nutrion/system/nutricionista/dashboard");
                break;

            case 2:
                $_SESSION["msg"] = "Há campos vazios.";
                header("Location: /nutrion/system/nutricionista/login");
                break;

            case 3:
                $_SESSION["msg"] = "O email digitado é inválido.";
                header("Location: /nutrion/system/nutricionista/login");
                break;
        }
    }

    public function edita(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = $nutricionistaModel->getByIdModel($_GET["id"]);

        $_SESSION["id"] = $nutricionista->getById();
        $_SESSION["nome"] = $nutricionista->getNome();
        $_SESSION["email"] = $nutricionista->getEmail();
        $_SESSION["senha"] = $nutricionista->getSenha();

        /* Rota para a view de edição */
    }

    public function atualizar(){
        $nutricionistaModel = new nutricionistaModel();
        $nutricionista = new nutricionistaVo();
        
        $nutricionista->setId($_POST["id"]);
        $nutricionista->setName($_POST["nome"]);
        $nutricionista->setEmail($_POST["email"]);
        $nutricionista->setSenha($_POST["senha"]);

        if($nutricionistaModel->updateModel($nutricionista)){
            $_SESSION["msg"] = "Usuário atualizado com sucesso!";
        }
        else{
            $_SESSION["msg"] = "Erro ao atualizar usuário!";
        }
    }
}

?>