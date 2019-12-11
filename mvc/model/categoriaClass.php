<?php
    /*
        * CLASSE REFERENTE AO OBJETO CATEGORIA
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 04/12/19
        * MODIFICAÇÕES:
         -> DATA: 
            ALTERAÇÕES REALIZADAS: 
            NOME DO DESENVOLVEDOR: 
    */
    class Categoria{
        //Atributos
        private $codigo;
        private $nome;
        private $status;

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
        //GETTERS AND SETTERS DO STATUS
        public function getStatus()
        {
            return $this->status;
        }
        public function setStatus($status)
        {
            $this->status = $status;
        }
    }
?>