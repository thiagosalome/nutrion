<?php
class DietaModel{
    public function create(DietaVo $dietaVo){
        if(empty( $dietaVo->getPaciente())or empty( $dietaVo->getData())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados do Item refeição", null);
        }
        else{
            $dietaDAO = new DietaDAO;
            $create = $dietaDAO->create($dietaVo);
            if(is_object($create)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Dieta cadastrada com sucesso", $insert_array);
            }
        }
    }
    public function update(DietaVo $dietaVo){

    }
    public function delete(DietaVo $dietaVo){
        $dietaDAO = new DietaDAO();        
        if(is_object($delete)){
            $delete = $dietaDAO->delete($dietaVo);
            return json::generate("OK", "200", "Dieta deletada com sucesso", null);
        }
        else{
            return json::generate("Conflito", "409", "Não é possível deletar uma dieta inexistente.", null);
        }
    }
    public function getAll(){
        
    }
}
?>