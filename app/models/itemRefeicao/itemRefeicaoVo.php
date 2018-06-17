<?php
class itemRefeicaoVo{
    private $id;
    private $alimento;
    private $quantidade;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

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