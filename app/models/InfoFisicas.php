<?php

/**
 * @Entity
 * @Table(name="tb_infofisicas")
 * 
 */
class InfoFisicas
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    protected $id;

    /**
     * @Column(type="float", name="peso")
     */
    protected $peso;

    /**
     * @Column(type="float", name="altura")
     */
    protected $altura;

    /**
     * @Column(type="float", name="imc")
     */
    protected $imc;

     /**
     * @Column(type="date", name="dataAvaliacao")
     */
    protected $dataAvaliacao;

     /**
     * @Column(type="id", name="id_paciente")
     */
    protected $id_paciente;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of peso
     */ 
    public function getpeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setpeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of altura
     */ 
    public function getaltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setaltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get the value of imc
     */ 
    public function getimc()
    {
        return $this->imc;
    }

    /**
     * Set the value of imc
     *
     * @return  self
     */ 
    public function setimc($imc)
    {
        $this->imc = $imc;

        return $this;
    }

    /**
     * Get the value of dataAvaliacao
     */ 
    public function getdataAvaliacao()
    {
        return $this->dataAvaliacao;
    }

    /**
     * Set the value of dataAvaliacao
     *
     * @return  self
     */ 
    public function setdataAvaliacao($dataAvaliacao)
    {
        $this->dataAvaliacao = $dataAvaliacao;

        return $this;
    }
}

?>