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
        
        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo()) or empty($pacienteVo->getTelefone()) or empty($pacienteVo->getDataNasc())) {
            return json::generate("Conflito", "409", "Há campos vazios", null);
        }
        else if(!$this->validateCPF($pacienteVo->getCPF())){
            return json::generate("Conflito", "409", "CPF inválido", null);
        } 
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return json::generate("Conflito", "409", "O nome deve ter entre 2 e 40 caracteres", null);
        }   
        else if(!preg_match('/^\(?[0-9]{2}\)?\s?9?[0-9]{4}\-?[0-9]{4}$/', $pacienteVo->getTelefone())){
            return json::generate("Conflito", "409", "O número de telefone é inválido", null);
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return json::generate("Conflito", "409", "O email digitado é inválido", null);
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return json::generate("Conflito", "409", "Data de nascimento inválida", null);
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
           
            if(is_object($paciente)){
                return json::generate("Conflito", "409", "O paciente já foi cadastrado antes", null);
            }
            else if($paciente == null){
                $cadastro = $pacienteDAO->insert($pacienteVo);
                $cadastro_array = (array) $cadastro;
                return json::generate("OK", "200", "Paciente cadastrado com successo", $cadastro_array);

                /*if($cadastro == true){
                    return "success_create_patient";
                }
                else{
                    return "exception " . $paciente;
                }*/
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
            return json::generate("Conflito", "409", "Há campos vazios", null);
        }
        else if(!$this->validateCPF($pacienteVo->getCPF())){
            return json::generate("Conflito", "409", "CPF inválido", null);
        }         
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $pacienteVo->getNome())){
            return json::generate("Conflito", "409", "O nome deve ter entre 2 e 40 caracteres", null);
        }   
        else if(!preg_match('/^\(?[0-9]{2}\)?\s?9?[0-9]{4}\-?[0-9]{4}$/', $pacienteVo->getTelefone())){
            return json::generate("Conflito", "409", "O número de telefone é inválido", null);
        }         
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $pacienteVo->getEmail())){
            return json::generate("Conflito", "409", "O email digitado é inválido", null);
        }
        else if(!checkdate( $data[1] , $data[2] , $data[0] ) || $data[0] < 1900 || mktime( 0, 0, 0, $data[1], $data[2], $data[0] ) > time()){
            return json::generate("Conflito", "409", "Data de nascimento inválida", null);
        }
        else{
            $pacienteDAO = new pacienteDAO();                       
            $paciente = $pacienteDAO->getByCPF($pacienteVo->getCPF());            
           
            /*if(is_object($paciente)){
                return "O paciente já cadastrado anteriormente";
            }
            else{*/

                $update = $pacienteDAO->update($pacienteVo);           
                $update_array = (array) $update;
                return json::generate("OK", "200", "Paciente alterado com successo", $update_array);

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
            // return "success_delete_patient";
            return json::generate("OK", "200", "Paciente deletado com successo", null);
        }
        else{
            // return "exception " . $delete;
            $exception = "Exceção : " . $delete;
            return json::generate("Erro", "400", $exception, null);
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