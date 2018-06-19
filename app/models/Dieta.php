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
    public $data;

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


    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;

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

    public function getRefeicoes()
    {
        return $this->refeicoes;
    }

    public function setRefeicoes($refeicoes)
    {
        $this->refeicoes = $refeicoes;

        return $this;
    }
}
?>