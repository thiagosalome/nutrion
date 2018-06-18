<?php


class avaliacaoModel
{
    public function create(avaliacaoVo $avaliacaoVo)
    {
        $data = explode("-",$avaliacaoVo->getDataAval());
        
        if (empty($avaliacaoVo->getDataAval())) 
        {
            return json::generate("Conflito", "409", "A data está em branco", null);            
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time())
        {
            return json::generate("Conflito", "409", "A data digitada é inválida", null);  
        }
        else{
            $avaliacaoDAO = new avaliacaoDAO();
            $insert = $avaliacaoDAO->insert($avaliacaoVo);

            if(is_object($insert)){
                $insert_array = (array) $insert;
                return json::generate("OK", "200", "Avaliação cadastrada com sucesso", $insert_array);
            }
        } 
    }

    public function update($avaliacaoVo){
        $data = explode("-",$avaliacaoVo->getDataNasc());
        
        if (empty($avaliacaoVo->getData_aval())) 
        {
            return "A data está em branco";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time())
        {
            return "A data digitada é inválida."; 
        }

        else{
            $avaliacaoDAO = new avaliacaoDAO();                       
            $update = $avaliacaoDAO->update($avaliacaoVo);           
            if($update != true)
            {
                return "failed";
            }
            else{
                return "success";
            }
        }
    }

    public function delete($avaliacaoVo){
        $avaliacaoDAO = new avaliacaoDAO();        
        $delete = $avaliacaoDAO->delete($avaliacaoVo);           
        if($delete){            
            return json::generate("OK", "200", "Avaliação deletada com sucesso", null);
        }
        else{
            return json::generate("Conflito", "409", "Não é possível deletar uma avaliação inexistente.", null);
        }
    }
}
?>