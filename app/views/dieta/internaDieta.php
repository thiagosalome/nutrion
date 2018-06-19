<?php
    session_start();

    if(isset($_SESSION["email_nutricionista"])){
        $email = $_SESSION["email_nutricionista"];

        if(!isset($_SESSION["id_nutricionista"])){
            require("app/controllers/nutricionistaController.php"); 
            $nutricionistaController = new nutricionistaController();
            $nutricionista = $nutricionistaController->getNutricionistaByEmail($email);
            
            $_SESSION["nome_nutricionista"] = $nutricionista->getNome();
            $_SESSION["id_nutricionista"] = $nutricionista->getId();
            $_SESSION["senha_nutricionista"] = $nutricionista->getSenha();
        }
        if(isset($_GET["id"])){
            require "app/models/dieta/dietaDAO.php";
            $dietaDAO = new dietaDAO();
            $params["id"] = $_GET["id"];
            $dieta = $dietaDAO->getById($params);
        }
    }
    else{
        header("Location: " . HOME_URI);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- meta tags -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link css -->
    <link rel="stylesheet" href="<?php echo HOME_URI; ?>app/public/css/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- site title -->
    <title>Dashboard</title>
</head>

<body>
    <main class="main-dashboard">
        <?php include __DIR__ . "/../objects/menu.php"; ?>
        <section class="dashboard">
            <header class="dashboard-header">
                <?php include __DIR__ . "/../objects/header-top.php"; ?>
                <div class="header-bottom">
                    <h1 class="header-title">Dieta</h1>
                </div>
            </header>
            <div class="dashboard-content">
                <div class="dashboard-patient-header">
                    <div class="patient-header-item patient-header-perfil">
                        <input type="hidden" class="id-diet" value="<?= $_GET["id"] ?>">
                        <img src="<?= HOME_URI; ?>app/public/images/dashboard/diets_icon.png" alt="Dieta" title="Dieta" class="header-logo">
                    </div>
                    <div class="patient-header-item">   
                        <h1 class="patient-header-title"><?= $dieta->getPaciente()->getNome(); ?></h1>
                        <p><span class="red-label">Data: </span><?= date_format($dieta->getData(), "d/m/Y"); ?></p>
                    </div>
                    <div class="patient-header-item">
                        <div class="patient-header-icon" data-toggle="modal" data-target="#modal-update-diet"><i class="material-icons" data-toggle="tooltip" title="Edit">mode_edit</i></div>
                        <div class="patient-header-icon" data-toggle="modal" data-target="#modal-delete-diet"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></div>
                    </div>
                </div>
                <div class="dashboard-patient-tab menu-tabs">
                    <ul>
                        <li class="patient-tab-item js-patient-tab active" data-tab="refeicoes">Refeições</li>
                        <li class="patient-tab-item js-patient-tab" data-tab="adicionar-refeicao">Adicionar Refeição</li>
                    </ul>
                </div>
                <div class="dashboard-statistics dashboard-patient-content js-patient-content active" data-content="refeicoes">
                    <?php
                        require "app/models/refeicao/refeicaoDAO.php";
                        $refeicaoDAO = new refeicaoDAO();
                        $refeicoes = $refeicaoDAO->getAll($dieta->getId());

                        for ($i = 0; $i < count($refeicoes); $i++) {
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5><?= $refeicoes[$i]->getNome(); ?></h5>
                                    <h6><?= $refeicoes[$i]->getHorario(); ?></h6>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                   
                </div>
                <div class="dashboard-form dashboard-patient-content js-patient-content" data-content="adicionar-refeicao">
                    <form role="form" class="largewidth largeww js-form-addMeal" action="<?php echo HOME_URI; ?>API/refeicao/">
                        <input type="hidden" name="id_dieta" value="<?= $dieta->getId(); ?>">
                        <h3 class="formheader form-intern">Adicionar Refeição</h3>
                        <div class="row">
                            <div class="text-left  col-sm-6 col-intern form-group">
                                <input type="text" step="0.001" class="form-control input-default" name="nome" placeholder="Nome">
                            </div>
                            <div class=" text-left col-sm-6 form-group">
                            <input type="time" class="form-control input-default" name="horario" placeholder="Horário">
                            </div>
                        </div>
                        <div class="row js-meal-item">
                            <div class="text-left col-sm-6 col-intern form-group ">
                                <select name="alimento[]" class="form-control input-default">
                                    <option value="">Alimento</option>
                                    <?php
                                        require "app/models/alimento/alimentoDAO.php";
                                        $alimentoDAO = new alimentoDAO;

                                        $alimentos = $alimentoDAO->getAll($_SESSION["id_nutricionista"]);
                                        for($i = 0; $i < count($alimentos); $i++){
                                            ?>
                                            <option value="<?= $alimentos[$i]->getId(); ?>"><?= $alimentos[$i]->getNome(); ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                                <i class="glyphicon glyphicon-chevron-down "></i>
                            </div>
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="1" class="form-control input-default" name="quantidade[]" placeholder="Quantidade">
                            </div>
                            <div class="text-left col-sm-2 col-intern form-group">
                                <div class="patient-header-icon-add"><i class="material-icons js-add-meal-item" data-toggle="tooltip" title="Add">add_circle_outline</i></div>
                                <!-- <div class="patient-header-icon"><i class="material-icons" data-toggle="tooltip" title="Add">add</i></div> -->
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-bottom: 0px;">
                            <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Adicionar</button>
                        </div>
                    </form>
                    <div class="response">
                        <p class='response-message js-message'></p>
                        <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="response-load js-load" title="Carregando..." alt="Carregando...">
                    </div>
                </div>
            </div>
        </section>       
    </main>
    <?php include __DIR__ . "/../objects/modal-nutricionista.php" ?>
    <?php include __DIR__ . "/../objects/modal-dieta.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>