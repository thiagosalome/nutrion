<?php
require "app/class/json.php";
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
            $apiKey = $_SERVER['HTTP_APIKEY']; //Identifica a chave de api 

            if($apiKey != null){
                require "app/routes/nutricionistaRoute.php";
                $nutricionistaRoute = new nutricionistaRoute;
                $validateAPI = $nutricionistaRoute->validateKey($apiKey);

                // Valida a chave de api
                if($validateAPI == true){
                    $method = $_SERVER['REQUEST_METHOD'];   // Identifica a requisição
                    $controller = $_GET["Controller"];    // Identifica os parâmetros
                    
                    include "app/controllers/" . $controller . "Controller.php";
                    $class = $controller. "Controller";
                    eval("\$controller = new $class();");
        
                    switch($method){
                        case "GET":
                            if(isset($_GET["id"])){
                                $controller->get($_GET);
                            }
                            else{
                                $uri = $_SERVER['REQUEST_URI'];
                                $url = explode("?", $uri);
                                $query = explode("=", $url[1]);
                                $index = $query[0];
                                $value = $query[1];
                                
                                $params_array = array();
                                $params_array[$index] = $value;
        
                                $controller->get($params_array);
                            }
                        break;
                    
                        case "POST":
                            $controller->create();
                        break;
                    
                        case "PUT":
                            parse_str(file_get_contents('php://input'), $_PUT);
                            $controller->update($_PUT);
                        break;
                        
                        case "DELETE":
                            parse_str(file_get_contents('php://input'), $_DELETE);
                            $controller->delete($_DELETE);
                        break;
                    }
                }
                else{
                    echo json::generate("Conflito", "409", "A chave de API passada é inválida!", null);
                }
            }
            else{
                echo json::generate("Conflito", "409", "Necessário passar a chave de API (apikey) no cabeçalho da requisição.", null);
            }
        }
    }
}

?>