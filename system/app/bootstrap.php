<?php

// Arquivo responsável por efetuar o carregamento do doctrine

// Requisitar o autoload
require_once "vendor/autoload.php";

// Chamar os uses do Doctrine
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Definir o caminho das entidades do projeto
$entidades = array("models/");

// Definir se é modo desenvolvedor ou não
$isDevMode = true;

// Definir as configurações de conexão
$conect = array(
    "driver" => "pdo_mysql",
    "user" => "root",
    "password" => "web1507",
    "dbname" => "db_nutrion"
);

// Setar as configurações definidas
$config = Setup::createAnnotationMetadataConfiguration($entidades,$isDevMode);

// Criar o Entity Manager com base nas configurações de dev e banco de dados
$entityManager = EntityManager::create($conect, $config);

?>