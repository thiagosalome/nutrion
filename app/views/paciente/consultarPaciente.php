<?php
    session_start();

    if(isset($_SESSION["email_nutricionista"])){
        $email = $_SESSION["email_nutricionista"];

        if(!isset($_SESSION["id_nutricionista"])){
            require("app/controllers/nutricionistaController.php");
            $nutricionistaController = new nutricionistaController();
            $nutricionista = $nutricionistaController->getNutricionistaByEmail($email);
            
            $_SESSION["id_nutricionista"] = $nutricionista->getId();
            $_SESSION["nome_nutricionista"] = $nutricionista->getNome();
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
    <main class = "main-dashboard">
        <?php include __DIR__ . "/../objects/menu.php"; ?>
        <section class="dashboard">
            <header class="dashboard-header">
                <?php include __DIR__ . "/../objects/header-top.php"; ?>
                <div class="header-bottom">
                    <h1 class="header-title">Consultar Pacientes</h1>
                </div>
            </header>
            <div class="dashboard-content">
                <div class="dashboard-statistics">
                    <?php include __DIR__ . "/../objects/statistics.php"; ?>
                </div>
                <div class="dashboard-table">
                    <div class="table-wrapper table-responsive">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Todos os <b>Pacientes</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="js-table-patient table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>CPF</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // $pacientes = $pacienteDAO->getAll($_SESSION["id_nutricionista"]);

                                    for($i = 0; $i < count($pacientes); $i++){
                                        ?>
                                        <tr>
                                            <td><?= $pacientes[$i]->getNome(); ?></td>
                                            <td><?= $pacientes[$i]->getEmail(); ?></td>
                                            <td><?= $pacientes[$i]->getTelefone(); ?></td>
                                            <td><?= $pacientes[$i]->getCpf(); ?></td>
                                            <td>
                                                <a href='<?= HOME_URI . "paciente/interna/" . $pacientes[$i]->getId(); ?>' class='view'><i class='material-icons' data-toggle='tooltip' title='Visualizar'>visibility</i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <!-- <div class="clearfix">
                            <div class="hint-text">Exibindo <b>5</b> de <b>25</b> entradas</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Anterior</a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">Próxima</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>       
    </main>
    <?php include __DIR__ . "/../objects/modal-nutricionista.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>