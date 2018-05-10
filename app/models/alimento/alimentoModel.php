<?php
class alimentoModel{

    public function create(alimentoVo $alimento){
        
    }

    public function update(alimentoVo $alimentoVo){
    /*  PRECISA TESTAR     
        if (empty($alimentoVo->getNome()) or empty($alimentoVo->getProteina() or empty($alimentoVo->getCarboidrato() or empty($alimentoVo->getGordura() or empty($alimentoVo->getCaloria()))))) {
            return "Há campos vazios";
        }
        else{
            $alimentoDAO = new alimentoDAO();                       
            //$alimento = $alimentoDAO->getByNome($alimentoVo->getNome());            
            
            $update = $alimentoDAO->update($alimentoVo);           
            if($update == true){
                return "success_update_food";
            }
            else{
                return "exception " . $update ;
            }
        }
    */
    }

    public function delete(alimentoVo $alimentoVo){
    /*  PRECISA TESTAR    
        $alimentoDAO = new alimentoDAO();        
        $delete = $alimentoDAO->delete($alimentoVo);

        if($delete){
            return "success_delete_patient";
        }
        else{
            return "exception " . $delete;
        }
    */
    }
}
?>