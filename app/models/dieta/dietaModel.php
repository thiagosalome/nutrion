<?php
class DietaModel{
    public function create(DietaVo $dietaVo){
        if(empty( $dietaVo->getPaciente())or empty( $dietaVo->getData())){
            return json::generate("Conflito", "409", "É necessário passar o paciente referente a tal dieta,", null);
        }
        else{
            $dietaDAO = new DietaDAO;
            $create = $dietaDAO->insert($dietaVo);
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
        
        if(empty($dietaVo->getId())){
            return json::generate("Conflito", "409", "É necessário passar id da dieta por parâmetro.", null);
        }
        else{
            $dietaDAO = new DietaDAO();
            $dieta = $dietaDAO->getById($dietaVo->getId()); 

            if(is_object($dieta)){
                $delete = $dietaDAO->delete($dietaVo);
                return json::generate("OK", "200", "Dieta deletada com sucesso", null);
            }
            else{
                return json::generate("Conflito", "409", "Não é possível deletar uma dieta inexistente.", null);
            }

        }
    }

    public function getAll($idPaciente){
        $dietaDAO = new dietaDAO();
        $dietas = $dietaDAO->getAll($idPaciente);
        $dietasArray = array();
        $dieta = array();
        
        for($i = 0; $i < count($dietas); $i++){
            $dieta["id"] = $dietas[$i]->getId();
            $dieta["data"] = date_format($dietas[$i]->getdata(), "d/m/Y");
            $dietaRefeicoes = array();
            for($j = 0; $j < count($dietas[$i]->getRefeicoes()); $j++){
                $dietaRefeicoes[$j] = $dietas[$i]->getRefeicoes()[$j]->getId();
            }
            $dieta["refeicoes"] = $dietaRefeicoes;

            $dietasArray[$i] = $dieta;
        }
        return json::generate("OK", "200", "Dietas deste paciente", $dietasArray);
    }

    public function getById($id){
        $dietaDAO = new dietaDAO();
        $dieta = $dietaDAO->getById($id);
        if($dieta != null){
            $dietaArray = array();

            $dietaArray["id"] = $dieta->getId();
            $dietaArray["paciente"] = $dieta->getpaciente()->getId();
            $dietaArray["data"] = date_format($dieta->getdata(), "d/m/Y");
            $dietaRefeicoes = array();
            for($j = 0; $j < count($dieta->getRefeicoes()); $j++){
                $dietaRefeicoes[$j] = $dieta->getRefeicoes()[$j]->getId();
            }
            $dietaArray["refeicoes"] = $dietaRefeicoes;

            return json::generate("OK", "200", "Dieta encontrada", $dietaArray);
        }
        else{
            return json::generate("OK", "200", "Dieta não encontrada", $dieta);
        }
    }
}
?>