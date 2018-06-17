<?php
class refeicaoVo{
    private $id;
    private $nome; 
    private $horario;
    private $dieta;
     
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

    public function getHorario()
    {
        return $this->horario;
    }
    
    public function setHorario($horario)
    {
        $this->horario = $horario;
        return $this;
    }

    public function getDieta()
    {
        return $this->dieta;
    }

    public function setDieta($dieta)
    {
        $this->dieta = $dieta;
        return $this;
    }
}
?>