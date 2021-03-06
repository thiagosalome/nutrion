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
            $_SESSION["chave_nutricionista"] = $nutricionista->getChave();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <h1 class="header-title">Relatórios</h1>
                </div>
            </header>
            <div class="dashboard-content">
                <div class="dashboard-reports">
                    <h2 class="reports-title">
                        Gerar <span>Relatórios</span>
                    </h2>
                    <form role="form" method="POST" class="largewidth reports-form js-report-generate" action="<?php echo HOME_URI ?>relatorio/gerar">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <select name="relatorio" class="form-control input-default">
                                    <option value="pacientes">Pacientes</option>
                                    <option value="alimentos">Alimentos</option>
                                    <option value="dietas">Dietas</option>
                                </select>
                                <i class="glyphicon glyphicon-chevron-down "></i> 
                            </div>
                            <button class="btn btn-default col-md-3" style="float:inherit" name="generate_report" type="submit">Gerar</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include __DIR__ . "/../objects/modal-nutricionista.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>