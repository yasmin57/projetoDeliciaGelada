<?php
    /*
        * CLASSE REFERENTE AO OBJETO SUBCATEGORIA
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 06/12/19
        * MODIFICAÇÕES:
         -> DATA: 11/12/19
            ALTERAÇÕES REALIZADAS: Atualizações dos atributos, getters e setters
            NOME DO DESENVOLVEDOR: YASMIN PEREIRA DA SILVA
    */
    class Subcategoria{

        //Atributos
        private $codigo;
        private $descricao;
        private $status;
        private $nome;
        //private $codigoCategoria;

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
    }
?>