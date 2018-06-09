<?php
class DietaVo{
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

    public function getpaciente()
    {
        return $this->paciente;
    }
    
    public function setpaciente($paciente)
    {
        $this->paciente = $paciente;
        return $this;
    }

    public function getdata()
    {
        return $this->data;
    }
    
    public function setdata($data)
    {
        $this->data = $data;
        return $this;
    }
}
?>