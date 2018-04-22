<?php
class pacienteModel{

    public function search($query){
        $pacienteDAO = new pacienteDAO();        
        $search = $pacienteDAO->search($query);
    }

    public function create(pacienteVo $pacienteVo){

        $data = explode("-",$pacienteVo->getDataNasc());
        
        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo() or empty($pacienteVo->getTelefone() or empty($pacienteVo->getDataNasc())))) {
            return "Há campos vazios.";
        }
        else if(strlen($pacienteVo->getCPF()) != 11 ||$pacienteVo->getCPF() == '00000000000' ){
            return "invalid_CPF";
        } 
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres.";
        }   
        else if(!preg_match('#^\(\d{2}\) (9|)[6789]\d{3}-\d{4}$#', $pacienteVo->getTelefone())){
            return "O número de telefone está inválido";
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return "O email digitado é inválido.";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return "A data digitada é inválida."; 
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
           
            if(is_object($paciente)){
                return "O paciente já foi cadastrado antes.";
            }
            else if($paciente == null){
                $cadastro = $pacienteDAO->insert($pacienteVo);

                if($cadastro == true){
                    return "success";
                }
                else{
                    return "exception " . $paciente;
                }
            }
            else{
                return "exception " . $paciente;
            }
        }
    }

    public function update($pacienteVo){
        $data = explode("-",$pacienteVo->getDataNasc());
        
        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo() or empty($pacienteVo->getTelefone() or empty($pacienteVo->getDataNasc())))) {
            return "empty";
        }
        else if(strlen($pacienteVo->getCPF()) != 11 ||$pacienteVo->getCPF() == '00000000000' ){
            return "invalid_CPF";
        }         
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return "invalid_name";
        }   
        else if(!preg_match('#^\(\d{2}\) (9|)[6789]\d{3}-\d{4}$#', $pacienteVo->getTelefone())){
            return "not_an_mobile_number";
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return "not_an_email";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return "invalid_date"; 
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $update = $pacienteDAO->update($pacienteVo);           
            if($update != true){
                return "failed";
            }
            else{
                return "success";
            }
        }
    }

    public function delete($pacienteVo){
        $pacienteDAO = new pacienteDAO();        
        $delete = $pacienteDAO->delete($pacienteVo);
        if($delete){
            return "success";
        }
        else{
            return "failed";
        }
    }
}
?>