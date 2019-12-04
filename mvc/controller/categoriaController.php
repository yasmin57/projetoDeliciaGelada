<?php
    class CategoriaController{
        //Variaveis
        private $categoria;
        private $categoriaDAO;

        //Construtor
        public function __construct()
        {
            //Verifica se o método é post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                require_once('model/categoriaClass.php');
                require_once('model/DAO/categoriaDAO.php');

                //Instancia da classe categoria
                $this->categoria = new Categoria();

                //Resgata o dado via post
                $this->categoria->setNome($_POST['txtnome']);
            }
            else{
                //Importe dos arquivos
                require_once('../../model/categoriaClass.php');
                require_once('../../model/DAO/categoriaDAO.php');
            }
            //Instancia da classe DAO
            $this->categoriaDAO = new CategoriaDAO();
        }

        //Método p/ inserir
        public function novaCategoria(){
            //Chama o método p/ inserir
            if($this->categoriaDAO->insertCategoria($this->categoria))
                header('location:view/categorias/adm_categorias.php');
            else
                echo('Erro ao inserir registro no bd');
        }

        //Método p/ editar
        public function editaCategoria(){}

        //Método p/ deletar
        public function excluiCategoria($idCategoria){
            //Chama o método p excluir passando o id
            if($this->categoriaDAO->deleteCategoria($idCategoria))
                header('location:view/categorias/adm_categorias.php');
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
        public function buscaCategoria(){}

    }
?>