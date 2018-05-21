<?php

$method = $_SERVER['REQUEST_METHOD'];   // Identifica a requisição
$controller = $_GET["Controller"];    // Identifica os parâmetros

include "app/controllers/" . $controller . "Controller.php";
$class = $controller. "Controller";
eval("\$controller = new $class();");

switch($method){
    case "GET":
    $controller->getAll();
    
    break;

    case "POST":
    $controller->create();

    break;

    case "PUT":
    $controller->update();

    break;
    
    case "DELETE":
    $controller->delete();

    break;
}


?>