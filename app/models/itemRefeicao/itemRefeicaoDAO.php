<?php
class itemRefeicaoDAO{
    public function insert(itemRefeicaoVo $itemRefeicaoVo){
        require "app/bootstrap.php";
        $itemRefeicao = new itemRefeicao;

        $refeicao = $entityManager->find("Refeicao", $itemRefeicaoVo->getRefeicao());
        $alimento = $entityManager->find("Alimento", $itemRefeicaoVo->getAlimento());

        // $itemRefeicao->setRefeicao($refeicao);      
        // $itemRefeicao->setAlimento($alimento);
        $itemRefeicao->setRefeicao($itemRefeicaoVo->getRefeicao());      
        $itemRefeicao->setAlimento($itemRefeicaoVo->getAlimento());
        $itemRefeicao->setQuantidade($itemRefeicaoVo->getQuantidade());
            
        $entityManager->persist($itemRefeicao);           
        $entityManager->flush();
        return $itemRefeicao;
    }

    public function update(itemRefeicaoVo $itemRefeicaoVo){
        require "app/bootstrap.php";
        $itemRefeicaoDAO = new itemRefeicaoDAO;
        $itemRefeicao = new itemRefeicaoVo();
        $itemRefeicao = $itemRefeicaoDAO->getId($itemRefeicaoVo);

        $update = new itemRefeicao;
        $update = $entityManager->find('itemRefeicao',$itemRefeicao->getId());

        $update->setId($itemRefeicaoVo->getId());      
        $update->setAlimento($itemRefeicaoVo->getAlimento());
        $update->setQuantidade($itemRefeicaoVo->getQuantidade());

        $entityManager->persist($update); 
        $entityManager->flush();
        return $itemRefeicao;
    }

    public function delete(itemRefeicaoVo $itemRefeicaoVo){
        require "app/bootstrap.php";
        $itemRefeicaoDAO = new itemRefeicaoDAO(); 
        $itemRefeicao = new itemRefeicaoVo();
        $itemRefeicao = $itemRefeicaoDAO->getId($itemRefeicaoVo);
                
        $delete = new itemRefeicao;
        $delete = $entityManager->find('itemRefeicao',$itemRefeicao->getId());
        $entityManager->remove($delete); 
        $entityManager->flush();
        return true;
    }
    public function getAll(){
        require "app/bootstrap.php";
        $itemRefeicao = $entityManager->getRepository("ItemRefeicao")->findAll();
        return $itemRefeicao;
    }
}
?>