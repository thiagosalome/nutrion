<?php

/**
 * @Entity
 * @Table(name="tb_dieta")
 * 
 */
class Dieta
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    public $id;

    /**
     * @Column(type="date", name="dataDieta")
     */
    public $dataDieta;

    /**
     * @ManyToOne(targetEntity="Paciente", inversedBy="dietas")
     * @JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    public $paciente;

    /**
     * @OneToMany(targetEntity="Refeicao", mappedBy="dieta", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $refeicoes;

    public function getId()
    {
        return $this->id;
    }

    public function getDataDieta()
    {
        return $this->dataDieta;
    }

    public function setDataNasc($dataDieta)
    {
        $this->dataDieta = $dataDieta;
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
}
?>