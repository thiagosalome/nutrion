<?php
class alimentoVo{
    private $id;
    private $idNutricionista; 
    private $nome;
    private $medida; 
    private $tipoproteina; 
    private $proteina; 
    private $carboidrato;
    private $gordura;
    private $caloria;      
     
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIdNutricionista()
    {
        return $this->idNutricionista;
    }

    public function setIdNutricionista($idNutricionista)
    {
        $this->idNutricionista = $idNutricionista;

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

    public function getCarboidrato()
    {
        return $this->carboidrato;
    }
    
    public function setCarboidrato($carboidrato)
    {
        $this->carboidrato = $carboidrato;
        return $this;
    }    

    public function getGordura()
    {
        return $this->gordura;
    }
    
    public function setGordura($gordura)
    {
        $this->gordura = $gordura;
        return $this;
    }  

    public function getCaloria()
    {
        return $this->caloria;
    }
    
    public function setCaloria($caloria)
    {
        $this->caloria = $caloria;
        return $this;
    }

    public function getTipoproteina()
    {
        return $this->tipoproteina;
    }

    public function setTipoproteina($tipoproteina)
    {
        $this->tipoproteina = $tipoproteina;

        return $this;
    }


    public function getMedida()
    {
        return $this->medida;
    }

    public function setMedida($medida)
    {
        $this->medida = $medida;

        return $this;
    }
}
?>