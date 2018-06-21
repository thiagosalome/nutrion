<?php
/**
 * Configuração Geral
 */

// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );

// Pega o host
$host = $_SERVER["HTTP_HOST"];
if(strpos($host, "nutrion.azurewebsites") !== false){
    // URL da home
    foreach ($_SERVER as $key => $value) { 
        if (strpos($key, "MYSQLCONNSTR_") !== 0) { 
            continue; 
        } 

        $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value); 
        $dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value); 
        $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value); 
        $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value); 
    }
    
    define('HOME_URI', 'https://nutrion.azurewebsites.net/'); 
    define('HOSTNAME', $servername); // Nome do host da base de dados
    define('DB_NAME', $dbname); // Nome do DB
    define('DB_USER', $username); // Usuário do DB
    define('DB_PASSWORD', $password); // Senha do DB
}
else{
    define('HOME_URI', '/nutrion/'); // URL da home
    define( 'HOSTNAME', 'localhost'); // Nome do host da base de dados
    define( 'DB_NAME', 'db_nutrion'); // Nome do DB
    define( 'DB_USER', 'root'); // Usuário do DB
    define( 'DB_PASSWORD', 'web1507'); // Senha do DB
}

$CALLBACK_URL = "http://localhost/vhosts/OAuthApp/OAuthCallback.php";

define("CALLBACK_URL", "http://localhost/nutrion/nutricionista/apiCallback");
define("GOOGLE_API_AUTH_URL", "https://accounts.google.com/o/oauth2/auth");
define("GOOGLE_API_TOKEN_URL","https://accounts.google.com/o/oauth2/token");
// define("GOOGLE_API_RESOURCE_URL","https://www.googleapis.com/oauth2/v2/userinfo");
define("GOOGLE_API_RESOURCE_URL","https://www.googleapis.com/plus/v1/people/me");
define("GOOGLE_CLIENT_ID","352421827967-f0nf6kmqqd0815umsno5a096jf5rp6h7.apps.googleusercontent.com");
define("GOOGLE_CLIENT_SECRET_KEY","bOsmzCizL6e1itYWBQEtpo9w");
// define("GOOGLE_SCOPE","https://www.googleapis.com/auth/plus.me");
define("GOOGLE_SCOPE","https://www.googleapis.com/auth/userinfo.email");

// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', false );

// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';

?>