<?php

/**
 * @Entity
 * @Table(name="tb_itemrefeicao")
 * 
 */
class ItemRefeicao
{
    /** @Id @ManyToOne(targetEntity="Refeicao", inversedBy="itensrefeicao") 
    * @Column(type="integer", name="id_refeicao")
    */
    public $refeicao;

    /** @Id @ManyToOne(targetEntity="Alimento", inversedBy="itensrefeicao") 
    * @Column(type="integer", name="id_alimento")
    */
    public $alimento;

    /**
     * @Column(type="string", name="quantidade")
     */
    public $quantidade;


    public function getRefeicao()
    {
        return $this->refeicao;
    }

    public function setRefeicao($refeicao)
    {
        $this->refeicao = $refeicao;
        return $this;
    }

    public function getAlimento()
    {
        return $this->alimento;
    }

    public function setAlimento($alimento)
    {
        $this->alimento = $alimento;
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