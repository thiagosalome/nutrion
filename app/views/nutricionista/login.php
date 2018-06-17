<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- meta tags -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link css -->
    <link rel="stylesheet" href="<?php echo HOME_URI; ?>app/public/css/login.css">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- site title -->
    <title>Login</title>
</head>
<body>
    <main class="main">
        <header class="main-header">
            <img src="<?php echo HOME_URI; ?>app/public/images/logo.png" alt="" title="" class="header-logo">
        </header>
        <div class="main-block">
            <div class="block-description js-description" data-position="left">
                <img src="<?php echo HOME_URI; ?>app/public/images/logo_mini.png" alt="" class="description-logo">
                <p class="description-project">Nutrion é um sistema que busca ajudar os nutricionistas a gerenciarem a alimentação dos seus pacientes</p>
                <button name="description-button" class="description-button js-btn-slider">Cadastrar</button>
            </div>
            <div class="block-form block-form-log js-form-log flex-smaller">
                <h1 class="form-title">Login</h1>
                <form action="<?php echo HOME_URI; ?>nutricionista/signIn" class="form-content js-form-signin">
                    <span class="form-field">
                        <label for="emaillog">Email</label>
                        <input class="js-input-field" type="email" name="email" id="emaillog" required><br>
                    </span>
                    <span class="form-field">
                        <label for="senhalog">Senha</label>
                        <input class="js-input-field" type="password" name="senha" id="senhalog" required><br>
                    </span>
                    <input type="submit" value="login" name="login">
                </form>
                <a href="" class="form-forgot">Esqueceu a senha?</a>
                <a href="<?php echo HOME_URI; ?>nutricionista/signIn?api=google" class="form-google">Login com Google</a>
            </div>
            <div class="block-form block-form-cad js-form-cad flex-bigger">
                <h1 class="form-title">Cadastro</h1>
                <form action="<?php echo HOME_URI; ?>API/nutricionista/" method="POST" class="form-content js-form-signup">
                    <span class="form-field">
                        <label for"nomecad">Nome</label>
                        <input class="js-input-field" type="text" name="nome" id="nomecad" pattern="[a-zA-Z\s]{2,40}" title="Digite um nome válido, com no máximo 40 caracteres" required>
                    </span>
                    <span class="form-field">
                        <label for"emailcad">Email</label>
                        <input class="js-input-field" type="email" name="email" id="emailcad" required>
                    </span>
                    <span class="form-field">
                        <label for"senhacad">Senha</label>
                        <input class="js-input-field" type="password" name="senha" id="senhacad" required>
                    </span>
                    <input type="submit" value="Cadastrar" class="form-button" name="cadastrar">
                </form>
            </div>
        </div>
        <div class="response">
            <p class='response-message js-message'></p>
            <img src="<?php echo HOME_URI; ?>app/public/images/ajax-loader.gif" class="response-load js-load" title="Carregando..." alt="Carregando...">
        </div>
    </main>
    <script type="text/javascript" src="<?php echo HOME_URI; ?>app/public/js/app.js"></script>
</body>
</html>