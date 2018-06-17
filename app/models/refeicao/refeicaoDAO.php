<?php
class refeicaoDAO{
    public function getAll($idDieta){
        require "app/bootstrap.php";
        $dieta = $entityManager->find("Dieta", $idDieta);
        $refeicoes = $dieta->getRefeicoes();
        return $refeicoes;
    }

    public function getById($idRefeicao){
        require "app/bootstrap.php";
        $refeicao = $entityManager->find("Refeicao", $idRefeicao);
        return $refeicao;
    }


    public function create(refeicaoVo $refeicaoVo){
        require "app/bootstrap.php";        
        $refeicao = new Refeicao;
        $dieta = $entityManager->find("Dieta", $refeicaoVo->getDieta());

        $refeicao->setNome($refeicaoVo->getNome());
        $refeicao->setHorario($refeicaoVo->getHorario());
        $refeicao->setDieta($dieta);
            
        $entityManager->persist($refeicao);           
        $entityManager->flush();
        return $refeicao;
    }

    public function update(refeicaoVo $refeicaoVo){
        require "app/bootstrap.php";
        $update = $entityManager->find('Refeicao', $refeicaoVo->getId());

        $update->setNome($refeicaoVo->getNome());
        $update->setHorario($refeicaoVo->getHorario());
        $update->setDieta($refeicaoVo->getDieta());

        $entityManager->persist($update); 
        $entityManager->flush();

        return $update;
    }

    public function delete(refeicaoVo $refeicaoVo){
        require "app/bootstrap.php";

        $delete = $entityManager->find('Refeicao', $refeicaoVo->getId());
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }
}
?>