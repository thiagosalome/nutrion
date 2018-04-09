<?php
/**
 * Configuração Geral
 */

// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );

// URL da home
define( 'HOME_URI', 'http://127.0.0.1/');
 
// Nome do host da base de dados
define( 'HOSTNAME', 'localhost');
 
// Nome do DB
define( 'DB_NAME', 'db_nutrion');
 
// Usuário do DB
define( 'DB_USER', 'root');
 
// Senha do DB
define( 'DB_PASSWORD', '');
 
// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', false );


// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';

?>