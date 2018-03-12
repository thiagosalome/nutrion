<?php
/*
    Passos:
        Criar classe UsuarioDAO
        
        Criar método insert passando objeto UsuarioVO como parâmetro
            Criar variável $sql que recebe o comando de insert
            Concatenar a variável $sql passando ? como parâmetro (Para evitar ataques sql_inject)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $usuario->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())
        
        Criar método update passando objeto UsuarioVO como parâmetro
            Criar variável $sql que recebe o comando de update (utilizar where id)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $usuario->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())

        Criar método delete passando objeto UsuarioVO como parâmetro
            Criar variável $sql que recebe o comando de delete (utilizar where id)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $usuario->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())

        Criar método getById que irá receber um $id como parâmetro
            Criar variável $sql que recebe o comando de select, concatenando com a variável $id (addslashes($id))
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $query que irá receber o método de execReader($sql) do banco
            Instanciar um UsuarioVO
            Criar um while($reg = $query->fetch_array(MYSQLI_ASSOC))
                Dentro do while setar os dados no objeto do UsuarioVO (Ex: $usuario->setNome($reg["nome"]);)
            Retornar objeto do tipo UsuarioVO
        */
    class UsuarioDAO{

        /**
         * Método de inserção do usuário
         *
         * @param UsuarioVO $usuario
         * @return void
         */
        public function insert(UsuarioVO $usuario){
            $sql = "INSERT INTO usuarios (nome, tipo, email, senha) VALUES(";
            $sql. "?, ?, ?, ?)";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('s', $usuario->getNome());
            $pstm->bind_param('s', $usuario->getTipo());
            $pstm->bind_param('s', $usuario->getEmail());
            $pstm->bind_param('s', $usuario->getSenha());

            if($pstm->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Método de edição do usuário
         *
         * @param UsuarioVO $usuario
         * @return void
         */
        public function update(UsuarioVO $usuario){
            $sql = "UPDATE usuarios SET nome = ?, tipo = ?, email = ?, senha = ?  WHERE id = ?";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('s', $usuario->getNome());
            $pstm->bind_param('s', $usuario->getTipo());
            $pstm->bind_param('s', $usuario->getEmail());
            $pstm->bind_param('s', $usuario->getSenha());
            $pstm->bind_param('i', $usuario->getId());

            if($pstm->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Método de exclusão do usuário
         *
         * @param UsuarioVO $usuario
         * @return void
         */
        public function delete(UsuarioVO $usuario){
            $sql = "DELETE FROM usuarios WHERE id = ?";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('i', $usuario->getId());

            if($pstm->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        /**
         * Método de seleção do usuário
         *
         * @param UsuarioVO $usuario
         * @return void
         */
        public function getById($id){
            $sql = "SELECT * FROM usuarios WHERE id = " . $id;

            $db = new DB();
            $db->getConnection();
            
            $query = $db->execReader($sql);
            $usuario = new UsuarioVO();

            while($reg = $query->fetch_array(MYSQLI_ASSOC)){
                $usuario->setId($reg["id"]);
                $usuario->setNome($reg["nome"]);
                $usuario->setTipo($reg["tipo"]);
                $usuario->setEmail($reg["email"]);
            }

            return $usuario;
        }
    }
?>