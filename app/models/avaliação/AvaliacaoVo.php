<?php
class avaliacaoVo{
    private $id;
    private $data_aval;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getData_aval()
    {
        return $this->data_aval;
    }
    
    public function setData_aval($data_aval)
    {
        $this->data_aval = $data_aval;
        return $this;
    }
}
?>