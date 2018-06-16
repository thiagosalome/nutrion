<?php
require "app/models/dieta/dietaDAO.php";
require "app/models/dieta/dietaVo.php";
require "app/models/dieta/dietaModel.php";
class dietaController{
    public function create(){
        $dietaVo = new DietaVo;

        try{   
            $dietaVo->setpaciente($_POST["paciente"]);
            $dietaVo->setdata($_POST["data"]);

            $dietaModel = new DietaModel;
            $create = $dietaModel->create($dietaVo);        
            echo $create;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }
    public function update(){
        
    }
    public function delete(){        
        $dietaVo = new DietaVo;
        try{
        
            $dietaVo->getId($_POST["id"]);
            $dietaModel = new DietaModel;
            $delete = $dietaModel->delete($dietaVo);

            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }
    public function getAll(){
        
    }
}
?>