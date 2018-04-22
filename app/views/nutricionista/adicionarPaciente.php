<?php
    session_start();
    $email = $_SESSION["email"];

    if(!isset($_SESSION["id_nutricionista"])){
        $nutricionistaController = new nutricionistaController();
        $nutricionista = $nutricionistaController->getNutricionistaByEmail($email);
        $_SESSION["id_nutricionista"] = $nutricionista->getId();
    }
    // if(isset($_SESSION["email"])){
    //     $email = $_SESSION["email"];
    // }
    // else{
    //     header("Location: /nutrion/");
    // }
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
                    <h1 class="header-title">Adicionar Paciente</h1>
                </div>
            </header>
            <div class="dashboard-statistics">
                <div class="statistics-item">
                    <div class="statistics-item-image-blue">
                        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/patient_icon.png" alt="Pacientes" title="Pacientes" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>192</span>
                        <p>Pacientes</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-agua">
                        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/aliments_icon.png" alt="Alimentos" title="Alimentos" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>55</span>
                        <p>Alimentos</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-green">
                        <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/diets_icon.png" alt="Dietas" title="Dietas" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>32</span>
                        <p>Dietas</p>
                    </div>
                </div>
            </div>
            <div class="dashboard-form">
                <form role="form" class="largewidth js-form-addPatient" action="">
                    <h3 class="formheader">Adicionar Paciente</h3>
                    <input type="hidden" name="id_nutricionista" value="<?php echo $_SESSION['id_nutricionista']; ?>">
                    <div class="row">
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="text" class="form-control input-default" name="Nome" placeholder="Nome">
                            <i class="glyphicon glyphicon-user form-control-feedback glyphiconalign"></i> 
                        </div>
                        <div class="text-left col-sm-6 form-group has-feedback">
                            <input type="tel" class="form-control input-default" name="Telefone" placeholder="Telefone">
                            <i class="glyphicon glyphicon-earphone form-control-feedback glyphiconalign"></i> 
                        </div>
                    </div>
                    <!-- <div class="form-group has-feedback">
                        <input type="email" class="form-control input-default" name="email" placeholder="Email">
                        <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
                    </div> -->
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <select name="sexo" class="form-control input-default">
                            <option value="">Sexo</option>
                            <option>Masculino</option>
                            <option>Feminino</option>
                            </select>
                            <i class="glyphicon glyphicon-chevron-down "></i> 
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control input-default" name="nascimento" placeholder="Data de nascimento : DD/MM/YY">
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control input-default" name="cpf" placeholder="CPF">
                        <i class="glyphicon glyphicon-envelope form-control-feedback"></i> 
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
    <?php include "objects/modal.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/config.js"></script>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>