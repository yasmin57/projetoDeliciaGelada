<?php
    //Cria a classe
    class Produto{
        //Cria atributos com os campos do bd
        private $codigo;
        private $nome;
        private $descricao;
        private $preco;
        private $foto;
        private $status;
        private $destaque;
        private $textoDest;
        private $fotoDest;
        private $backDest;
        private $desconto;

        //Construtor da classe
        public function __construct(){}

        
        public function getCodigo(){ //GETTERS E SETTERS DO CODIGO
            return $this->codigo;
        }
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getNome(){ //GETTERS E SETTERS DO NOME
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getDescricao(){ //GETTERS E SETTERS DA DESCRICAO
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getPreco(){ //GETTERS E SETTERS DO PRECO
            return $this->preco;
        }
        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function getFoto(){ //GETTERS E SETTERS DA FOTO
            return $this->foto;
        }
        public function setFoto($foto){
            $this->foto = $foto;
        }
        
        public function getStatus(){ //GETTERS E SETTERS DO STATUS
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }

        public function getDestaque(){ //GETTERS E SETTERS DO DESTAQUE
            return $this->destaque;
        }
        public function setDestaque($destaque){
            $this->destaque = $destaque;
        }

        public function getTextoDest(){ //GETTERS E SETTERS DO TEXTO DO DESTAQUE
            return $this->textoDest;
        }
        public function setTexto($textoDest){
            $this->textoDest = $textoDest;
        }

        public function getFotoDest(){ //GETTERS E SETTERS DA FOTO DESTAQUE
            return $this->fotoDest;
        }
        public function setFotoDest($fotoDest){
            $this->fotoDest = $fotoDest;
        }

        public function getBackDest(){ //GETTERS E SETTERS DO BACKGROUND DESTAQUE
            return $this->backDest;
        }
        public function setFotoDestaque($backDest){
            $this->backDest = $backDest;
        }
        
        public function getDesconto(){ //GETTERS E SETTERS DO DESCONTO
            return $this->desconto;
        }
        public function setDesconto($desconto){
            $this->desconto = $desconto;
        }
        
        
    }
?>