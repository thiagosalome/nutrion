<?php
include "UsuarioVO.php"
class UsuarioController{

    public function cadastrar(){
        $model = new UsuarioModel();
        $vo = new UsuarioVo();

        $vo->setName($_POST["nome"]);

        $model->insert($vo);
    }
}

?>