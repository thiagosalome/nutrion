<?php
/**
 * @Entity
 * @Table(name="tb_paciente")
 * 
 */
class Paciente{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    protected $id;

    /**
     * @Column(type="string", name="nome")
     */
    protected $nome;

    /**
     * @Column(type="string", name="telefone")
     */
    protected $telefone;

    /**
     * @Column(type="string", name="sexo")
     */
    protected $sexo;

    /**
     * @Column(type="date", name="dataNasc")
     */
    protected $dataNasc;

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

    public function getTelefone()
    {
        return $this->telefone;
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }
    
    public function getsexo()
    {
        return $this->sexo;
    }

    public function setsexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getdataNasc()
    {
        return $this->dataNasc;
    }

    public function setdataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }
}
?>