<?php

/**
 * Gerencia as models, views e controllers
 */
class Routes{
    private $controller; // Receberá o valor do controlador
    private $action; // Receberá a ação do controlador
    private $params; // Receberá um array dos parâmetros
    private $not_found = "404.php"; // Caminho da página não encontrada

    public function __construct () {

        if(isset($_GET["Controller"])){
            $this->controller = $_GET["Controller"];
            
            include "app/controllers/" . $this->controller . "Controller.php";
    
            $class = $this->controller. "Controller";
            eval("\$controller = new $class();");
            
            if(isset($_GET["Action"])){
                $this->action = $_GET["Action"];
                eval("\$controller->" . $this->action . "();");
            }
                
        }
    }
}

?>