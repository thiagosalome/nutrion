<?php
class alimentoVo{
    private $id;
    private $nome;
    private $proteina; 
    private $carboidrato;
    private $gordura;
    private $calorias;      
     
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

    public function getgordura()
    {
        return $this->gordura;
    }
    
    public function setgordura($gordura)
    {
        $this->gordura = $gordura;
        return $this;
    }  

    public function getcalorias()
    {
        return $this->calorias;
    }
    
    public function setcalorias($calorias)
    {
        $this->calorias = $calorias;
        return $this;
    }
}
?>