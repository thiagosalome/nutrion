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
        $dietaVo = new DietaVo(); 
        
        try{
            $dietaVo->setId($_GET["id"]);             
            $dietaVo->setpaciente($_PUT["paciente"]);
            $dietaVo->setdata($_PUT["data"]);       
            
            $dietaModel = new DietaModel();
            $update = $dietaModel->update($dietaVo);
    
            echo $update;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
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

    public function get($params){
        try{
            $dietaModel = new DietaModel();
            
            if(isset($params["id"])){
                $dieta = $dietaModel->getById($params["id"]);
                echo $dieta;
            }
            else if(isset($params["paciente"])){
                $dietas = $dietaModel->getAll($params["paciente"]);
                echo $dietas;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id da dieta para receber uma dieta específica ou id do paciente para receber todas os dietas referentes a ele", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}
?>