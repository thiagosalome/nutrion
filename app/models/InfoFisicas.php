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
    public $id;

    /**
     * @Column(type="float", name="peso")
     */
    public $peso;

    /**
     * @Column(type="float", name="altura")
     */
    public $altura;

    /**
     * @Column(type="float", name="imc")
     */
    public $imc;

    /**
     * @Column(type="float", name="cintura")
     */
    public $cintura;

    /**
     * @Column(type="float", name="quadril")
     */
    public $quadril;

    /**
     * @Column(type="float", name="icq")
     */
    public $icq;

    /**
     * @Column(type="string", name="classificacaoIPAQ")
     */
    public $classificacaoIPAQ;

    /**
     * @ManyToOne(targetEntity="Paciente",  inversedBy="infoFisicas")
     * @JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    public $paciente;

    /**
     * @OneToMany(targetEntity="Avaliacao", mappedBy="infoFisicas", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $avaliacoes;

    public function getId()
    {
        return $this->id;
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

    public function getPaciente()
    {
        return $this->paciente;
    }

    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;
        return $this;
    }


    /**
     * Get the value of avaliacoes
     */ 
    public function getAvaliacoes()
    {
        return $this->avaliacoes;
    }

    /**
     * Set the value of avaliacoes
     *
     * @return  self
     */ 
    public function setAvaliacoes($avaliacoes)
    {
        $this->avaliacoes = $avaliacoes;

        return $this;
    }
}

?>