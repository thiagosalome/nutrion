<?php
    if(isset($report)){

        switch ($report) {
            case 'pacientes':
                require("app/controllers/pacienteController.php");
                $pacienteController = new pacienteController();
                $params["id_nutricionista"] = $_SESSION["id_nutricionista"];
                $pacientes = $pacienteController->get($params);    
                break;
    
            case 'alimentos':
                require("app/controllers/alimentoController.php");
                $alimentoController = new alimentoController();
                $alimentos = $alimentoController->get();    
    
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
    <title><?= $reportTitle ?></title>
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
                        <h3><?= $reportTitle ?></h3>
                    </div>
                </div>
            </div>
            <table class="table table-hover">
            <?php
                if($pacientes != null){
            ?>
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
                        foreach ($pacientes as $item) {
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
            <?php 
                }
                else if($alimentos != null){
            ?>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Medida</th>
                        <th>Tipo de Proteína</th>
                        <th>Proteína</th>
                        <th>Carboidratos</th>
                        <th>Gorduras</th>
                        <th>Calorias</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($alimentos as $item) {
                        ?>
                            <tr>
                                <td><?= $item->getNome();?></td>
                                <td><?= $item->getMedida(); ?></td>
                                <td><?= $item->getTipoproteina(); ?></td>
                                <td><?= $item->getProteina(); ?></td>
                                <td><?= $item->getCarboidrato(); ?></td>
                                <td><?= $item->getGordura(); ?></td>
                                <td><?= $item->getCaloria(); ?></td>
                            </tr>
                        <?php
                        }
                    ?>
                </tbody>
            <?php
                }
            ?>
            </table>
        </div>
    </div>
</body>
</html>