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
    private $id;

    /**
     * @Column(type="string", name="cpf")
     */
    private $cpf;

    /**
     * @Column(type="string", name="nome")
     */
    private $nome;
    
    /**
     * @Column(type="string", name="telefone")
     */
    private $telefone;

    /**
     * @Column(type="string", name="sexo")
     */
    private $sexo;

    /**
     * @Column(type="string", name="email")
     */
    private $email;

    /**
     * @Column(type="date", name="dataNasc")
     */
    private $dataNasc;
        
    /**
     * @ManyToOne(targetEntity="Nutricionista", inversedBy="pacientes")
     * @JoinColumn(name="id_nutricionista", referencedColumnName="id")
     */
    private $nutricionista;

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
   
    public function getNutricionista()
    {
        return $this->nutricionista;
    }

    public function setNutricionista($nutricionista)
    {
        $this->nutricionista = $nutricionista;

        return $this;
    }
}
?>