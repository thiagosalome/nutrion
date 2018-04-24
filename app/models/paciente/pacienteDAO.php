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
    public function getAllPatients($idNutricionista){
        require "app/bootstrap.php";
        try{
            $nutricionista = $entityManager->find("Nutricionista", $idNutricionista);
            $pacientes = $nutricionista->getPacientes();
            return $pacientes;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

     /**
     * Método de inserção do paciente
     *
     * @param pacienteVO $paciente
     */
    public function insert(pacienteVo $pacienteVo){
        require "app/bootstrap.php";        
        try{
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
            return true;
        }
        catch (Expection $e){
            return $e->getMessage();
        }
    }

    /**
     * Método de ediçao do paciente
     *
     * @param pacienteVO $paciente
     */
    public function update(pacienteVo $pacienteVo){
        require "app/bootstrap.php";
        try{                        
            $pacienteDAO = new pacienteDAO;
            $pacienteByCPF = new pacienteVo();
            $pacienteByCPF = $pacienteDAO->getByCPF($pacienteVo);

            $update = new Paciente;
            $update = $entityManager->find('Paciente',$pacienteByCPF->getId());

            $update->setCPF($pacienteVo->getCPF());
            $update->setNome($pacienteVo->getNome());
            $update->setSexo($pacienteVo->getSexo());
            $update->setTelefone($pacienteVo->getTelefone());
            $update->setEmail($pacienteVo->getEmail());           
            $update->setDataNasc(new \DateTime($pacienteVo->getDataNasc()." 00:00:00"));

            $entityManager->persist($update); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        } 

    }

    /**
     * Método de exclusao do paciente
     *
     * @param pacienteVO $paciente
     */
    public function delete(pacienteVo $pacienteVo){
        require "app/bootstrap.php";
        try{
            $pacienteDAO = new pacienteDAO(); 
            $pacienteByCPF = new pacienteVo();
            $pacienteByCPF = $pacienteDAO->getByCPF($pacienteVo);
                  
            $delete = new Paciente;
            $delete = $entityManager->find('Paciente',$pacienteByCPF->getId());
            $entityManager->remove($delete); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        }    

    }  
}
?>