<?php

/*
    Passos:
        Criar método cadastrar (action)
            Instanciar classe UsuarioModel
            Instanciar class UsuarioVo
            Setar os valores no objeto do UsuarioVo através do post ($_POST['nome'])
            Verificar se o método insert da model foi inserido (if($model->insert($usuario)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"

        Criar método cadastro (rota para view)

        Criar método edita (rota para view)
            Instanciar classe UsuarioModel
            Criar variável $usuario que recebe $model->getById($_GET["id"]);
            Passar os dados do $usuario para cada section referente
                Ex: $_SESSION["id"] = $usuario->getId();
        
        Criar método atualizar (action)
            Instanciar classe UsuarioModel
            Instanciar class UsuarioVo
            Setar os valores no objeto do UsuarioVo através do post ($_POST['nome']), incluindo $id
            Verificar se o método update da model foi inserido (if($model->update($usuario)){})
            Retornar uma $_SESSION['msg'] = "Mensagem a passar"
*/

class UsuarioController{

    public function cadastrar(){
        $usuarioModel = new UsuarioModel();
        $usuario = new UsuarioVo();
        
        $usuario->setName($_POST["nome"]);
        $usuario->setTipo($_POST["tipo"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setSenha($_POST["senha"]);

        if($usuarioModel->insert($usuario)){
            $_SESSION["msg"] = "Usuário cadastrado com sucesso!";
        }
        else{
            $_SESSION["msg"] = "Erro ao cadastrar usuário!";
        }
    }

    public function cadastro(){
        /* Rota para view de cadastro */
    }

    public function edita(){
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->getById($_GET["id"]);

        $_SESSION["id"] = $usuario->getById();
        $_SESSION["nome"] = $usuario->getNome();
        $_SESSION["tipo"] = $usuario->getTipo();
        $_SESSION["email"] = $usuario->getEmail();
        $_SESSION["senha"] = $usuario->getSenha();

        /* Rota para a view de edição */
    }

    public function atualizar(){
        $usuarioModel = new UsuarioModel();
        $usuario = new UsuarioVo();
        
        $usuario->setId($_POST["id"]);
        $usuario->setName($_POST["nome"]);
        $usuario->setTipo($_POST["tipo"]);
        $usuario->setEmail($_POST["email"]);
        $usuario->setSenha($_POST["senha"]);

        if($usuarioModel->update($usuario)){
            $_SESSION["msg"] = "Usuário atualizado com sucesso!";
        }
        else{
            $_SESSION["msg"] = "Erro ao atualizar usuário!";
        }
    }
}

?>