<?php
    if(isset($_SESSION["report"])){
        $report = $_SESSION["report"];
    
        switch ($report) {
            case 'pacientes':
                require("app/controllers/pacienteController.php");
                $pacienteController = new pacienteController();
                $items = $pacienteController->getAllPatients($_SESSION["id_nutricionista"]);    
                break;
    
            case 'alimentos':
                require("app/controllers/alimentoController.php");
                $alimentoController = new alimentoController();
                $items = $alimentoController->getAllPatients($_SESSION["id_nutricionista"]);    
    
                break;
            case 'dietas':
                # code...
                break;
        }
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
    <link rel="stylesheet" href="<?php echo HOME_URI ?>app/public/css/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- site title -->
    <title><?= $_SESSION["report"]; ?></title>
</head>
<body>
    <header>
        <p><strong>Nutricionista: </strong> <?= $_SESSION["nome_nutricionista"] ?></p>
    </header>
    <hr>
    <div class="dashboard-table js-table-patient">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Pacientes</h3>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($items as $item) {
                        ?>
                            <tr>
                                <td><?= $item->getNome();?></td>
                                <td><?= $item->getEmail(); ?></td>
                                <td><?= $item->getTelefone(); ?></td>
                                <td><?= $item->getCPF(); ?></td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>