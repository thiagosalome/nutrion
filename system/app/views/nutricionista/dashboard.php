<?php
    session_start();
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
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
                <p>Seja bem vindo <?php echo $email; ?></p></br>
                <a href="/nutrion/system/nutricionista/delete">delete</a></br>
                <a href="/nutrion/system/nutricionista/update">uptade</a></br>                
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