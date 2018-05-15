<?php
class alimentoModel{

    public function create(alimentoVo $alimentoVo)
    {
        if (empty($alimentoVo->getNome()) or empty($alimentoVo->getMedida()) or empty($alimentoVo->getTipoproteina()) or empty($alimentoVo->getProteina()) or empty($alimentoVo->getCarboidrato()) or empty($alimentoVo->getGordura()) or empty($alimentoVo->getCaloria())) {
            return "Há campos vazios";
        }
        else{
            $alimentoDAO = new alimentoDAO();  
            $insert = $alimentoDAO->insert($alimentoVo);

            if($insert){
                return "success_create_aliment";
            }
            else{
                return "exception " . $insert;
            }
        }
        
    }

    public function update(alimentoVo $alimentoVo){
        if (empty($alimentoVo->getNome()) or empty($alimentoVo->getMedida()) or empty($alimentoVo->getTipoproteina()) or empty($alimentoVo->getProteina()) or empty($alimentoVo->getCarboidrato()) or empty($alimentoVo->getGordura()) or empty($alimentoVo->getCaloria())) {
            return "Há campos vazios";
        }
        else{
            $alimentoDAO = new alimentoDAO();                       
            $update = $alimentoDAO->update($alimentoVo);           
            
            if($update == true){
                return "success_update_aliment";
            }
            else{
                return "exception " . $update ;
            }
        }
    }

    public function delete(alimentoVo $alimentoVo){
        $alimentoDAO = new alimentoDAO();        
        $delete = $alimentoDAO->delete($alimentoVo);

        if($delete){
            return "success_delete_aliment";
        }
        else{
            return "exception " . $delete;
        }
    }

    public function getAllAliments(){
        $alimentoDAO = new alimentoDAO();
        $alimentos = $alimentoDAO->getAllAliments();
        return $alimentos;
    }
}
?>