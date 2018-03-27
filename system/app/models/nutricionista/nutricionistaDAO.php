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
    public function insert(nutricionistaVo $nutricionistaVo){
        require_once "app/bootstrap.php"; // Fazendo o require do arquivo bootstrap.php para poder utilizar o entityManager

        try{
            $nutricionista = new Nutricionista;
            $nutricionista->setNome($nutricionistaVo->getNome());
            $nutricionista->setEmail($nutricionistaVo->getEmail());
            $nutricionista->setSenha($nutricionistaVo->getSenha());
    
            // O método persist recebe um objeto de forma a colocá-lo na fila de instruções a serem executadas
            $entityManager->persist($nutricionista);
    
            // O método flush executa no banco de dados todas as funções definidas pelo persist
            $entityManager->flush();

            return true;
        }
        catch (Expection $e){
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
        $sql = "UPDATE tb_nutricionista SET nome = ?, email = ?, senha = ?  WHERE id = ?";

        $db = new DB();
        $db->getConnection();
        $pstm = $db->execSQL($sql);
        
        $pstm->bind_param('s', $nutricionista->getNome());
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
        $sql = "DELETE FROM tb_nutricionista WHERE id = ?";

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
        $sql = "SELECT * FROM tb_nutricionista WHERE id = " . $id;

        $db = new DB();
        $db->getConnection();
        
        $query = $db->execReader($sql);
        $nutricionista = new nutricionistaVO();

        while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $nutricionista->setId($reg["id"]);
            $nutricionista->setNome($reg["nome"]);
            $nutricionista->setEmail($reg["email"]);
        }

        return $nutricionista;
    }

    public function getAll(){
        $sql = "SELECT * FROM tb_nutricionista";

        $db = new DB();
        $db->getConnection();

        $query = $db->execReader($sql);

        return $query;
    }

    public function verifyUser($email, $senha){
        // $sql = "SELECT senha FROM tb_nutricionista WHERE email = " . $email;
        $sql = "SELECT * FROM tb_nutricionista WHERE email = '" . $email . "' AND senha = '" . $senha . "'";

        $db = new DB();
        $db->getConnection();            
        $query = $db->execReader($sql);
        
        $rows = mysqli_num_rows($query);
        return $rows;
    }
}
?>