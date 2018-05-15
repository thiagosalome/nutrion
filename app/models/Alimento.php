<?php

/**
 * @Entity
 * @Table(name="tb_alimento")
 * 
 */
class Alimento
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    protected $id;

    /**
     * @Column(type="string", name="nome")
     */
    protected $nome;

    /**
     * @Column(type="string", name="medida") 
     */
    protected $medida;

    /**
     * @Column(type="string", name="tipoProteina")
     */
    protected $tipoproteina;

    /**
     * @Column(type="float", name="caloria")
     */
    protected $caloria;

    
    /**
     * @Column(type="float", name="proteina")
     */
    protected $proteina;

    /**
     * @Column(type="float", name="carboidrato")
     */
    protected $carboidrato;

    /**
     * @Column(type="float", name="gordura")
     */
    protected $gordura;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nome
     */ 
    public function getnome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setnome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of caloria
     */ 
    public function getcaloria()
    {
        return $this->caloria;
    }

    /**
     * Set the value of caloria
     *
     * @return  self
     */ 
    public function setcaloria($caloria)
    {
        $this->caloria = $caloria;

        return $this;
    }

    /**
     * Get the value of proteina
     */ 
    public function getproteina()
    {
        return $this->proteina;
    }

    /**
     * Set the value of proteina
     *
     * @return  self
     */ 
    public function setproteina($proteina)
    {
        $this->proteina = $proteina;

        return $this;
    }

    /**
     * Get the value of carboidrato
     */ 
    public function getcarboidrato()
    {
        return $this->carboidrato;
    }

    /**
     * Set the value of carboidrato
     *
     * @return  self
     */ 
    public function setcarboidrato($carboidrato)
    {
        $this->carboidrato = $carboidrato;

        return $this;
    }
     /**
     * Get the value of gordura
     */ 
    public function getgordura()
    {
        return $this->gordura;
    }

    /**
     * Set the value of gordura
     *
     * @return  self
     */ 
    public function setgordura($gordura)
    {
        $this->gordura = $gordura;

        return $this;
    }    

    /**
     * Get the value of medida
     */ 
    public function getMedida()
    {
        return $this->medida;
    }

    /**
     * Set the value of medida
     *
     * @return  self
     */ 
    public function setMedida($medida)
    {
        $this->medida = $medida;

        return $this;
    }

    /**
     * Get the value of tipoproteina
     */ 
    public function getTipoproteina()
    {
        return $this->tipoproteina;
    }

    /**
     * Set the value of tipoproteina
     *
     * @return  self
     */ 
    public function setTipoproteina($tipoproteina)
    {
        $this->tipoproteina = $tipoproteina;

        return $this;
    }
}

?>