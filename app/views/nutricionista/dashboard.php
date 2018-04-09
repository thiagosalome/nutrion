<?php
    // session_start();
    // if(isset($_SESSION["loggeduser"])){
    //     $email = $_SESSION["loggeduser"];
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
    <link rel="stylesheet" href="/nutrion/app/public/css/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- site title -->
    <title>Dashboard</title>
</head>

<body>
    <main class = "main">
        <section class="column-menu">

            <aside class = "aside-lateral">

                <header class="header-aside">
                    <img src="/nutrion/app/public/images/dashboard/logo_menu.png" alt="" title="" class="header-logo">
                </header>

                <nav class="nav-menu">
                    <ul>
                        <li>
                            <img src="nutrion/app/public/images/dashboard/patient_icon.png" alt="" class="icon-list">
                            <p class="li-item">Pacientes</p>
                            <img src="/nutrion/app/public/images/dashboard/seta_icon.png" alt="" class="icon-seta">
                            <ul>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/view_icon.png" alt="" title="" class="icon-view">
                                        <p class="li-subitem">Consultar Pacientes</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/add_icon.png" alt="" title="" class="icon-add">
                                        <p class="li-subitem">Adicionar Paciente</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <img src="/nutrion/app/public/images/dashboard/aliments_icon.png" alt="" class="icon-list">
                            <p class="li-item">Alimentos</p>
                            <img src="/nutrion/app/public/images/dashboard/seta_icon.png" alt="" class="icon-seta">
                            <ul>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/view_icon.png" alt="" title="" class="icon-view">
                                        <p class="li-subitem">Consultar Alimentos</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/add_icon.png" alt="" title="" class="icon-add">
                                        <p class="li-subitem">Adicionar Alimentos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <img src="/nutrion/app/public/images/dashboard/menu_icon.png" alt="" class="icon-list">
                            <p class="li-item">Dieta</p>
                            <img src="/nutrion/app/public/images/dashboard/seta_icon.png" alt="" class="icon-seta">
                            <ul>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/view_icon.png" alt="" title="" class="icon-view">
                                        <p class="li-subitem">Consultar Dieta</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Item">
                                        <img src="/nutrion/app/public/images/dashboard/add_icon.png" alt="" title="" class="icon-add">
                                        <p class="li-subitem">Adicionar Dieta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <footer class="rodape-menu">
                    <p>Copyright</p>
                </footer>
            </aside>
        </section>

        <section class="column-page">

            <section class="section-superior">
                <header class="header-superior">
                    <!-- opção de busca e nome do usuário que estará logado -->
                </header>
            </section>

            <section class="section-main">
                <header class="header-main">
                    <h1 class="title-page">Consultar Pacientes</h1>
                </header>
            </section>

            <section class="section-divs">
                <div class="icons-pacients1">
                <img src="/nutrion/app/public/images/dashboard/icon_patients.png" alt="" title="" class="person-blue">
                <span class="number-up">192</span>
                <p class="icons-title">Pacientes</p>

                <div class="icons-pacients2">
                <img src="/nutrion/app/public/images//dashboard/icon_patients.png" alt="" title="" class="person-blue-green">
                <span class="number-up">192</span>
                <p class="icons-title">Pacientes</p>

                <div class="icons-pacients3">
                <img src="/nutrion/app/public/images//dashboard/icon_patients.png" alt="" title="" class="person-green">
                <span class="number-up">192</span>
                <p class="icons-title">Pacientes</p>
            </section>

            <section class="table">
                <div class="container">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Manage <b>Employees</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                            <label for="checkbox1"></label>
                                        </span>
                                    </td>
                                    <td>Thomas Hardy</td>
                                    <td>thomashardy@mail.com</td>
                                    <td>89 Chiaroscuro Rd, Portland, USA</td>
                                    <td>(171) 555-2222</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox2" name="options[]" value="1">
                                            <label for="checkbox2"></label>
                                        </span>
                                    </td>
                                    <td>Dominique Perrier</td>
                                    <td>dominiqueperrier@mail.com</td>
                                    <td>Obere Str. 57, Berlin, Germany</td>
                                    <td>(313) 555-5735</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                            <label for="checkbox3"></label>
                                        </span>
                                    </td>
                                    <td>Maria Anders</td>
                                    <td>mariaanders@mail.com</td>
                                    <td>25, rue Lauriston, Paris, France</td>
                                    <td>(503) 555-9931</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox4" name="options[]" value="1">
                                            <label for="checkbox4"></label>
                                        </span>
                                    </td>
                                    <td>Fran Wilson</td>
                                    <td>franwilson@mail.com</td>
                                    <td>C/ Araquil, 67, Madrid, Spain</td>
                                    <td>(204) 619-5731</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>					
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox5" name="options[]" value="1">
                                            <label for="checkbox5"></label>
                                        </span>
                                    </td>
                                    <td>Martin Blank</td>
                                    <td>martinblank@mail.com</td>
                                    <td>Via Monte Bianco 34, Turin, Italy</td>
                                    <td>(480) 631-2097</td>
                                    <td>
                                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Previous</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">Next</a></li>
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
                <!-- Edit Modal HTML -->
                <div id="editEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Edit Employee</h4>
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
                                    <input type="submit" class="btn btn-info" value="Save">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">						
                                    <h4 class="modal-title">Delete Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">					
                                    <p>Are you sure you want to delete these Records?</p>
                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>            
        </section>       
    </main>
</body>






<!--
<body>
    <main class="dashboard">
        <aside class="dashboard-menu">
            <p>Menu</p>
        </aside>
        <section class="dashboard-main">
            <header class="dashboard-header">
                <p>Header</p>
            </header>
            <div class="dashboard-content">
                <!-- <p>Seja bem vindo</p></br> -->
                <!-- <h1 class="form-title">Atualizar Dados</h1> -->
                <!--<form method="POST" action="/nutrion/nutricionista/update" class="form-content">
                    <span class="form-field">
                        <label for"nomeupdate">Nome</label>
                        <input class="js-input-field" type="text" name="nome" id="nomeupdate" pattern="[a-zA-Z\s]{2,40}" title="Digite um nome válido, com no máximo 40 caracteres" required>
                    </span>
                    <span class="form-field">
                        <label for"emailupdate">Email</label>
                        <input class="js-input-field" type="email" name="email" id="emailupdate" required>
                    </span>
                    <span class="form-field">
                        <label for"senhaupdate">Senha</label>
                        <input class="js-input-field" type="password" name="senha" id="senhaupdate" required>
                    </span>
                    <input type="submit" value="Atualizar" class="form-button" name="atualizar">
                </form>
                <a href="/nutrion/nutricionista/delete">Delete</a></br>
                <a href="/nutrion/nutricionista/update">Update</a></br>
            </div>
            <footer class="dashboard-footer">
                <p>Footer</p>
            </footer>
        </section>
    </main>
    <script type="text/javascript" src="/nutrion/app/public/js/config.js"></script>
    <script type="text/javascript" src="/nutrion/app/public/js/app.js"></script>
</body>-->
</html>