<?php

class avaliacaoDAO{

    /*public function search($query)
    {
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
    }*/

    public function insert(avaliacaoVo $avaliacaoVo){
        require "app/bootstrap.php";
        
        $avaliacao = new Avaliacao;
        $infoFisica = $entityManager->find("InfoFisicas", $avaliacaoVo->getInfoFisicas());

        $avaliacao->setInfoFisicas($infoFisica);      
        $avaliacao->setDataAval(new \DateTime($avaliacaoVo->getDataAval()." 00:00:00"));
            
        $entityManager->persist($avaliacao);           
        $entityManager->flush();
        return $avaliacao;
    }

    public function update(avaliacaoVo $avaliacaoVo){
        require "app/bootstrap.php";
        try{                        
            $avaliacaoDAO = new avaliacaoDAO;
            $avaliacaoId = new avaliacaoVo();
            $avaliacaoId = $avaliacaoDAO->getId($avaliacaoVo);

            $update = new Avaliacao;
            $update = $entityManager->find('Avaliacao',$avaliacaoId->getId());

            $update->setId($avaliacaoVo->getId());        
            $update->setData_aval(new \DateTime($avaliacaoVo->getData_aval()." 00:00:00"));

            $entityManager->persist($update); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        } 

    }

    public function delete(avaliacaoVo $avaliacaoVo){
        require "app/bootstrap.php";
        try{
            $avaliacaoDAO = new avaliacaoDAO(); 
            $avaliacaoId = new avaliacaoVo();
            $avaliacaoId = $avaliacaoDAO->getId($avaliacaoVo);
                  
            $delete = new Avaliacao;
            $delete = $entityManager->find('Avaliacao',$avaliacaoId->getId());
            $entityManager->remove($delete); 
            $entityManager->flush();
            return true;
        }
        catch (Expection $e){
            return false;
        }    

    }

    public function getId($id){
        require "app/bootstrap.php";        
        try{
            $avaliacao = $entityManager->getRepository("Avaliacao")->findOneBy(array("Id" => $id));            
            return $avaliacao;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>