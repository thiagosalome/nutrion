<?php
class refeicaoModel{
    public function create(refeicaoVo $refeicaoVo){
        if(empty($refeicaoVo->getNome())or empty($refeicaoVo->getHorario()) or empty($refeicaoVo->getDieta())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados de Refeição", null);
        }
        else{
            $refeicaoDAO = new refeicaoDAO;
            $create = $refeicaoDAO->create($refeicaoVo);
            if(is_object($create)){
                $insert_array = (array) $create;
                return json::generate("OK", "200", "Refeição cadastrada com sucesso", $insert_array);
            }
        }
    }
    public function update(refeicaoVo $refeicaoVo){
        if(empty($refeicaoVo->getId())or empty($refeicaoVo->getNome()) or empty($refeicaoVo->getHorario()) or empty($refeicaoVo->getDieta())){
            return json::generate("Conflito", "409", "É necessário passar todos os dados de Refeição", null);
        }
        else{
            $refeicaoDAO = new refeicaoDAO;
            $update = $refeicaoDAO->update($refeicaoVo);
            if(is_object($update)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Refeição alterada com sucesso", $insert_array);
            }
        }
    }

    public function delete(refeicaoVo $refeicaoVo){
        if(empty($refeicaoVo->getId())){
            return json::generate("Conflito", "409", "É necessário passar id da refeição por parâmetro.", null);
        }
        else 
        {
            $refeicaoDAO = new refeicaoDAO();
            $paciente = $refeicaoDAO->getById($refeicaoVo->getId());  

            if(is_object($paciente)){
                $delete = $dietaDAO->delete($dietaVo);
                return json::generate("OK", "200", "Refeição deletada com sucesso", null);
            }
            else{
                return json::generate("Conflito", "409", "Não é possível deletar uma refeição inexistente.", null);
            }
        }
    }

    public function getAll($idDieta){
        $refeicaoDAO = new refeicaoDAO();
        $refeicoes = $refeicaoDAO->getAll($idDieta);
        $refeicoes_array = array();
        $refeicao = array();
        
        for($i = 0; $i < count($refeicoes); $i++){
            $refeicao["id"] = $refeicoes[$i]->getId();
            $refeicao["nome"] = $refeicoes[$i]->getNome();
            $refeicao["horario"] = $refeicoes[$i]->getHorario();
            $refeicao["dieta"] = $refeicoes[$i]->getDieta();

            $refeicoes_array[$i] = $refeicao;
        }
        return json::generate("OK", "200", "Refeições deste paciente", $refeicoes_array);
    }

    public function getById($id){
        $refeicaoDAO = new refeicaoDAO();
        $refeicao = $refeicaoDAO->getById($id);
        if($refeicao != null){
            $refeicao_array = (array) $refeicao;
            return json::generate("OK", "200", "Refeição encontrada", $refeicao_array);
        }
        else{
            return json::generate("OK", "200", "Refeição não encontrada", $refeicao);
        }
    }
}
?>