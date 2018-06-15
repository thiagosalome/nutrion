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
    public $id;

    /**
     * @Column(type="string", name="cpf")
     */
    public $cpf;

    /**
     * @Column(type="string", name="nome")
     */
    public $nome;
    
    /**
     * @Column(type="string", name="telefone")
     */
    public $telefone;

    /**
     * @Column(type="string", name="sexo")
     */
    public $sexo;

    /**
     * @Column(type="string", name="email")
     */
    public $email;

    /**
     * @Column(type="date", name="dataNasc")
     */
    public $dataNasc;
        
    /**
     * @ManyToOne(targetEntity="Nutricionista", inversedBy="pacientes")
     * @JoinColumn(name="id_nutricionista", referencedColumnName="id")
     */
    public $nutricionista;

    /**
     * @OneToMany(targetEntity="InfoFisicas", mappedBy="paciente", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $infoFisicas;

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

    /**
     * Get the value of infoFisicas
     */ 
    public function getInfoFisicas()
    {
        return $this->infoFisicas;
    }

    /**
     * Set the value of infoFisicas
     *
     * @return  self
     */ 
    public function setInfoFisicas($infoFisicas)
    {
        $this->infoFisicas = $infoFisicas;

        return $this;
    }
}
?>