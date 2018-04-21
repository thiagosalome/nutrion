<?php
    // session_start();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
                    <h1 class="header-title">Consultar Pacientes</h1>
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
            <div class="dashboard-table">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Todos os <b>Pacientes</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Nascimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Maria Santos</td>
                                <td>mariasantos@gmail.com</td>
                                <td>(31) 3264-9685</td>
                                <td>15/06/1986</td>
                                <td>
                                    <a href="#" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>mariasantos@gmail.com</td>
                                <td>(31) 3264-9685</td>
                                <td>15/06/1986</td>
                                <td>
                                    <a href="#" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>mariasantos@gmail.com</td>
                                <td>(31) 3264-9685</td>
                                <td>15/06/1986</td>
                                <td>
                                    <a href="#" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Maria Santos</td>
                                <td>mariasantos@gmail.com</td>
                                <td>(31) 3264-9685</td>
                                <td>15/06/1986</td>
                                <td>
                                    <a href="#" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a>
                                </td>
                            </tr>				
                            <tr>
                                <td>Maria Santos</td>
                                <td>mariasantos@gmail.com</td>
                                <td>(31) 3264-9685</td>
                                <td>15/06/1986</td>
                                <td>
                                    <a href="#" class="view"><i class="material-icons" data-toggle="tooltip" title="View">visibility</i></a>
                                </td>
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
            <!-- Edit Modal HTML -->
            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form>
                            <div class="modal-header">						
                                <h4 class="modal-title">Add Employee</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" required>
                                </div>					
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <input type="submit" class="btn btn-success" value="Add">
                            </div>
                        </form>
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