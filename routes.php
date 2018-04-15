<?php

/**
 * Gerencia as models, views e controllers
 */
class Routes{
    private $controller; // Receberá o valor do controlador
    private $action; // Receberá a ação do controlador
    private $controller_dashboard; // Receberá o valor do controlador
    private $action_dashboard; // Receberá o valor do controlador
    private $params; // Receberá um array dos parâmetros
    private $not_found = "404.php"; // Caminho da página não encontrada

    public function __construct () {

        if(isset($_GET["Controller"])){
            $this->controller = $_GET["Controller"];
            
            if($this->controller == "nutricionista"){
                include "app/controllers/" . $this->controller . "Controller.php";
        
                $class = $this->controller. "Controller";
                eval("\$controller = new $class();");
                
                if(isset($_GET["Action"])){
                    $this->action = $_GET["Action"];
                    eval("\$controller->" . $this->action . " ();");
                }
                else if(isset($_GET["ControllerDashboard"])){
                    $this->controller_dashboard = $_GET["ControllerDashboard"];
                    include "app/controllers/" . $this->controller_dashboard . "Controller.php";
                    
                    $class_dashboard = $this->controller_dashboard . "Controller";
                    eval("\$controller_dashboard = new $class_dashboard();");
                    
                    if(isset($_GET["ActionDashboard"])){
                        $this->action_dashboard = $_GET["ActionDashboard"];
                        eval("\$controller_dashboard->" . $this->action_dashboard . " ();");
                    }
                }
            }
        }
    }
}

?>