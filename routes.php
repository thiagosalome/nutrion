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
        $this->controller = $_GET["Controller"];
        $this->action = $_GET["Action"];

        if(isset($this->controller)){
            include "app/controllers/" . $this->controller . "Controller.php";
    
            $class = $this->controller. "Controller";
            eval("\$controller = new $class();");
            
            if(isset($this->action)){
                eval("\$controller->" . $this->action . " ();");
            }
        }
    }
}

?>