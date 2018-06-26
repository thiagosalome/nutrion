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
        
        if(empty($pacienteVo->getIdNutricionista())){
            return json::generate("Conflito", "409", "É necessário passar id do nutricionista (id_nutricionista) referente a esse paciente pelo corpo da requisição.", null);
        }
        else if (empty($pacienteVo->getNome()) or empty($pacienteVo->getEmail()) or empty($pacienteVo->getTelefone()) or empty($pacienteVo->getCPF()) or empty($pacienteVo->getSexo())  or empty($pacienteVo->getDataNasc())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados do paciente no corpo.", null);
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
                $insert = $pacienteDAO->insert($pacienteVo);
                
                if(is_object($insert)){
                    $insert_array = (array) $insert;
                    return json::generate("OK", "200", "Paciente cadastrado com sucesso", $insert_array);
                }
            }
        }
    }

    /**
     * Método para definir regras de negócio da edição do paciente
     *
     * @param pacienteVO $paciente
     */ 
    public function update(pacienteVo $pacienteVo){
        $data = explode("-",$pacienteVo->getDataNasc());
        
        if(empty($pacienteVo->getId())){
            return json::generate("Conflito", "409", "É necessário passar id do paciente por parâmetro.", null);
        }
        else if (empty($pacienteVo->getNome()) or empty($pacienteVo->getEmail()) or empty($pacienteVo->getTelefone()) or empty($pacienteVo->getCPF()) or empty($pacienteVo->getSexo())  or empty($pacienteVo->getDataNasc())) {
            return json::generate("Conflito", "409", "É necessário passar todos os dados do paciente no corpo.", null);
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
            $paciente = $pacienteDAO->getById($pacienteVo->getId()); 

            if(is_object($paciente)){
                $update = $pacienteDAO->update($pacienteVo);           
                $update_array = (array) $update;
                return json::generate("OK", "200", "Paciente alterado com sucesso", $update_array);
            }
            else{
                return json::generate("Conflito", "409", "Não é possível alterar um paciente inexistente.", null);
            }
        }
    }

    /**
     * Método para definir regras de negócio da exclusao do paciente
     *
     * @param pacienteVO $paciente
     */ 
    public function delete(pacienteVo $pacienteVo){
        if(empty($pacienteVo->getId())){
            return json::generate("Conflito", "409", "É necessário passar id do paciente por parâmetro.", null);
        }
        else{
            $pacienteDAO = new pacienteDAO();
            $paciente = $pacienteDAO->getById($pacienteVo->getId()); 

            if(is_object($paciente)){
                $delete = $pacienteDAO->delete($pacienteVo);
                return json::generate("OK", "200", "Paciente deletado com sucesso", null);
            }
            else{
                return json::generate("Conflito", "409", "Não é possível deletar um paciente inexistente.", null);
            }

        }
    }

    public function getAll($idNutricionista){
        $pacienteDAO = new pacienteDAO();
        $pacientes = $pacienteDAO->getAll($idNutricionista);
        $pacientesArray = array();
        $paciente = array();
        
        for($i = 0; $i < count($pacientes); $i++){
            $paciente["id"] = $pacientes[$i]->getId();
            $paciente["nome"] = $pacientes[$i]->getNome();
            $paciente["email"] = $pacientes[$i]->getEmail();
            $paciente["telefone"] = $pacientes[$i]->getTelefone();
            $paciente["cpf"] = $pacientes[$i]->getCpf();
            $paciente["sexo"] = $pacientes[$i]->getSexo();
            $paciente["nascimento"] = date_format($pacientes[$i]->getDataNasc(), "d/m/Y");
            $pacienteInfoFisicas = array();
            for($j = 0; $j < count($pacientes[$i]->getInfoFisicas()); $j++){
                $pacienteInfoFisicas[$j] = $pacientes[$i]->getInfoFisicas()[$j]->getId();
            }
            $paciente["informacoes_fisicas"] = $pacienteInfoFisicas;
            
            $pacienteDietas = array();
            for($j = 0; $j < count($pacientes[$i]->getDietas()); $j++){
                $pacienteDietas[$j] = $pacientes[$i]->getDietas()[$j]->getId();
            }
            $paciente["dietas"] = $pacienteDietas;

            $pacientesArray[$i] = $paciente;
        }
        return json::generate("OK", "200", "Pacientes deste nutricionista", $pacientesArray);
    }

    public function getById($id){
        $pacienteDAO = new pacienteDAO();
        $paciente = $pacienteDAO->getById($id);
        
        if($paciente != null){
            $pacienteArray = array();
            
            $pacienteArray["id"] = $paciente->getId();
            $pacienteArray["nome"] = $paciente->getNome();
            $pacienteArray["email"] = $paciente->getEmail();
            $pacienteArray["telefone"] = $paciente->getTelefone();
            $pacienteArray["cpf"] = $paciente->getCpf();
            $pacienteArray["sexo"] = $paciente->getSexo();
            $pacienteArray["nascimento"] = date_format($paciente->getDataNasc(), "d/m/Y");
            $pacienteArray["nutricionista"] = $paciente->getNutricionista()->getId();
            $pacienteInfoFisicas = array();
            for($i = 0; $i < count($paciente->getInfoFisicas()); $i++){
                $pacienteInfoFisicas[$i] = $paciente->getInfoFisicas()[$i]->getId();
            }
            $pacienteArray["informacoes_fisicas"] = $pacienteInfoFisicas;
            
            $pacienteDietas = array();
            for($i = 0; $i < count($paciente->getDietas()); $i++){
                $pacienteDietas[$i] = $paciente->getDietas()[$i]->getId();
            }
            $pacienteArray["dietas"] = $pacienteDietas;

            return json::generate("OK", "200", "Paciente encontrado", $pacienteArray);
        }
        else{
            return json::generate("OK", "200", "Paciente não encontrado", $paciente);
        }
    }
}
?>