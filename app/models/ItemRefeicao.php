<?php

/**
 * @Entity
 * @Table(name="tb_itemRefeicao")
 * 
 */
class ItemRefeicao
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    public $idRefeicao;

    /**
     * @Column(type="string", name="nome")
     */
    public $idAlimento;

    /**
     * @Column(type="string", name="horario")
     */
    public $quantidade;


    public function getIdRefeicao()
    {
        return $this->idRefeicao;
    }

    public function setIdRefeicao($idRefeicao)
    {
        $this->idRefeicao = $idRefeicao;
        return $this;
    }

    public function getIdAlimento()
    {
        return $this->idAlimento;
    }

    public function setIdAlimento($idAlimento)
    {
        $this->idAlimento = $idAlimento;
        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
        return $this;
    }
}
?>