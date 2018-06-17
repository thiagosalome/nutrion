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
        if(empty($dietaVo->getpaciente())or empty($dietaVo->getdata())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados para alterar a Dieta", null);
        }
        else{
            $dietaDAO = new DietaDAO();
            $update = $dietaDAO->update($dietaVo);
            if(is_object($update)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Dieta alterada com sucesso", $insert_array);
            }
        }
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

    public function getAll($idPaciente){
        $dietaDAO = new dietaDAO();
        $dietas = $dietaDAO->getAll($idPaciente);
        $dietas_array = array();
        $dieta = array();
        
        for($i = 0; $i < count($dietas); $i++){
            $dieta["id"] = $dietas[$i]->getId();
            $dieta["paciente"] = $dietas[$i]->getpaciente();
            $dieta["data"] = $dietas[$i]->getdata();

            $dietas_array[$i] = $dieta;
        }
        return json::generate("OK", "200", "Dietas deste paciente", $dietas_array);
    }

    public function getById($id){
        $dietaDAO = new dietaDAO();
        $dieta = $dietaDAO->getById($id);
        if($dieta != null){
            $dieta_array = (array) $dieta;
            return json::generate("OK", "200", "Dieta encontrada", $dieta_array);
        }
        else{
            return json::generate("OK", "200", "Dieta não encontrada", $dieta);
        }
    }
}
?>