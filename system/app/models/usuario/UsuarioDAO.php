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
?>