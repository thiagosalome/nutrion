<?php
require "app/models/infofisicas/infofisicasDAO.php";
require "app/models/infofisicas/infofisicasModel.php";
require "app/models/infofisicas/infofisicasVo.php";

class infofisicasController{
    
    public function create() {
        $infofisicasModel = new infofisicasModel();
        $infofisicasVo = new infofisicaVo();

        $infofisicasVo->setPeso($_POST["peso"]);
        $infofisicasVo->setAltura($_POST["altura"]);
        $infofisicasVo->setImc($_POST["imc"]);
        $infofisicasVo->setCintura($_POST["cintura"]);
        $infofisicasVo->setQuadril($_POST["quadril"]);
        $infofisicasVo->setIcq($_POST["icq"]);
        $infofisicasVo->setClassificacaoIPAQ($_POST["classificacaoIPAQ"]);
        $infofisicasVo->setIdPaciente($_POST["id_paciente"]);

        $cadastrar = $infofisicasModel->create($infofisicasVo);

        echo $cadastrarModel;   
    }

    public function update() {
        //$infofisicasModel = new infofisicasModel();
        //$infofisicasVo = new infofisicaVo();

        //$infofisicasVo->setPeso($_POST["peso"]);
        //$infofisicasVo->setAltura($_POST["altura"]);
        //$infofisicasVo->setImc($_POST["imc"]);
        //$infofisicasVo->setCintura($_POST["cintura"]);
        //$infofisicasVo->setQuadril($_POST["quadril"]);
        //$infofisicasVo->setIcq($_POST["icq"]);
        //$infofisicasVo->setClassificacaoIPAQ($_POST["classificacaoIPAQ"]);
        //$infofisicasVo->setIdPaciente($_POST["id_paciente"]);

        //$updateModel = $infofisicasModel->update($infofisicasVo);

        //echo $updateModel;   
    }

    public function delete() {

    }
}

?>