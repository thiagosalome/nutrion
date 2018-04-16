<?php
/**
 * Configuração Geral
 */

// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );

// Pega o host
$host = $_SERVER["HTTP_HOST"];
if($host == "localhost" || $host == "127.0.0.1"){
    define('HOME_URI', '/nutrion/'); // URL da home
    define( 'HOSTNAME', 'localhost'); // Nome do host da base de dados
    define( 'DB_NAME', 'db_nutrion'); // Nome do DB
    define( 'DB_USER', 'root'); // Usuário do DB
    define( 'DB_PASSWORD', 'web1507'); // Senha do DB
}
else{
    define('HOME_URI', 'https://nutrion.azurewebsites.net/'); // URL da home

    foreach ($_SERVER as $key => $value) { 
        if (strpos($key, "MYSQLCONNSTR_") !== 0) { 
            continue; 
        } 

        $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value); 
        $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value); 
        $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value); 
        $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value); 
    }

    define('HOSTNAME', $servername); // Nome do host da base de dados
    define('DB_NAME', $dbname); // Nome do DB
    define('DB_USER', $username); // Usuário do DB
    define('DB_PASSWORD', $password); // Senha do DB
}
 
// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', false );

// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';

?>