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
                <?php include "objects/header-top.php"; ?>
                <div class="header-bottom">
                    <h1 class="header-title">Paciente</h1>
                </div>
            </header>
            <div class="dashboard-reports header-reports">
                <!-- aqui ficará o usuário, com dados principais, tipo um header -->
                <div class="col-sm-2">
                    <img src="<?php echo HOME_URI; ?>app/public/images/paciente/perfil.png" alt="" title="" class="header-logo">
                </div>
                 <div class="col-sm-4">   
                    <h1 class="reports-title">MARIA SANTOS</h1>
                    <p><span class="red-label">Paciente: </span>emaildopaciente@gmail.com</p>
                </div>

                <div class="col-sm-3">
                    <p><span class="red-label">Sexo: </span>Feminino</p>   
                    <p><span class="red-label">Nascimento: </span>11/11/1111</p>
                    </div>
                <div class="col-sm-3">
                    <p><span class="red-label">Telefone: </span>(11) 1111-1111</p>
                    <p><span class="red-label">CPF: </span>111.111.111-11</p>
                </div>
            </div>

            <div class="menu-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#">DADOS FÍSICOS</a></li>
                    <li><a href="#">ADICIONAR FÍSICO</a></li>
                    <li><a href="#">HISTÓRICO</a></li>
                </ul>
            </div>

            <div class="dashboard-form">
                <form role="form" class=" largewidth largeww js-form-addPatient" action="">
                    <h3 class="formheader form-intern">Adicionar Físico</h3>
                    <div class="row">
                        <div class="text-left  col-sm-3 col-intern form-group">
                            <input type="text" class="form-control input-default" name="altura" placeholder="Altura">
                        </div>
                        <div class="text-left col-sm-3 col-intern form-group ">
                            <input type="text" class="form-control input-default" name="peso" placeholder="Peso">
                        </div>
                        <div class="text-left col-sm-3 col-intern form-group ">
                            <input type="text" class="form-control input-default" name="imc" placeholder="IMC">
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-left col-sm-3 col-intern form-group ">
                            <input type="text" class="form-control input-default" name="cintura" placeholder="Cintura">
                        </div>
                        <div class="text-left col-sm-3 col-intern form-group ">
                            <input type="text" class="form-control input-default" name="quadro" placeholder="Quadro">
                        </div>
                        <div class="text-left col-sm-3 col-intern form-group ">
                            <input type="text" class="form-control input-default" name="icq" placeholder="ICQ">
                        </div>
                    </div>
                    <div class="row">                    
                        <div class=" text-left col-sm-9 form-group  ">
                            <input type="text" class="form-control input-default" name="ipaq" placeholder="IPAQ">
                        </div>
                    </div>
                    <div class="form-group text-center" style="margin-bottom: 0px;">
                        <button class="btn btn-default col-md-3" style="float:inherit" type="submit">Adicionar</button>
                    </div>
                </form>
                <p class='main-message js-message'></p>
                <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="main-load js-load" title="Carregando..." alt="Carregando...">
            </div>
            <div class="dashboard-table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Histórico do <b>Paciente</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
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
                            <tr>
                                <td>Maria Santos</td>
                                <td>1,65 m</td>
                                <td>75 kg</td>
                                <td>22</td>
                                <td>75 cm</td>
                                <td>80 cm</td>
                                <td>0.9 </td>
                                <td>Muito ativo</td>
                                <td>15/06/1986</td>                                
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>1,65 m</td>
                                <td>75 kg</td>
                                <td>22</td>
                                <td>75 cm</td>
                                <td>80 cm</td>
                                <td>0.9 </td>
                                <td>Muito ativo</td>
                                <td>15/06/1986</td>                                
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>1,65 m</td>
                                <td>75 kg</td>
                                <td>22</td>
                                <td>75 cm</td>
                                <td>80 cm</td>
                                <td>0.9 </td>
                                <td>Muito ativo</td>
                                <td>15/06/1986</td>                                
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>1,65 m</td>
                                <td>75 kg</td>
                                <td>22</td>
                                <td>75 cm</td>
                                <td>80 cm</td>
                                <td>0.9 </td>
                                <td>Muito ativo</td>
                                <td>15/06/1986</td>                                
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>1,65 m</td>
                                <td>75 kg</td>
                                <td>22</td>
                                <td>75 cm</td>
                                <td>80 cm</td>
                                <td>0.9 </td>
                                <td>Muito ativo</td>
                                <td>15/06/1986</td>                                
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix">
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
                    </div>
                </div>
            </div>
            <div class="fisico-dados dashboard-statistics">
                <div class="statistics-item">
                    <div class="statistics-item-image-blue">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/altura_icon.png" alt="Altura" title="Altura" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>175</span>
                        <p>Altura</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-agua">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/peso_icon.png" alt="Peso" title="Peso" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>70 kg</span>
                        <p>Peso</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-green">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/imc_icon.png" alt="Imc" title="Imc" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>22,9</span>
                        <p>IMC</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-orange">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/cintura_icon.png" alt="Cintura" title="Cintura" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>75 cm</span>
                        <p>Cintura</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-yellow">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/quadril_icon.png" alt="Quadril" title="Quadril" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>70 cm</span>
                        <p>Quadril</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-redLight">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/icq_icon.png" alt="Icq" title="Icq" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>22,9</span>
                        <p>ICQ</p>
                    </div>
                </div>
                <div class="statistics-item">
                    <div class="statistics-item-image-redDark">
                        <img src="<?php echo HOME_URI; ?>app/public/images/paciente/ipaq_icon.png" alt="Ipaq" title="Ipaq" class="person-blue">
                    </div>
                    <div class="statistics-item-description">
                        <span>IPAQ</span>
                        <p>Muito Ativo</p>
                    </div>
                </div>
            </div>
        </section>       
    </main>

    <?php include "objects/modal.php" ?>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/config.js"></script>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>