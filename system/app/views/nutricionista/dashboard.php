<?php
    session_start();
    if(isset($_SESSION["loggeduser"])){
        $email = $_SESSION["loggeduser"];
    }
    else{
        header("Location: /nutrion/system/");
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
    <link rel="stylesheet" href="/nutrion/system/app/public/css/style.css">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- site title -->
    <title>Dashboard</title>
</head>
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
                <p>Seja bem vindo <?php  echo $email; ?></p></br>
                <!-- <p>Seja bem vindo</p></br> -->
                <!-- <h1 class="form-title">Atualizar Dados</h1> -->
                <!--<form method="POST" action="/nutrion/system/nutricionista/update" class="form-content">
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
                </form>-->
                <a href="/nutrion/system/nutricionista/delete">Delete</a></br>
                <a href="/nutrion/system/nutricionista/update">Update</a></br>
            </div>
            <footer class="dashboard-footer">
                <p>Footer</p>
            </footer>
        </section>
    </main>
    <script type="text/javascript" src="/nutrion/system/app/public/js/config.js"></script>
    <script type="text/javascript" src="/nutrion/system/app/public/js/app.js"></script>
</body>
</html>