<?php
class alimentoModel{

    public function create(alimentoVo $alimentoVo)
    {
        if (empty($alimentoVo->getId()) or empty($alimentoVo->getNome()) or empty($alimentoVo->getMedida()) or empty($alimentoVo->getTipoproteina()) or empty($alimentoVo->getProteina()) or empty($alimentoVo->getCarboidrato()) or empty($alimentoVo->getGordura()) or empty($alimentoVo->getCaloria())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados do alimento", null);
        }
        else{
            $alimentoDAO = new alimentoDAO();  
            $insert = $alimentoDAO->insert($alimentoVo);

            if(is_object($insert)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Alimento cadastrado com successo", $insert_array);
            }
        }
    }

    public function update(alimentoVo $alimentoVo){
        if (empty($alimentoVo->getNome()) or empty($alimentoVo->getMedida()) or empty($alimentoVo->getTipoproteina()) or empty($alimentoVo->getProteina()) or empty($alimentoVo->getCarboidrato()) or empty($alimentoVo->getGordura()) or empty($alimentoVo->getCaloria())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados do alimento", null);
        }
        else{
            $alimentoDAO = new alimentoDAO();                       
            $update = $alimentoDAO->update($alimentoVo);           
            
            if(is_object($update)){
                $update_array = (array) $update;
                return json::generate("OK", "200", "Alimento alterado com successo", $update_array);
            }
        }
    }

    public function delete(alimentoVo $alimentoVo){
        $alimentoDAO = new alimentoDAO();        
        $delete = $alimentoDAO->delete($alimentoVo);
        return json::generate("OK", "200", "Alimento deletado com successo", null);
    }

    public function getAll(){
        $alimentoDAO = new alimentoDAO();
        $alimentos = $alimentoDAO->getAll();
        $alimentos_array = array();
        $alimento = array();
        
        for($i = 0; $i < count($alimentos); $i++){
            $alimento["id"] = $alimentos[$i]->getId();
            $alimento["nome"] = $alimentos[$i]->getNome();
            $alimento["medida"] = $alimentos[$i]->getMedida();
            $alimento["tipoproteina"] = $alimentos[$i]->getTipoproteina();
            $alimento["proteina"] = $alimentos[$i]->getProteina();
            $alimento["carboidrato"] = $alimentos[$i]->getCarboidrato();
            $alimento["gordura"] = $alimentos[$i]->getGordura();
            $alimento["caloria"] = $alimentos[$i]->getCaloria();

            $alimentos_array[$i] = $alimento;
        }
        return json::generate("OK", "200", "Alimentos encontrados", $alimentos_array);
    }

    public function getById($id){
        $alimentoDAO = new alimentoDAO();
        $alimento = $alimentoDAO->getById($id);
        if($alimento != null){
            $alimento_array = (array) $alimento;
            return json::generate("OK", "200", "Alimento encontrado", $alimento_array);
        }
        else{
            return json::generate("OK", "200", "Alimento não encontrado", $alimento);
        }
    }
}
?>