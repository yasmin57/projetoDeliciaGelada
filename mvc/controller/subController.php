<?php
    class SubcategoriaController{
        //Variaveis
        private $sub;
        private $subDAO;

        //Construtor da classe
        public function __construct(){
            //Importe
            require_once('model/subClass.php');
            require_once('model/DAO/subDAO.php');

            //Verifica se o método é post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Instancia da classe categoria
                $this->sub = new Subcategoria();

                //Resgata o dado via post
                $this->sub->setDescricao($_POST['txtnome']);
                $this->sub->setIdCategoria($_POST['sltcategorias']);
            }

            //Instancia da classe DAO
            $this->subDAO = new SubcategoriaDAO();
        }

        //Nova subcategoria
        public function novaSubcategoria(){
            $this->sub->setStatus(1);

            if($this->subDAO->insertSubcategoria($this->sub))
                header('location:sub.php');
            else
                echo('erro ao inserir no banco');
        }

        //Atualiza subcategoria
        public function editaSubcategoria($idSubcategoria){

            $this->sub->setCodigo($idSubcategoria);

            if($this->subDAO->updateSubcategoria($this->sub))
                header('location:sub.php');
            else
                echo('erro ao inserir no banco');
            
        }

        //Exclui uma subcategoria
        public function excluiSubcategoria(){
            
        }

        //Muda status de uma subcategoria
        public function statusSubcategoria(){
            
        }

        //Seleciona todas as subcategorias
        public function listaSubcategoria(){
            $list = $this->subDAO->selectAllSubcategoria();

            if($list)
                return $list;
            else
                die();
        }

        //Busca uma subcategoria pelo seu codigo
        public function buscaSubcategoria($idSubcategoria){
            $dadosSub = $this->subDAO->selectByIdSubcategoria($idSubcategoria);

            require_once('sub.php');
        }
    }
?>