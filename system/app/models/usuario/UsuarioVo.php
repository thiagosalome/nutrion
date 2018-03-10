<?php

class UsuarioVO{
    private $nome;
    private $email;
    private $senha;

    public function setName($nome){
        $this->$nome = $nome;
    }
    
}

?>