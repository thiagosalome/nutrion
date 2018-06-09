<?php
require "app/models/dieta/dietaDAO.php";
require "app/models/dieta/dietaVo.php";
require "app/models/dieta/dietaModel.php";
class dietaController{
    public function create(){
        $dietaModel = new DietaModel;
        $dietaVo = new DietaVo;

        $dietaVo->setpaciente($_POST["paciente"]);
        $dietaVo->setdata($_POST["data"]);

        $create = $dietaModel->create($dietaVo);        
        echo $create;

    }
    public function update(){
        
    }
    public function delete(){
        $dietaModel = new DietaModel;
        $dietaVo = new DietaVo;
        
        $dietaVo->getId($_POST["id"]);
        $delete = $dietaModel->delete($dietaVo);

        echo $delete;
    }
    public function getAll(){
        
    }
}
?>