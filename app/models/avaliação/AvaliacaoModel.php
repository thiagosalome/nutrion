<?php
class avaliacaoModel
{

    public function search($query)
    {
        $avaliacaoDAO = new avaliacaoDAO();        
        $search = $avaliacaoDAO->search($query);
    }

    public function create(avaliacaoVo $avaliacaoVo)
    {

        $data = explode("-",$avaliacaoVo->getData_aval());
        
        if (empty($avaliacaoVo->getData_aval())) 
        {
            return "A data está em branco";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time())
        {
            return "A data digitada é inválida."; 
        }
        
        else{
                $cadastro = $avaliacaoDAO->insert($avaliacaoVo);

                if($cadastro == true)
                {
                    return "success";
                }
                else
                {
                    return "exception ";
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
            return "success";
        }
        else{
            return "failed";
        }
    }
}
?>