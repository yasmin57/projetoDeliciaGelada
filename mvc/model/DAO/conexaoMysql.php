<?php
    class ConexaoMysql{
        //Atributos
        private $server;
        private $user; 
        private $password; 
        private $database; 

        public function __construct(){
            $this->server="localhost";
            $this->user="root";
            $this->password="bcd127";
            $this->database="dbcontatos2019projeto";
        }

        //Método p/ conexão
        public function connectDatabase(){
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='
                                .$this->database, $this->user, $this->password);
                return $conexao;
            }
            catch(PDOException $erro){
                echo("Erro ao realizar conexão com o BD <br> 
                      Linha: ".$erro->getLine()." <br> 
                      Mensagem: ".$erro->getMessage());
            }
        }
    }

?>