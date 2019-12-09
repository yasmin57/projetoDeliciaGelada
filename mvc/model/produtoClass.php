<?php
    //Cria a classe
    class Produto{
        //Cria atributos com os campos do bd
        private $codigo;
        private $nome;
        private $descricao;
        private $preco;
        private $foto;
        private $categoria;
        private $subcategoria;
        private $destaque;
        private $texto;
        private $fotodestaque;
        private $status;
        private $desconto;

        //Construtor da classe
        public function __construct(){}

        //GETTERS E SETTERS DO CODIGO
        public function getCodigo(){
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        //GETTERS E SETTERS DO NOME
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        //GETTERS E SETTERS DA DESCRICAO
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        //GETTERS E SETTERS DO PRECO
        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($preco){
            $this->preco = $preco;
        }

        //GETTERS E SETTERS DA FOTO
        public function getFoto(){
            return $this->foto;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }

        //GETTERS E SETTERS DA CATEGORIA
        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

        //GETTERS E SETTERS DA SUBCATEGORIA
        public function getSubcategoria(){
            return $this->subcategoria;
        }
        public function setSubcategoria($subcategoria){
            $this->subcategoria = $subcategoria;
        }

        //GETTERS E SETTERS DO DESTAQUE
        public function getDestaque(){
            return $this->destaque;
        }
        public function setDestaque($destaque){
            $this->destaque = $destaque;
        }

        //GETTERS E SETTERS DO TEXTO
        public function getTexto(){
            return $this->texto;
        }
        public function setTexto($texto){
            $this->texto = $texto;
        }

        //GETTERS E SETTERS DA FOTO DESTAQUE
        public function getFotoDestaque(){
            return $this->fotodestaque;
        }
        public function setFotoDestaque($fotodestaque){
            $this->fotodestaque = $fotodestaque;
        }

        //GETTERS E SETTERS DO DESCONTO
        public function getDesconto(){
            return $this->desconto;
        }
        public function setDesconto($desconto){
            $this->desconto = $desconto;
        }
        
        //GETTERS E SETTERS DO STATUS
        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }
    }
?>