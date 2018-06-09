<?php
class itemRefeicaoModel{
    public function create(itemRefeicaoVo $itemRefeicaoVo){
        if(empty( $itemRefeicaoVo->getAlimento())or empty( $itemRefeicaoVo->getQuantidade())){
            return "Há campos vazios";
        }
        if( ($itemRefeicaoVo->getQuantidade())>0){
            return "Insira uma quantidade válida, acima de 0";
        }
        else{
            $itemRefeicaoDAO = new  itemRefeicaoDAO;
            $create = $itemRefeicaoDAO->create( $itemRefeicaoVo);
            if($create==true){
                return "Item cadastrado com sucesso";
            }
            else{
                return "Erro ao criar o item";
            }
        }
    }
    public function update(itemRefeicaoVo $itemRefeicaoVo){
        if(empty( $itemRefeicaoVo->getAlimento())or empty( $itemRefeicaoVo->getQuantidade())){
            return "Há campos vazios";
        }
        if( ($itemRefeicaoVo->getQuantidade())>0){
            return "Insira uma quantidade válida, acima de 0";
        }
        else{
            $itemRefeicao = new itemRefeicao();                       
            $update = $itemRefeicao->update($itemRefeicaoVo);           
            if($update != true)
            {
                return "failed";
            }
            else{
                return "success";
            }
        }
    }
    public function delete(itemRefeicaoVo $itemRefeicaoVo){
        $itemRefeicaoDAO = new itemRefeicaoDAO();        
        $delete = $itemRefeicaoDAO->delete($itemRefeicaoVo);
        if($delete){
            return "success";
        }
        else{
            return "failed";
        }
    }
}
?>