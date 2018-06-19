<?php
class itemRefeicaoModel{
    public function create(itemRefeicaoVo $itemRefeicaoVo){
        if(empty( $itemRefeicaoVo->getAlimento())or empty( $itemRefeicaoVo->getQuantidade())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados do Item refeição", null);
        }
        if( ($itemRefeicaoVo->getQuantidade()) <= 0){
            return json::generate("Conflito", "409", "É necessário inserir uma quantidade válida, acima de 0", null);
        }
        else{
            $itemRefeicaoDAO = new  itemRefeicaoDAO;
            $create = $itemRefeicaoDAO->insert($itemRefeicaoVo);
            if(is_object($create)){
                $insert_array = (array) $create;
                return json::generate("OK", "200", "Item refeição cadastrado com sucesso", $insert_array);
            }
        }
    }
    public function update(itemRefeicaoVo $itemRefeicaoVo){
        if(empty( $itemRefeicaoVo->getAlimento())or empty( $itemRefeicaoVo->getQuantidade())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados do item refeição", null);
        }
        if( ($itemRefeicaoVo->getQuantidade())>0){
            return json::generate("Conflito", "409", "É necessário inserir uma quantidade válida, acima de 0", null);
        }
        else{
            $itemRefeicao = new itemRefeicao();                       
            $update = $itemRefeicao->update($itemRefeicaoVo);            
            if(is_object($update)){
                $update = $itemRefeicaoDAO->update($itemRefeicaoVo);           
                $update_array = (array) $update;
                return json::generate("OK", "200", "Item refeição alterado com sucesso", $update_array);
            }
            else{
                return json::generate("Conflito", "409", "Não é possível alterar um item refeição inexistente.", null);
            }
        }
    }
    public function delete(itemRefeicaoVo $itemRefeicaoVo){
        $itemRefeicaoDAO = new itemRefeicaoDAO();
        $delete = $itemRefeicaoDAO->delete($itemRefeicaoVo);            
        if($delete){            
            return json::generate("OK", "200", "Item refeição deletado com sucesso", null);
        }
        else{
            return json::generate("Conflito", "409", "Não é possível deletar um item refeição inexistente.", null);
        }
    }
    public function getAll(){        
        $itemRefeicaoDAO = new itemRefeicaoDAO();
        $itensRefeicao = $itemRefeicaoDAO->getAll();
        $itensRefeicao_array = array();
        $itemRefeicao = array();
        
        for($i = 0; $i < count($itensRefeicao); $i++){
            $itemRefeicao["id"] = $itensRefeicao[$i]->getId();
            $itemRefeicao["alimento"] = $itensRefeicao[$i]->getAlimento();
            $itemRefeicao["quantidade"] = $itensRefeicao[$i]->getQuantidade();

            $itensRefeicao_array[$i] = $itemRefeicao;
        }
        return json::generate("OK", "200", "Itens refeição encontrados", $itemRefeicaos_array);
        }       
    }
?>