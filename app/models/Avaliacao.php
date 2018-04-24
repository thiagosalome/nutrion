<?php

/**
 * @Entity
 * @Table(name="tb_avaliacao")
 * 
 */
class Avaliacao
{
    /**
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id")
     */
    protected $id;

    /**
     * @Column(type="date", name="data_aval")
     */
    protected $data_aval;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of data_aval
     */ 
    public function getDataAval()
    {
        return $this->data_aval;
    }

   /**
     * @var InfoFisicaPaciente
     *
     * @OneToMany(targetEntity="tb_infofisicas")
     * @JoinColumn(name="id_infoFisicas", referencedColumnName="id")
     */ 

}

?>