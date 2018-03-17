<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/nutrion/system/app/public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="main">
        <header class="main-header">
            <img src="/nutrion/system/app/public/images/logo.png" alt="" class="header-logo">
        </header>
        <div class="main-block">
            
            <div class="block-description">
                <img src="/nutrion/system/app/public/images/logo_mini.png" alt="" class="description-logo">
                <p>Nutrion é um sistema que busca ajudar os nutricionistas a gerenciarem a alimentação dos seus pacientes</p>
                <button name="description-button" id="description-button">CADASTRAR</button>
            </div>

            <div class="block-form">
                <h1>Login</h1>
                <form method="POST" action="/nutrion/system/nutricionista/logar" class="form-login">
                    <label>Email:</label>
                    <input type="text" name="email" id="email"required><br>
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha"><br>
                    <input type="submit" value="LOGIN" id="login" name="login"required>
                </form>
                <a href="" id="esqueceu">Esqueceu a senha? </a>
            </div>
        </div>
    </main>
</body>
</html>