<?php

class pacienteModel{

    public function create(){

        $data = explode("/",$pacienteVo->getDataNasc());
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];

        if (empty($pacienteVo->getNome()) or empty($pacienteVo->getSexo() or empty($pacienteVo->getTelefone() or empty($pacienteVo->getDataNasc())))) {
            return "empty";
        }   
        else if(!preg_match('#^\(\d{2}\) (9|)[6789]\d{3}-\d{4}$#', $pacienteVo->getTelefone())){
            return "not_an_mobile_number";
        }
        else if(!checkdate( $mes , $dia , $ano ) || $ano < 1900 || mktime( 0, 0, 0, $mes, $dia, $ano ) > time()){
            return "invalid_date"; 
        }
        else{
            $pacienteDao = new pacienteDAO();
            $cadastro = $pacienteDao->insert($pacienteVo);

/*
            //add cpf no bd e pesquisar por ele
                                   
            $user = $pacienteDao->getByEmail($pacienteVo->getEmail());            
            
            // Verifica se usuário já existe
            if(is_object($user)){
                return "already_registered";
            }
            else if($user == null){
                $cadastro = $pacienteDao->insert($pacienteVo);

                if($cadastro == true){
                    return "success_signup";
                }
                else{
                    return "exception " . $user;
                }
            }
            else{
                return "exception " . $user;
            }
            */
        }
    }

    public function update(){
    }

    public function delete(){
    }
}

?>