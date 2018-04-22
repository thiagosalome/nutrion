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
     * @Column(type="string", name="cpf")
     */
    protected $cpf;

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
     * @Column(type="string", name="email")
     */
    protected $email;

    /**
     * @Column(type="date", name="dataNasc")
     */
    protected $dataNasc;
        
    /**
     * @ManyToOne(targetEntity="Nutricionista")
     * @JoinColumn(name="id_nutricionista", referencedColumnName="id")
     */
    protected $idNutricionista;

    public function getId()
    {
        return $this->id;
    }

    public function getCPF()
    {
        return $this->cpf;
    }
    
    public function setCPF($cpf)
    {
        $this->cpf = $cpf;

        return $this;
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
    
    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    public function setDataNasc($dataNasc)
    {
        $this->dataNasc = $dataNasc;

        return $this;
    }
   
    public function getIdNutricionista()
    {
        return $this->idNutricionista;
    }

    public function setIdNutricionista($idNutricionista)
    {
        $this->idNutricionista = $idNutricionista;

        return $this;
    }
}
?>