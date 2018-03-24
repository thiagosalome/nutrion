<?php
    /*Passos:
    Criar class DB
    Criar atributo privado $conn
    Criar método getConnection passando os dados de conexão para o $conn
    Criar método execSQL passando a variável $sql como parâmetro
    Criar método __destruct para encerrar a conexão ($this->conn->close())
    */

    /**
     * Classe de conexão e interação com o Banco de Dados
     */
    class DB{
        private $conn;

        /**
         * Método de conexão com o Banco de Dados
         *
         * @return void
         */
        public function getConnection(){
            $this->conn = new mysqli("localhost", "root", "", "db_nutrion");
        }

        /**
         * Utilizar esse método apenas para select
         *
         * @param [type] $sql
         * @return void
         */
        public function execReader($sql){
            return $this->conn->query($sql);
        }

        /**
         * Utilizar esse método quando for necessário passar parâmetros
         *
         * @param [type] $sql
         * @return void
         */
        public function execSQL($sql){
            return $this->conn->prepare($sql);
        }

        /**
         * Função para fechar conexão
         */
        public function __destruct(){
            $this->conn->close();
        }
    }

?>