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

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- site title -->
    <title>Dashboard</title>
</head>

<body>
    <main class = "main-dashboard">
        <?php include __DIR__ . "/../objects/menu.php"; ?>
        <section class="dashboard">
            <header class="dashboard-header">
                <?php include __DIR__ . "/../objects/header-top.php"; ?>
                <div class="header-bottom">
                    <h1 class="header-title">Adicionar Paciente</h1>
                </div>
            </header>
            <div class="dashboard-statistics">
                <?php include __DIR__ . "/../objects/statistics.php"; ?>
            </div>
            <div class="dashboard-form">
                <form role="form" class="largewidth js-form-addAliment" action="<?php echo HOME_URI ?>alimento/create">
                    <h3 class="formheader">Adicionar Alimento</h3>
                    <div class="row">
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="nome" placeholder="Nome">
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="medida" placeholder="Medida">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select name="tipo_proteina" class="form-control input-default">
                                <option value="">Tipo de Proteína</option>
                                <option value="Vegetal">Vegetal</option>
                                <option value="Animal">Animal</option>
                            </select>
                            <i class="glyphicon glyphicon-chevron-down "></i>
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="proteina" placeholder="Proteína">
                        </div>
                    </div>
                    <div class="row">
                    <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="carboidrato" placeholder="Carboidratos">
                        </div>
                        <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="gordura" placeholder="Gorduras">
                        </div>
                        <div class="text-left col-sm-4 form-group has-feedback">
                            <input type="number" step="0.001" class="form-control input-default" name="caloria" placeholder="Calorias">
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Adicionar</button>
                    </div>
                </form>
                <p class='main-message js-message'></p>
                <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="main-load js-load" title="Carregando..." alt="Carregando...">
            </div>
        </section>       
    </main>
    <?php include __DIR__ . "/../objects/modal-nutricionista.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>