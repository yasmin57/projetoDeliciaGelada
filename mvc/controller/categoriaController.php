<?php
    class CategoriaController{
        //Variaveis
        private $categoria;
        private $categoriaDAO;

        //Construtor
        public function __construct()
        {
            require_once('model/categoriaClass.php');
            require_once('model/DAO/categoriaDAO.php');

            //Verifica se o método é post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Instancia da classe categoria
                $this->categoria = new Categoria();

                //Resgata o dado via post
                $this->categoria->setNome($_POST['txtnome']);
            }
            
            //Instancia da classe DAO
            $this->categoriaDAO = new CategoriaDAO();
        }

        //Método p/ inserir
        public function novaCategoria(){

            $this->categoria->setStatus(1);

            //Chama o método p/ inserir
            if($this->categoriaDAO->insertCategoria($this->categoria))
                header('location:categoria.php');
            else
                echo('Erro ao inserir registro no bd');
        }

        //Método p/ editar
        public function editaCategoria($idCategoria){

            $this->categoria->setCodigo($idCategoria);

            if($this->categoriaDAO->updateCategoria($this->categoria))
                header('location:categoria.php');
            else
                echo('Erro ao atualizar registro no bd');
        }

        //Método p/ deletar
        public function excluiCategoria($idCategoria){
            //Chama o método p excluir passando o id
            if($this->categoriaDAO->deleteCategoria($idCategoria))
                header('location:categoria.php');
            else
                echo('Erro ao deletar registro no bd');
        }

        //Método p/ listar
        public function listaCategoria(){
            $list = $this->categoriaDAO->selectAllCategoria();

            if($list)
                return $list;
            else
                die();
        }

        //Método p/ listar por id
        public function buscaCategoria($idCategoria){

            $dadosCategoria = $this->categoriaDAO->selectByIdCategoria($idCategoria);

            require_once('categoria.php');
        }

        //Método p/ mudar o status
        public function statusCategoria($idCategoria, $statusCategoria){
            //Instancia da classe categoria
            $this->categoria = new Categoria();
            
            //Verifica o valor do status e muda
            if($statusCategoria == 1)
                $status = 0;
            else
                $status = 1;

            $this->categoria->setCodigo($idCategoria);
            $this->categoria->setStatus($status);

            if($this->categoriaDAO->statusCategoria($this->categoria))
                header('location:categoria.php');
            else
                echo('Erro ao atualizar registro no bd');

        }
    }
?>