<?php

/**
 * @Entity
 * @Table(name="tb_nutricionista")
 * 
 */
class Nutricionista
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    public $id;

    /**
     * @Column(type="string", name="email")
     */
    public $email;

    /**
     * @Column(type="string", name="senha")
     */
    public $senha;

    /**
     * @Column(type="string", name="nome")
     */
    public $nome;

    /**
     * @Column(type="string", name="conta")
     */
    public $conta;

    /**
     * @OneToMany(targetEntity="Paciente", mappedBy="nutricionista", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $pacientes; //OBS: mappedBy pega o nome da variável de referência a nutricionista dentro da classe paciente

    /**
     * @OneToMany(targetEntity="Alimento", mappedBy="nutricionista", orphanRemoval=true, cascade={"persist", "remove"})
     */
    public $alimentos;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of pacientes
     */ 
    public function getPacientes()
    {
        return $this->pacientes;
    }

    /**
     * Set the value of pacientes
     *
     * @return  self
     */ 
    public function setPacientes($pacientes)
    {
        $this->pacientes = $pacientes;

        return $this;
    }

    /**
     * Get the value of alimentos
     */ 
    public function getAlimentos()
    {
        return $this->alimentos;
    }

    /**
     * Set the value of alimentos
     *
     * @return  self
     */ 
    public function setAlimentos($alimentos)
    {
        $this->alimentos = $alimentos;

        return $this;
    }

    /**
     * Get the value of conta
     */ 
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set the value of conta
     *
     * @return  self
     */ 
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }
}

?>