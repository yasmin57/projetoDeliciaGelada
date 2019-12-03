<?php
    class Categoria{
        //Atributos
        private $codigo;
        private $nome;

        public function __construct(){}

        //GETTERS AND SETTERS DO CODIGO
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        
        //GETTERS AND SETTERS DO NOME
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
    }
?>