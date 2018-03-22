<?php
    session_start();
    $email = $_SESSION["email"];
    echo "Seja bem vindo ao sistema NutriON Sr. " .$email;
?>