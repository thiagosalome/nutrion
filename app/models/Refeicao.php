<?php

/**
 * @Entity
 * @Table(name="tb_refeicao")
 * 
 */
class Refeicao
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    public $id;

    /**
     * @Column(type="string", name="nome")
     */
    public $nome;

    /**
     * @Column(type="string", name="horario")
     */
    public $horario;

    /**
     * @ManyToOne(targetEntity="Dieta", inversedBy="refeicoes")
     * @JoinColumn(name="id_dieta", referencedColumnName="id")
     */
    public $dieta;

    /**
     * @OneToMany(targetEntity="ItemRefeicao", mappedBy="refeicao", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $itensrefeicao;


    public function getId()
    {
        return $this->id;
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

    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;
        return $this;
    }

    public function getDieta()
    {
        return $this->dieta;
    }

    public function setDieta($dieta)
    {
        $this->dieta = $dieta;
        return $this;
    }

    public function getItensRefeicao()
    {
        return $this->itensrefeicao;
    }

    public function setItensRefeicao($itensrefeicao)
    {
        $this->itensrefeicao = $itensrefeicao;
        return $this;
    }
}
?>