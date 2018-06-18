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
            require "app/models/paciente/pacienteDAO.php";
            $pacienteDAO = new pacienteDAO();
            $params["id"] = $_GET["id"];
            $paciente = $pacienteDAO->getById($params);
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
                    <h1 class="header-title">Paciente</h1>
                </div>
            </header>
            <div class="dashboard-content">
                <div class="dashboard-patient-header">
                    <div class="patient-header-item patient-header-perfil">
                        <input type="hidden" class="id-patient" value="<?= $_GET["id"] ?>">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/perfil-<?php if($paciente->getSexo() == "F"){ echo "feminino"; }else{ echo "masculino"; } ?>.png" alt="" title="" class="header-logo">
                    </div>
                    <div class="patient-header-item">   
                        <h1 class="patient-header-title"><?= $paciente->getNome(); ?></h1>
                        <p><span class="red-label">Email: </span><?= $paciente->getEmail(); ?></p>
                    </div>
                    <div class="patient-header-item">
                        <p><span class="red-label">Sexo: </span><?php if($paciente->getSexo() == "F"){ echo "Feminino"; }else{ echo "Masculino"; } ?></p>   
                        <p><span class="red-label">Nascimento: </span><?= date_format($paciente->getDataNasc(), 'd/m/Y'); ?></p>
                    </div>
                    <div class="patient-header-item">
                        <p><span class="red-label">Telefone: </span><?= $paciente->getTelefone(); ?></p>
                        <p><span class="red-label">CPF: </span><?= $paciente->getCPF(); ?></p>
                    </div>
                    <div class="patient-header-item">
                        <div class="patient-header-icon" data-toggle="modal" data-target="#modal-update-patient"><i class="material-icons" data-toggle="tooltip" title="Edit">mode_edit</i></div>
                        <div class="patient-header-icon" data-toggle="modal" data-target="#modal-delete-patient"><i class="material-icons" data-toggle="tooltip" title="Delete">delete</i></div>
                    </div>
                </div>
                <div class="dashboard-patient-tab menu-tabs">
                    <ul>
                        <li class="patient-tab-item js-patient-tab active" data-tab="dados-fisicos">Dados Físicos</li>
                        <li class="patient-tab-item js-patient-tab" data-tab="adicionar-fisico">Adicionar Físico</li>
                        <li class="patient-tab-item js-patient-tab" data-tab="historico">Histórico</li>
                    </ul>
                </div>
                <div class="dashboard-statistics dashboard-patient-content js-patient-content active" data-content="dados-fisicos">
                    <?php
                        require "app/models/infofisicas/infofisicasDAO.php";
                        $infoFisicasDAO = new infofisicasDAO();
                        $infoFisica = $infoFisicasDAO->getAll($paciente->getId());
                        $qtdInfoFisica = count($infoFisica);
                        $ultimaInfoFisica = $infoFisica[$qtdInfoFisica - 1];
                    ?>
                    <div class="statistics-item">
                        <div class="statistics-item-image-blue">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/altura_icon.png" alt="Altura" title="Altura" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getAltura() ?> m</span>
                            <p>Altura</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-agua">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/peso_icon.png" alt="Peso" title="Peso" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getPeso() ?> kg</span>
                            <p>Peso</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-green">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/imc_icon.png" alt="Imc" title="Imc" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getImc() ?></span>
                            <p>IMC</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-orange">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/cintura_icon.png" alt="Cintura" title="Cintura" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getCintura() ?> cm</span>
                            <p>Cintura</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-yellow">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/quadril_icon.png" alt="Quadril" title="Quadril" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getQuadril() ?> cm</span>
                            <p>Quadril</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-redLight">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/icq_icon.png" alt="Icq" title="Icq" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span><?= $ultimaInfoFisica->getIcq() ?></span>
                            <p>ICQ</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image-redDark">
                            <img src="<?php echo HOME_URI; ?>app/public/images/paciente/ipaq_icon.png" alt="Ipaq" title="Ipaq" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span>IPAQ</span>
                            <p><?= $ultimaInfoFisica->getClassificacaoIPAQ() ?></p>
                        </div>
                    </div>
                </div>
                <div class="dashboard-form dashboard-patient-content js-patient-content" data-content="adicionar-fisico">
                    <form role="form" class="largewidth largeww js-form-addInfoFisicas" action="<?php echo HOME_URI; ?>API/infofisicas/">
                        <input type="hidden" name="id_paciente" value="<?= $paciente->getId(); ?>">
                        <h3 class="formheader form-intern">Adicionar Físico</h3>
                        <div class="row">
                            <div class="text-left  col-sm-4 col-intern form-group">
                                <input type="number" step="0.001" class="form-control input-default js-altura" name="altura" placeholder="Altura (m)">
                            </div>
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="0.001" class="form-control input-default js-peso" name="peso" placeholder="Peso (kg)">
                            </div>
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="0.001" class="form-control input-default js-imc" name="imc" placeholder="IMC">
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="0.001" class="form-control input-default js-cintura" name="cintura" placeholder="Cintura (cm)">
                            </div>
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="0.001" class="form-control input-default js-quadril" name="quadril" placeholder="Quadril (cm)">
                            </div>
                            <div class="text-left col-sm-4 col-intern form-group ">
                                <input type="number" step="0.001" class="form-control input-default js-icq" name="icq" placeholder="ICQ">
                            </div>
                        </div>
                        <div class="row">                    
                            <div class=" text-left col-sm-12 form-group  ">
                                <select name="classificacaoIPAQ" class="form-control input-default">
                                    <option value="">Classificação IPAQ</option>
                                    <option value="Sedentário">Sedentário</option>
                                    <option value="Irregularmente Ativo">Irregularmente Ativo</option>
                                    <option value="Ativo">Irregularmente Ativo</option>
                                    <option value="Muito Ativo">Irregularmente Ativo</option>
                                </select>
                                <i class="glyphicon glyphicon-chevron-down "></i>
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
                <div class="dashboard-table dashboard-patient-content js-patient-content" data-content="historico">
                    <div class="table-wrapper table-responsive">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Histórico do <b>Paciente</b></h2>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Altura</th>
                                    <th>Peso</th>
                                    <th>IMC</th>
                                    <th>Cintura</th>
                                    <th>Quadril</th>
                                    <th>ICQ</th>
                                    <th>IPAQ</th>
                                    <th>Data de avaliação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
    
                                    for($i = 0; $i < count($infoFisica); $i++){
                                    ?>
                                        <tr>
                                            <td><?= $paciente->getNome(); ?></td>
                                            <td><?= $infoFisica[$i]->getAltura(); ?> m</td>
                                            <td><?= $infoFisica[$i]->getPeso(); ?> kg</td>
                                            <td><?= $infoFisica[$i]->getImc(); ?></td>
                                            <td><?= $infoFisica[$i]->getCintura(); ?> cm</td>
                                            <td><?= $infoFisica[$i]->getQuadril(); ?> cm</td>
                                            <td><?= $infoFisica[$i]->getIcq(); ?></td>
                                            <td><?= $infoFisica[$i]->getClassificacaoIPAQ(); ?></td>
                                            <td>15/06/1986</td>                                
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
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
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
    <?php include __DIR__ . "/../objects/modal-paciente.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>