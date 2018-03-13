<?php

/*
    Passos:
        Criar classe UsuarioModel
        
        Criar método insert que recebe UsuarioVo como parâmetro
            Criar instância UsuarioDAO
            Criar regras de negócio (restrições, validações, condições, exceções)
            Retornar método insert do objeto $usuariodao

        Criar método getById que recebe uma variável $id como parâmetro
            Criar instância UsuarioDAO
            Criar uma variável $usuario que recebe o método getById do objeto da classe UsuarioDAO
            Retornar a variável $usuario

        Criar método delete que recebe UsuarioVo como parâmetro
            Criar instância UsuarioDAO
            Retornar método delete do objeto $usuariodao
        
        Criar método update que recebe UsuarioVo como parâmetro
            Criar instância UsuarioDAO
            Retornar método update do objeto $usuariodao
        
        Criar método getAll
            Criar instância UsuarioDAO
            Retornar método getAll do objeto $usuariodao

*/

class UsuarioModel{

    /**
     * Método para definir regras de negócio na inserção e chamar método insert da classe UsuarioDAO
     *
     * @param UsuarioVO $usuario
     * @return void
     */
    public function insert(UsuarioVO $usuario){
        $usuarioDao = new UsuarioDAO;

        if($usuario->getNome() == '' || $usuario->getTipo() == '' || $usuario->getEmail == '' || $usuario->getSenha == ''){
            return false;
        }
        else{
            return $usuarioDao->insert($usuario);
        }
    }

    /**
     * Método para definir regras de negócio no select e chamar método getById da classe UsuarioDAO
     *
     * @param [type] $id
     * @return void
     */
    public function getById($id){
        $usuarioDao = new UsuarioDAO;

        $usuario = $usuarioDao->getById($id);
        return $usuario;
    }

    /**
     * Método para definir regras de negócio na edição e chamar método update da classe UsuarioDAO
     *
     * @param UsuarioVO $usuario
     * @return void
     */
    public function update(UsuarioVO $usuario){
        $usuarioDao = new UsuarioDAO;

        if($usuario->getNome() == '' || $usuario->getTipo() == '' || $usuario->getEmail == '' || $usuario->getSenha == ''){
            return false;
        }
        else{
            return $usuarioDao->update($usuario);
        }
    }

    /**
     * Método para definir regras de negócio na exclusão e chamar método delete da classe UsuarioDAO
     *
     * @param UsuarioVO $usuario
     * @return void
     */
    public function delete(UsuarioVO $usuario){
        $usuarioDao = new UsuarioDAO;

        return $usuarioDao->delete($usuario);
    }

    /**
     * Método para definir regras de negócio no select e chamar método getAll da classe UsuarioDAO
     *
     * @return void
     */
    public function getAll(){
        $usuarioDao = new UsuarioDAO;

        return $usuarioDao->getAll();
    }
}

?>