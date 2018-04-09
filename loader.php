<?php

// Evita que usuários acessem este arquivo diretamente
if (!defined('ABSPATH')) exit;
 
// Verifica o modo para debugar
if (!defined('DEBUG') || DEBUG === false ) {
    // Esconde todos os erros
    error_reporting(0);
    ini_set("display_errors", 0); 
}else {
    // Mostra todos os erros
    error_reporting(E_ALL);
    ini_set("display_errors", 1); 
}

// Carrega a aplicação
require_once "Routes.php";
$routes = new Routes();

?>