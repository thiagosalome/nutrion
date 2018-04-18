<?php

class pacienteVo{
    private $id;
    private $cpf;
    private $nome;
    private $sexo;
    private $telefone;
    private $email;
    private $dataNasc;

     
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCPF()
    {
        return $this->cpf;
    }
    
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    
    public function getSexo()
    {
        return $this->sexo;
    }
    
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

     
    public function getTelefone()
    {
        return $this->telefone;
    }
 
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
    

    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    
    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }
}

?>