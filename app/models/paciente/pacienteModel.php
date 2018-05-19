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
            return json::generate("Conflito", "409", "É necessário passar todos os dados do paciente", null);
        }
        else if(!cpf::validate($pacienteVo->getCPF())){
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
                
                if(is_object($cadastro)){
                    $cadastro_array = (array) $cadastro;
                    return json::generate("OK", "200", "Paciente cadastrado com successo", $cadastro_array);
                }
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
            return json::generate("Conflito", "409", "É necessário passar todos os dados do paciente", null);
        }
        else if(!cpf::validate($pacienteVo->getCPF())){
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
            
            $update = $pacienteDAO->update($pacienteVo);           
            $update_array = (array) $update;
            return json::generate("OK", "200", "Paciente alterado com successo", $update_array);
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
        return json::generate("OK", "200", "Paciente deletado com successo", null);
    }

    public function getAll($idNutricionista){
        $pacienteDAO = new pacienteDAO();
        $pacientes = $pacienteDAO->getAll($idNutricionista);
        $pacientes_array = array();
        $paciente = array();
        
        for($i = 0; $i < count($pacientes); $i++){
            $paciente["id"] = $pacientes[$i]->getId();
            $paciente["cpf"] = $pacientes[$i]->getCpf();
            $paciente["nome"] = $pacientes[$i]->getNome();
            $paciente["telefone"] = $pacientes[$i]->getTelefone();
            $paciente["sexo"] = $pacientes[$i]->getSexo();
            $paciente["dataNasc"] = $pacientes[$i]->getDataNasc();

            $pacientes_array[$i] = $paciente;
        }
        return json::generate("OK", "200", "Pacientes deste nutricionista", $pacientes_array);
    }

    public function getById($id){
        $pacienteDAO = new pacienteDAO();
        $paciente = $pacienteDAO->getById($id);
        if($paciente != null){
            $paciente_array = (array) $paciente;
            return json::generate("OK", "200", "Paciente encontrado", $paciente_array);
        }
        else{
            return json::generate("OK", "200", "Paciente não encontrado", $paciente);
        }
    }
}
?>