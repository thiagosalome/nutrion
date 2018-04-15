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

    <link rel="stylesheet" href="<?php echo HOME_URI; ?>app/public/css/dashboard.css">
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
        <?php include "objects/menu.php"; ?>
        <section class="dashboard">
            <header class="dashboard-header">
                <div class="header-top">
                    <div class="container">
                        <div class="header-perfil">
                            <p class="perfil-name">Thiago Gonçalves</p>
                            <img class="perfil-arrow" src="" alt="" title="">
                        </div>
                        <div class="header-search">
                            <img class="search-icon" src="<?php echo HOME_URI; ?>app/public/images/dashboard/icon_search.png" alt="" title="">
                            <input class="search-input" type="text" name="search" id="">
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="container">
                        <h1 class="header-title">Adicionar Paciente</h1>
                    </div>
                </div>
            </header>
            <div class="dashboard-statistics">
                <div class="container">
                    <div class="statistics-item">
                        <div class="statistics-item-image">
                            <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/patients_icon.png" alt="" title="" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span>192</span>
                            <p>Pacientes</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image">
                            <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/patients_icon.png" alt="" title="" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span>192</span>
                            <p>Pacientes</p>
                        </div>
                    </div>
                    <div class="statistics-item">
                        <div class="statistics-item-image">
                            <img src="<?php echo HOME_URI; ?>app/public/images/dashboard/patients_icon.png" alt="" title="" class="person-blue">
                        </div>
                        <div class="statistics-item-description">
                            <span>192</span>
                            <p>Pacientes</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>       
    </main>
</body>
</html>