<?php
class dietaVo{
    private $id;
    private $paciente;
    private $data;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;

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

    public function getData()
    {
        return $this->data;
    }
    
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
?>