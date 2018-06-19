<?php
class itemRefeicaoVo{
    private $refeicao;
    private $alimento;
    private $quantidade;

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