<?php
    session_start();

    if(isset($_SESSION["email_nutricionista"])){
        $email = $_SESSION["email_nutricionista"];

        if(!isset($_SESSION["id_nutricionista"])){
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
        <?php include "objects/menu.php"; ?>
        <section class="dashboard">
            <header class="dashboard-header">
                <div class="header-top">
                    <div class="header-perfil js-header-perfil">
                        <p class="perfil-name">John</p>
                        <img class="perfil-arrow" src="<?php echo HOME_URI; ?>app/public/images/dashboard/icon_arrow.png" alt="" title="">
                    </div>
                    <div class="header-search">
                        <img class="search-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/icon_search.png" alt="" title="">
                        <input class="search-input" type="text" name="search" id="">
                    </div>
                    <div class="header-options js-header-options">
                        <ul>
                            <li><button data-toggle="modal" data-target="#modal-update">Editar Conta</button></li>
                            <li><button data-toggle="modal" data-target="#modal-delete">Deletar Conta</button></li>
                            <li><a href="http://">Sair</a></li>
                        </ul>
                    </div>
                    <div class="header-menu js-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="header-bottom">
                    <h1 class="header-title">Relatórios</h1>
                </div>
            </header>
            <div class="dashboard-reports">
                <h2 class="reports-title">
                    Gerar <span>Relatórios</span>
                </h2>
                <form role="form" class="largewidth reports-form" action="">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select name="relatorio" class="form-control input-default">
                                <option value="">Paciente</option>
                                <option value="">Dietas</option>
                                <option value="">Alimentos</option>
                            </select>
                            <i class="glyphicon glyphicon-chevron-down "></i> 
                        </div>
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Gerar</button>
                    </div>
                </form>
            </div>
        </section>       
    </main>
    <?php include "objects/modal.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/config.js"></script>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>