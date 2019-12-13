<?php
    class ProdutoController{
        //Variaveis
        private $produto;
        private $produtoDAO;
        
        //Construtor
        public function __construct()
        {
            if(!isset($_SESSION))
                session_start();

            require_once('model/produtoClass.php');
            require_once('model/DAO/produtoDAO.php');

            //Verifica se o método é post
            if($_SERVER['REQUEST_METHOD'] == 'POST' ){

                //Instancia da classe categoria
                $this->produto = new Produto();

                if($_GET['modo'] == 'editar' || $_GET['modo'] == 'novo')
                {
                    //Resgata o dado via post
                    $this->produto->setNome($_POST['txtnome']);
                    $this->produto->setDescricao($_POST['txtdescricao']);
                    $this->produto->setPreco($_POST['txtpreco']); 
                    $this->produto->setFoto($_SESSION['previewFoto']);
                    $this->produto->setCategoria($_SESSION['codecategoria']); 
                    $this->produto->setDesconto($_POST['txtdesconto']);
                }
                
            }
            $this->produtoDAO = new ProdutoDAO();
        }

        public function acionaFormDestaque(){
            $_SESSION['chkdestaque'] = $_POST['chkdestaque'];

            

            echo('');
        }

        //Método p/ inserir
        public function novoProduto(){
            //Atribui um valor ao status
            $this->produto->setStatus(1);
        }
  
        //Método p/ editar
        public function editaProduto($idCategoria){
        }

        //Método p/ deletar
        public function excluiProduto($idCategoria){
        }

        //Método p/ listar
        public function listaProduto(){
            
        }

        //Método p/ listar por id
        public function buscaProduto($idCategoria){
        }

        //Método p/ mudar o status
        public function statusProduto($idCategoria, $statusCategoria){
        }
        
    }
?>