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
//include "app/models/nutricionista/nutricionistaDAO.php";
//include "app/models/nutricionista/nutricionistaVo.php";

class nutricionistaModel{

    /**
     * Método para definir regras de negócio na inserção e chamar método insert da classe nutricionistaDAO
     *
     * @param nutricionistaVO $nutricionista
     * @return void
     */
    /*

    public function insertModel(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO;

        if($nutricionista->getNome() == '' || $nutricionista->getTipo() == '' || $nutricionista->getEmail == '' || $nutricionista->getSenha == ''){
            return false;
        }
        else{
            return $nutricionistaDao->insert($nutricionista);
        }
    }
*/
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

    /*public function validaCamposPreenchidosLogin(nutricionistaVO $nutricionista){
        if (empty($nutricionista->getEmail())or empty($nutricionista->getSenha())) {
            return false;
        }
    }*/

    public function logar(nutricionistaVO $nutricionista){
        $nutricionistaDao = new nutricionistaDAO();
        
        if (empty($nutricionista->getEmail()) or empty($nutricionista->getSenha())) {
            return false;//campo não preenchido, como mandar mensagem?
        }        
        else{
            /*$senhaBD = $nutricionistaDao->GetSenhaByEmail($nutricionista->getEmail(),$nutricionista->getSenha());

            if (!is_null($senhaBD)) {
                if ($nutricionista->getSenha()==$senhaBD) {
                    return true;               
                }
            }
            return false;*/
            
            $row = $nutricionistaDao->GetSenhaByEmail($nutricionista->getEmail(), $nutricionista->getSenha());
            // Se encontrou usuário
            if($row > 0){
                return true;
            }
            // Se não encontrou usuário
            else{
                return false;
            }
        }   
    }
}
?>