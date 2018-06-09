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
                
            }
        }
    }
    public function update(){

    }
    public function delete(){

    }
    public function getAll(){
        
    }
}
?>