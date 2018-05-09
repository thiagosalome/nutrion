<?php
class pacienteModel{
/*
    public function search($query){
        $pacienteDAO = new pacienteDAO();        
        $search = $pacienteDAO->search($query);
    }
*/

    /**
     * Método para definir regras de negócio da criação do paciente
     *
     * @param pacienteVO $paciente
     */ 
    public function create(pacienteVo $pacienteVo){

        $data = explode("-",$pacienteVo->getDataNasc());
        
        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo() or empty($pacienteVo->getTelefone() or empty($pacienteVo->getDataNasc())))) {
            return "Há campos vazios";
        }
        else if(!$this->validateCPF($pacienteVo->getCPF())){
            return "CPF inválido";
        } 
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres";
        }   
        else if(!preg_match('/^\(?[0-9]{2}\)?\s?9?[0-9]{4}\-?[0-9]{4}$/', $pacienteVo->getTelefone())){
            return "O número de telefone é inválido";
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return "O email digitado é inválido";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return "Data de nascimento inválida"; 
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
           
            if(is_object($paciente)){
                return "O paciente já foi cadastrado antes";
            }
            else if($paciente == null){
                $cadastro = $pacienteDAO->insert($pacienteVo);
                if($cadastro == true){
                    return "success_create_patient";
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

    /**
     * Método para definir regras de negócio da edição do paciente
     *
     * @param pacienteVO $paciente
     */ 
    public function update($pacienteVo){
        $data = explode("-",$pacienteVo->getDataNasc());
        
        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo() or empty($pacienteVo->getTelefone() or empty($pacienteVo->getDataNasc())))) {
            return "Há campos vazios";
        }
        else if(!$this->validateCPF($pacienteVo->getCPF())){
            return "CPF inválido";
        }         
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return "O nome deve ter entre 2 e 40 caracteres";
        }   
        else if(!preg_match('/^\(?[0-9]{2}\)?\s?9?[0-9]{4}\-?[0-9]{4}$/', $pacienteVo->getTelefone())){
            return "O número de telefone está inválido";
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return "O email digitado é inválido";
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return "A data digitada é inválida"; 
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
           
            /*if(is_object($paciente)){
                return "O paciente já cadastrado anteriormente";
            }
            else{*/

                $update = $pacienteDAO->update($pacienteVo);           
                if($update == true){
                    return "success_update_patient";
                }
                else{
                    return "exception " . $update ;
                }

            // }
        }
    }

    /**
     * Método para definir regras de negócio da exclusao do paciente
     *
     * @param pacienteVO $paciente
     */ 
    public function delete($pacienteVo){
        $pacienteDAO = new pacienteDAO();        
        $delete = $pacienteDAO->delete($pacienteVo);

        if($delete){
            return "success_delete_patient";
        }
        else{
            return "exception " . $delete;
        }
    }

    public function validateCPF($cpf) {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    public function getAllPatients($idNutricionista){
        $pacienteDAO = new pacienteDAO();
        $pacientes = $pacienteDAO->getAllPatients($idNutricionista);
        return $pacientes;
    }

    public function getPatientById($idPaciente){
        $pacienteDAO = new pacienteDAO();
        $paciente = $pacienteDAO->getPatientById($idPaciente);
        return $paciente;
    }
}
?>