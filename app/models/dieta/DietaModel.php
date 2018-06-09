<?php
class DietaModel{
    public function create(DietaVo $dietaVo){
        if(empty( $dietaVo->getPaciente())or empty( $dietaVo->getData())){
            return "Há campos vazios";
        }
        else{
            $dietaDAO = new DietaDAO;
            $create = $dietaDAO->create($dietaVo);
            if($create==true){
                return "Dieta cadastrada com sucesso";
            }
            else{
                return "Erro ao cadastrar dieta";
            }
        }
    }
    public function update(DietaVo $dietaVo){

    }
    public function delete(DietaVo $dietaVo){
        $dietaDAO = new DietaDAO();        
        $delete = $dietaDAO->delete($dietaVo);
        if($delete){
            return "success";
        }
        else{
            return "failed";
        }
    }
    public function getAll(){
        
    }
}
?>