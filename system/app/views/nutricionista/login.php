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
    <title>Login</title>
</head>
<body>
    <main class="main">
        <header class="main-header">
            <img src="/nutrion/system/app/public/images/logo.png" alt="" title="" class="header-logo">
        </header>
        <div class="main-block">
            <div class="block-description js-block-description" data-position="left">
                <img src="/nutrion/system/app/public/images/logo_mini.png" alt="" class="description-logo">
                <p class="description-project">NutriOn é um sistema que busca ajudar os nutricionistas a gerenciarem a alimentação dos seus pacientes</p>
                <button name="description-button" class="description-button js-btn-slide-block">Cadastrar</button>
            </div>
            <div class="block-form block-form-log js-form-log">
                <h1 class="form-title">Login</h1>
                <form method="POST" action="/nutrion/system/nutricionista/logar" class="form-content">
                    <span class="form-field">
                        <label for="emaillog">Email</label>
                        <input class="js-input-field" type="text" name="email" id="emaillog" required><br>
                    </span>
                    <span class="form-field">
                        <label for="senhalog">Senha</label>
                        <input class="js-input-field" type="password" name="senha" id="senhalog" required><br>
                    </span>
                    <input type="submit" value="login" name="login">
                </form>
                <a href="" class="form-forgot">Esqueceu a senha?</a>
            </div>
            <div class="block-form block-form-cad js-form-cad">
                <h1 class="form-title">Cadastro</h1>
                <form method="POST" action="/nutrion/system/nutricionista/logar" class="form-content">
                    <span class="form-field">
                        <label for"nomecad">Nome</label>
                        <input class="js-input-field" type="text" name="nome" id="nomecad" required>
                    </span>
                    <span class="form-field">
                        <label for"emailcad">Email</label>
                        <input class="js-input-field" type="text" name="email" id="emailcad" required>
                    </span>
                    <span class="form-field">
                        <label for"senhacad">Senha:</label>
                        <input class="js-input-field" type="password" name="senha" id="senhacad" required>
                    </span>
                    <input type="submit" value="Cadastrar" class="form-button" name="cadastrar">
                </form>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="/nutrion/system/app/public/js/config.js"></script>
    <script type="text/javascript" src="/nutrion/system/app/public/js/app.js"></script>
</body>
</html>