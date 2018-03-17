<?php
/*
    Passos:
        Criar classe nutricionistaDAO
        
        Criar método insert passando objeto nutricionistaVO como parâmetro
            Criar variável $sql que recebe o comando de insert
            Concatenar a variável $sql passando ? como parâmetro (Para evitar ataques sql_inject)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $nutricionista->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())
        
        Criar método update passando objeto nutricionistaVO como parâmetro
            Criar variável $sql que recebe o comando de update (utilizar where id)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $nutricionista->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())

        Criar método delete passando objeto nutricionistaVO como parâmetro
            Criar variável $sql que recebe o comando de delete (utilizar where id)
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $pstm que irá receber o método de execSQL($sql) do banco
            Utilizar o bind_param para passar os parâmetros no lugar das ?. Ex: ($pstm->bind_param('s', $nutricionista->getNome())
            Verificar se o $pstm foi executado e retornar um booleano. ($pstm->execute())

        Criar método getById que irá receber um $id como parâmetro
            Criar variável $sql que recebe o comando de select, concatenando com a variável $id (addslashes($id))
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $query que irá receber o método de execReader($sql) do banco
            Instanciar um nutricionistaVO
            Criar um while($reg = $query->fetch_array(MYSQLI_ASSOC))
                Dentro do while setar os dados no objeto do nutricionistaVO (Ex: $nutricionista->setNome($reg["nome"]);)
            Retornar objeto do tipo nutricionistaVO

        Criar método getAll
            Criar variável $sql que recebe o comando de select de tudo
            Instanciar banco
            Realizar uma nova conexão
            Criar variável $query que irá receber o método de execReader($sql) do banco
            Retornar a variável $query
        */
    class nutricionistaDAO{

        /**
         * Método de inserção do usuário
         *
         * @param nutricionistaVO $nutricionista
         * @return void
         */
        public function insert(nutricionistaVO $nutricionista){
            $sql = "INSERT INTO nutricionistas (nome, tipo, email, senha) VALUES(";
            $sql. "?, ?, ?, ?)";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('s', $nutricionista->getNome());
            $pstm->bind_param('s', $nutricionista->getTipo());
            $pstm->bind_param('s', $nutricionista->getEmail());
            $pstm->bind_param('s', $nutricionista->getSenha());

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
         * @param nutricionistaVO $nutricionista
         * @return void
         */
        public function update(nutricionistaVO $nutricionista){
            $sql = "UPDATE nutricionistas SET nome = ?, tipo = ?, email = ?, senha = ?  WHERE id = ?";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('s', $nutricionista->getNome());
            $pstm->bind_param('s', $nutricionista->getTipo());
            $pstm->bind_param('s', $nutricionista->getEmail());
            $pstm->bind_param('s', $nutricionista->getSenha());
            $pstm->bind_param('i', $nutricionista->getId());

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
         * @param nutricionistaVO $nutricionista
         * @return void
         */
        public function delete(nutricionistaVO $nutricionista){
            $sql = "DELETE FROM nutricionistas WHERE id = ?";

            $db = new DB();
            $db->getConnection();
            $pstm = $db->execSQL($sql);
            
            $pstm->bind_param('i', $nutricionista->getId());

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
         * @param nutricionistaVO $nutricionista
         * @return void
         */
        public function getById($id){
            $sql = "SELECT * FROM nutricionistas WHERE id = " . $id;

            $db = new DB();
            $db->getConnection();
            
            $query = $db->execReader($sql);
            $nutricionista = new nutricionistaVO();

            while($reg = $query->fetch_array(MYSQLI_ASSOC)){
                $nutricionista->setId($reg["id"]);
                $nutricionista->setNome($reg["nome"]);
                $nutricionista->setTipo($reg["tipo"]);
                $nutricionista->setEmail($reg["email"]);
            }

            return $nutricionista;
        }

        public function getAll(){
            $sql = "SELECT * FROM nutricionistas";

            $db = new DB();
            $db->getConnection();

            $query = $db->execReader($sql);

            return $query;
        }

        public function GetSenhaByEmail($email){
            $sql = "SELECT senha FROM nutricionistas WHERE email = " . $email;

            $db = new DB();
            $db->getConnection();            
            $query = $db->execReader($sql);

            if (mysql_num_rows($query) != 1){
                $senha = NULL;
            }
            else{
                $senha = $query;
            }          
            return $senha;
        }
    }
?>