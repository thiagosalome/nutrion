<?php

class pacienteVo{
    private $id;
    private $nome;
    private $sexo;
    private $telefone;
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