<?php
require "app/models/infofisicas/infofisicasDAO.php";
require "app/models/infofisicas/infofisicasModel.php";
require "app/models/infofisicas/infofisicasVo.php";
require "app/class/json.php";

class infofisicasController{
    
    public function create() {
        $infofisicasVo = new infofisicasVo();

        try{
            $infofisicasVo->setAltura($_POST["altura"]);
            $infofisicasVo->setPeso($_POST["peso"]);
            $infofisicasVo->setImc($_POST["imc"]);
            $infofisicasVo->setCintura($_POST["cintura"]);
            $infofisicasVo->setQuadril($_POST["quadril"]);
            $infofisicasVo->setIcq($_POST["icq"]);
            $infofisicasVo->setClassificacaoIPAQ($_POST["classificacaoIPAQ"]);
            $infofisicasVo->setIdPaciente($_POST["id_paciente"]);
    
            $infoFisicasModel = new infofisicasModel();
            $create = $infoFisicasModel->create($infofisicasVo);
    
            echo $create;   
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }

    public function get($params){
        try{
            $infoFisicasModel = new infofisicasModel();
            
            if(isset($params["id"])){
                $infoFisica = $infoFisicasModel->getById($params["id"]);
                echo $infoFisica;
            }
            else if(isset($params["id_paciente"])){
                $infoFisicas = $infoFisicasModel->getAll($params["id_paciente"]);
                echo $infoFisicas;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id da informação física para receber um físico específico ou id_paciente para receber todas as informações físicas dele", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}

?>