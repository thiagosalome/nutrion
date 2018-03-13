<?php
/*
    Passos:
        Verificar se existe um get chamado controller
            Fazer uma inclusão dinâmica do arquivo controller referente
            Criar uma variável $class que recebe o nome da classe controller incluída
            Criar uma instância utilizando o método eval para ler string e transformar em código;
                Ex: eval("\$controller = new $class()")

            Verificar se existe um get chamado action
                Executar o método da insância dinâmicamente a partir da action utilizando o eval
                    Ex: eval("\$controller->" . $_GET['Action'] . " ();");

*/
    if(isset($_GET["Controller"])){
        include "app/controllers/" . $_GET["Controller"] . "Controller.php";

        $class = $_GET["Controller"] . "Controller";
        eval("\$controller = new $class();");
        
        if(isset($_GET["Action"])){
            eval("\$controller->" . $_GET['Action'] . " ();");
        }
    }
?>