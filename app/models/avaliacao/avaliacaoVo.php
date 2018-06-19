<?php

class avaliacaoVo{
    public $id;
    public $infoFisicas;
    public $dataAval;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of infoFisicas
     */ 
    public function getInfoFisicas()
    {
        return $this->infoFisicas;
    }

    /**
     * Set the value of infoFisicas
     *
     * @return  self
     */ 
    public function setInfoFisicas($infoFisicas)
    {
        $this->infoFisicas = $infoFisicas;

        return $this;
    }

    /**
     * Get the value of dataAval
     */ 
    public function getDataAval()
    {
        return $this->dataAval;
    }

    /**
     * Set the value of dataAval
     *
     * @return  self
     */ 
    public function setDataAval($dataAval)
    {
        $this->dataAval = $dataAval;

        return $this;
    }
}
?>