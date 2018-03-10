<?php

class UsuarioModel{

    public function insert(UsuarioVO $usuario){
        $userDAO = new UsuarioDAO();

        if($usuario->getSenha() != 0){
            return $userDAO->insert($usuario);
        }
    }
}

?>