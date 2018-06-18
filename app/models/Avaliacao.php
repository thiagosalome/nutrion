<?php

/**
 * @Entity
 * @Table(name="tb_avaliacao")
 * 
 */
class Avaliacao
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    public $id;

    /**
     * @Column(type="date", name="dataAval")
     */
    public $dataAval;

    /**
     * @ManyToOne(targetEntity="InfoFisicas", inversedBy="avaliacao")
     * @JoinColumn(name="id_infofisicas", referencedColumnName="id")
     */
    public $infoFisicas;


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
}

?>