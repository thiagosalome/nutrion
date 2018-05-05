<?php
class alimentoVo{
    private $id;
    private $nome;
    private $proteina; 
    private $carboidrato;      
     
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

    public function getproteina()
    {
        return $this->proteina;
    }

    public function setproteina($proteina)
    {
        $this->proteina = $proteina;

        return $this;
    }

    public function getcarboidrato()
    {
        return $this->carboidrato;
    }
    
    public function setcarboidrato($carboidrato)
    {
        $this->carboidrato = $carboidrato;
        return $this;
    }      
}
?>