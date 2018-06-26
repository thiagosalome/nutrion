<?php

class nutricionistaVO{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $conta;
    private $chave;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of conta
     */ 
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set the value of conta
     *
     * @return  self
     */ 
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * Get the value of chave
     */ 
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * Set the value of chave
     *
     * @return  self
     */ 
    public function setChave($chave)
    {
        $this->chave = $chave;

        return $this;
    }
}

?>