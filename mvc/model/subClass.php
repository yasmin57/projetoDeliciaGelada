<?php
    class Subcategoria{

        //Atributos
        private $codigo;
        private $descricao;
        private $idCategoria;
        private $status;
        private $nome;
        private $codigoCategoria;

        //Construtor
        public function __construct(){}

        //GETTERS E SETTERS
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        //Nome
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        //IdCategoria
        public function getIdCategoria(){
            return $this->idCategoria;
        }
        public function setIdCategoria($idCategoria){
            $this->idCategoria = $idCategoria;
        }
        //Status
        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }
        //Nome e codigo da categoria
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getCodigoCategoria(){
            return $this->codigoCategoria;
        }
        public function setCodigoCategoria($codigoCategoria){
            $this->codigoCategoria = $codigoCategoria;
        }

    }
?>