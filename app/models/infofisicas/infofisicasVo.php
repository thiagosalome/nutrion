<?php

class infofisicasVo{
    private $id;
    private $peso;
    private $altura;
    private $imc;
    private $cintura;
    private $quadril;
    private $icq;
    private $classificacaoIPAQ;
    private $idPaciente;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
        return $this;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        $this->altura = $altura;
        return $this;
    }

    public function getImc()
    {
        return $this->imc;
    }

    public function setImc($imc)
    {
        $this->imc = $imc;
        return $this;
    }

    public function getCintura()
    {
        return $this->cintura;
    }

    public function setCintura($cintura)
    {
        $this->cintura = $cintura;
        return $this;
    }

    public function getQuadril()
    {
        return $this->quadril;
    }

    public function setQuadril($quadril)
    {
        $this->quadril = $quadril;
        return $this;
    }

    public function getIcq()
    {
        return $this->icq;
    }

    public function setIcq($icq)
    {
        $this->icq = $icq;
        return $this;
    }

    public function getClassificacaoIPAQ()
    {
        return $this->classificacaoIPAQ;
    }

    public function setClassificacaoIPAQ($classificacaoIPAQ)
    {
        $this->classificacaoIPAQ = $classificacaoIPAQ;
        return $this;
    }

    public function getimc()
    {
        return $this->imc;
    }

    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
        return $this;
    }
    
}

?>
