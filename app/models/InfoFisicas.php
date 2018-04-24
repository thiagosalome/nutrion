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
     * @Column(type="integer", name="imc")
     */
    protected $imc;

    /**
     * @Column(type="float", name="cintura")
     */
    protected $cintura;

    /**
     * @Column(type="integer", name="quadril")
     */
    protected $quadril;

    /**
     * @Column(type="integer", name="icq")
     */
    protected $icq;

    /**
     * @Column(type="string", name="classificacaoIPAQ")
     */
    protected $classificacaoIPAQ;

    /**
     * @ManyToOne(targetEntity="Paciente")
     * @JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    protected $idPaciente;


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