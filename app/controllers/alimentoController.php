<?php
require "app/models/alimento/alimentoDAO.php";
require "app/models/alimento/alimentoVo.php";
require "app/models/alimento/alimentoModel.php";
require "app/class/json.php";

class alimentoController{

    public function create(){
        $alimentoVo = new alimentoVo();

        try{
            $alimentoVo->setIdNutricionista($_POST["id_nutricionista"]);   
            $alimentoVo->setNome($_POST["nome"]);
            $alimentoVo->setMedida($_POST["medida"]);
            $alimentoVo->setTipoproteina($_POST["tipo_proteina"]);
            $alimentoVo->setProteina($_POST["proteina"]);
            $alimentoVo->setCarboidrato($_POST["carboidrato"]);
            $alimentoVo->setCaloria($_POST["caloria"]);
            $alimentoVo->setGordura($_POST["gordura"]);

            $alimentoModel = new alimentoModel();
            $create = $alimentoModel->create($alimentoVo);

            echo $create;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        } 
    }

    public function update($_PUT){
        $alimentoVo = new alimentoVo();

        try{
            $alimentoVo->setId($_GET["id"]);
            $alimentoVo->setNome($_PUT["nome"]);
            $alimentoVo->setMedida($_PUT["medida"]);
            $alimentoVo->setTipoproteina($_PUT["tipo_proteina"]);
            $alimentoVo->setProteina($_PUT["proteina"]);
            $alimentoVo->setCarboidrato($_PUT["carboidrato"]);
            $alimentoVo->setCaloria($_PUT["caloria"]);
            $alimentoVo->setGordura($_PUT["gordura"]);

            $alimentoModel = new alimentoModel();
            $update = $alimentoModel->update($alimentoVo);

            echo $update;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function delete($_DELETE){
        $alimentoVo = new alimentoVO();

        try{
            $alimentoVo->setId($_GET["id"]);  

            $alimentoModel = new alimentoModel();     
            $delete = $alimentoModel->delete($alimentoVo);

            echo $delete;
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }

    public function get($params){
        try{
            $alimentoModel = new alimentoModel();
            
            if(isset($params["id"])){
                $alimento = $alimentoModel->getById($params["id"]);
                echo $alimento;
            }
            else if(isset($params["id_nutricionista"])){
                $alimentos = $alimentoModel->getAll($params["id_nutricionista"]);
                echo $alimentos;
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar o id do alimento para receber um alimento específico ou id_nutricionista para receber todos os alimentos referentes a ele", null);
            }
        }
        catch(Exception $e){
            echo json::generate("Exception", $e->getCode(), $e->getMessage(), null);
        }
    }
}