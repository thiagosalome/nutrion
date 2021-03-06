<?php

class pacienteDAO{
    /*
    public function search($query){
        require "app/bootstrap.php";
        
        try{
            $paciente = $entityManager->getRepository("Paciente")->createQueryBilder('t')
                ->where('t.Nome LIKE :query')                
                ->setParameter('query',$query)
                ->getQuery()
                ->getResult();         
            return $paciente;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }
    */

    /**
     * Método para consulta de um paciente pelo cpf
     *
     * @param pacienteVO $paciente
     */
    public function getByCPF($cpf){
        require "app/bootstrap.php";        
        try{
            $paciente = $entityManager->getRepository("Paciente")->findOneBy(array("cpf" => $cpf));            
            return $paciente;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Retorna um array com todos os pacientes
     *
     * @param [type] $idNutricionista
     * @return void
     */
    public function getAll($idNutricionista){
        require "app/bootstrap.php";
        $nutricionista = $entityManager->find("Nutricionista", $idNutricionista);
        $pacientes = $nutricionista->getPacientes();
        return $pacientes;
    }

    public function getById($idPaciente){
        require "app/bootstrap.php";
        $paciente = $entityManager->find("Paciente", $idPaciente);
        return $paciente;
    }

     /**
     * Método de inserção do paciente
     *
     * @param pacienteVO $paciente
     */
    public function insert(pacienteVo $pacienteVo){
        require "app/bootstrap.php";        
        $paciente = new Paciente;
        $nutricionista = $entityManager->find("Nutricionista", $pacienteVo->getIdNutricionista());

        $paciente->setNutricionista($nutricionista);
        $paciente->setNome($pacienteVo->getNome());
        $paciente->setTelefone($pacienteVo->getTelefone());
        $paciente->setEmail($pacienteVo->getEmail());
        $paciente->setSexo($pacienteVo->getSexo());
        $paciente->setDataNasc(new \DateTime($pacienteVo->getDataNasc()." 00:00:00"));
        $paciente->setCPF($pacienteVo->getCPF());
            
        $entityManager->persist($paciente);           
        $entityManager->flush();
        return $paciente;
    }

    /**
     * Método de ediçao do paciente
     *
     * @param pacienteVO $paciente
     */
    public function update(pacienteVo $pacienteVo){
        require "app/bootstrap.php";
        $update = $entityManager->find('Paciente', $pacienteVo->getId());

        $update->setNome($pacienteVo->getNome());
        $update->setTelefone($pacienteVo->getTelefone());
        $update->setEmail($pacienteVo->getEmail());
        $update->setSexo($pacienteVo->getSexo());
        $update->setDataNasc(new \DateTime($pacienteVo->getDataNasc()." 00:00:00"));
        $update->setCPF($pacienteVo->getCPF());

        $entityManager->persist($update); 
        $entityManager->flush();

        return $update;
    }

    /**
     * Método de exclusao do paciente
     *
     * @param pacienteVO $paciente
     */
    public function delete(pacienteVo $pacienteVo){
        require "app/bootstrap.php";
        $delete = $entityManager->find('Paciente', $pacienteVo->getId());
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }

}
?>