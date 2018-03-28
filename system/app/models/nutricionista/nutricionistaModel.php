<?php

/*
    Passos:
        Criar classe nutricionistaModel
        
        Criar método insertModel que recebe nutricionistaVo como parâmetro
            Criar instância nutricionistaDAO
            Criar regras de negócio (restrições, validações, condições, exceções)
            Retornar método insert do objeto $nutricionistadao

        Criar método getByIdModel que recebe uma variável $id como parâmetro
            Criar instância nutricionistaDAO
            Criar uma variável $nutricionista que recebe o método getById do objeto da classe nutricionistaDAO
            Retornar a variável $nutricionista

        Criar método deleteModel que recebe nutricionistaVo como parâmetro
            Criar instância nutricionistaDAO
            Retornar método delete do objeto $nutricionistadao
        
        Criar método updateModel que recebe nutricionistaVo como parâmetro
            Criar instância nutricionistaDAO
            Retornar método update do objeto $nutricionistadao
        
        Criar método getAllModel
            Criar instância nutricionistaDAO
            Retornar método getAll do objeto $nutricionistadao

*/

class nutricionistaModel{

    /**
     * Método para definir regras de negócio no select e chamar método getById da classe nutricionistaDAO
     *
     * @param [type] $id
     * @return void
     */
    public function getByIdModel($id){
        $nutricionistaDao = new nutricionistaDAO;

        $nutricionista = $nutricionistaDao->getById($id);
        return $nutricionista;
    }

    /**
     * Método para definir regras de negócio na edição e chamar método update da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function updateModel(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO;

        if($nutricionista->getNome() == '' || $nutricionista->getEmail == '' || $nutricionista->getSenha == ''){
            return false;
        }
        else{
            return $nutricionistaDao->update($nutricionista);
        }
    }

    /**
     * Método para definir regras de negócio na exclusão e chamar método delete da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    public function deleteModel(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO;

        return $nutricionistaDao->delete($nutricionista);
    }

    /**
     * Método para definir regras de negócio no select e chamar método getAll da classe nutricionistaDAO
     *
     * @return void
     */
    public function getAllModel(){
        $nutricionistaDao = new nutricionistaDAO;

        return $nutricionistaDao->getAll();
    }

    public function logarModel(nutricionistaVO $nutricionistaVo){
        $nutricionistaDao = new nutricionistaDAO();
        
        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha())) {
            return 2;
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return 3;
        }
        else{
            $login = $nutricionistaDao->verifyUserLog($nutricionistaVo->getEmail(), $nutricionistaVo->getSenha());
            
            // Se encontrou usuário
            if($login == true){
                return 1;
            }
            // Se não encontrou usuário
            else{  
                return 0;
            }
        }   
    }

    public function insertModel(nutricionistaVo $nutricionistaVo){
        $nutricionistaDao = new nutricionistaDAO();

        if (empty($nutricionistaVo->getEmail()) or empty($nutricionistaVo->getSenha() or empty($nutricionistaVo->getNome()))) {
            return 2;
        }   
        else if(!preg_match("/^[a-z0-9\\.\\-\\_]+@[a-z0-9\\.\\-\\_]*[a-z0-9\\.\\-\\_]+\\.[a-z]{2,4}$/", $nutricionistaVo->getEmail())){
            return 3;
        }
        else if(!preg_match("/^[a-zA-Z\s]{2,40}+$/", $nutricionistaVo->getNome())){
            return 4;  
        }  
        else {
            $verify_cad = $nutricionistaDao->verifyUserCad($nutricionistaVo->getEmail());

            if($verify_cad == true){
                return 5;
            }
            else{
                $cadastro = $nutricionistaDao->insert($nutricionistaVo);
                // Se cadastrou usuário
                if($cadastro == true){
                    return 1;
                }
                // Se não cadastrou usuário
                else{  
                    return 0;
                }
            }
        }
    }
}
?>