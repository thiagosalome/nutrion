<?php

/**
 * Gerencia as models, views e controllers
 */
class Routes{
    private $route; // Receberá o valor do controlador
    private $action; // Receberá a ação do controlador
    private $params; // Receberá um array dos parâmetros
    private $not_found = "404.php"; // Caminho da página não encontrada

    public function __construct () {
        if(isset($_GET["Route"])){
            $this->route = $_GET["Route"];
        
            include "app/routes/" . $this->route . "Route.php";
    
            $class = $this->route . "Route";
            eval("\$route = new $class();");
            
            if(isset($_GET["Action"])){
                $this->action = $_GET["Action"];
                eval("\$route->" . $this->action . "();");
            }
        }
        else if(isset($_GET["Controller"])){
            $method = $_SERVER['REQUEST_METHOD'];   // Identifica a requisição
            $controller = $_GET["Controller"];    // Identifica os parâmetros
            //Deve-se pegar os parâmetros da url

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
        }
    }
}

?>