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

            if(!isset($_SESSION['modal']))
            {
                //Verifica se o método é post
                if($_SERVER['REQUEST_METHOD'] == 'POST' ){

                    //Instancia da classe categoria
                    $this->produto = new Produto();

                    //Resgata o dado via post
                    $this->produto->setNome($_POST['txtnome']);
                    $this->produto->setDescricao($_POST['txtdescricao']);
                    $this->produto->setPreco($_POST['txtpreco']); 
                    $this->produto->setDesconto($_POST['txtdesconto']);

                }
            }
                
            $this->produtoDAO = new ProdutoDAO();
        }

        //Método p/ fazer upload
        public function uploadFoto($file){
            if(isset($_SESSION['erroUp']))
                unset($_SESSION['erroUp']);
            
            if($_FILES[$file]['size'] > 0 && $_FILES[$file]['type'] <> "")
            {

                //Guarda o tamanho do arquivo a ser upado para o servidor
                $arquivo_size = $_FILES[$file]['size'];
                //Converte o tamanho do arquivo p/ kbyte e pega somente a parte inteira da conversão (round)
                $tamanho_arquivo = round($arquivo_size/1024);
                //Guarda os tipos de extenções permitidos
                $arquivo_permitidos = array("image/jpeg", "image/jpg", "image/png");
                //Guarda o tipo de extenção do arquivo a ser upado p/ o servidor
                $ext_arquivo = $_FILES[$file]['type'];

                //Verifica se a extenção do arquivo enviado é permitida
                if(in_array($ext_arquivo, $arquivo_permitidos))
                {
                    //Verifica se o tamanho é menor do que o máximo permitido
                    if($tamanho_arquivo < 2000)
                    {
                        //PERMITE RETORNAR APENAS O NOME DO ARQUIVO
                        $nome_arquivo = pathinfo($_FILES[$file]['name'], PATHINFO_FILENAME);

                        //PERMITE RETORNAR APENAS A EXTENÇÃO DO ARQUIVO
                        $ext = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);

                        //Estamos gerando uma chave com o nome do arquivo + uniqid(time()) ~numero aleatório com base em uma hh:mm:ss do upload. 
                        $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                        $foto = $nome_arquivo_cripty.".".$ext;

                        $arquivo_temp = $_FILES[$file]['tmp_name'];
                        $diretorio = "../imgs/";

                        if(move_uploaded_file($arquivo_temp, $diretorio.$foto))
                        {
                            return $foto;
                        } 
                        else{
                            $_SESSION['erroUp'] = "<script> 
                                alert('Não foi possível enviar o arquivo para o servidor');
                            </script>";
                            header('location:produtos.php');
                            return false;
                        }
                    }
                    else
                    {
                        $_SESSION['erroUp'] = "<script> 
                                alert('tamanho de arquivo não pode ser maior do que 2Mb');
                            </script>";
                            header('location:produtos.php');
                        return false;
                    }
                }
                else
                {
                    $_SESSION['erroUp'] = "<script> 
                            alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                        </script>";
                    header('location:produtos.php');
                    return false;
                }
            }
            else{
                $_SESSION['erroUp'] = "<script> 
                        alert('Arquivo não selecionado conforme o tamanho ou o tipo');
                    </script>"; 
                header('location:produtos.php');
                return false;
            }
        }

        //Método p/ inserir
        public function novoProduto(){

            $off = "";

            //Code p/ uploade
            if($upload = $this->uploadFoto('flefoto')){
                $this->produto->setFoto($upload);
            }

            //Resgate dos dados não obrigatórios:

            //Texto destaque
            if(isset($_POST['txttextodesc']))
                $this->produto->setTextoDest($_POST['txttextodesc']);
            else
                $this->produto->setTextoDest($off);

            //Foto destaque
            if($_FILES['flefotodesc']['name'] <> '')
            {
                //Método p/ fazer upload
                if($upload = $this->uploadFoto('flefotodesc'))
                    $this->produto->setFotoDest($upload);
            }
            else
                $this->produto->setFotoDest($off);

            //Back destaque
            if($_FILES['flebackdesc']['name'] <> '')
            {
                //Método p/ fazer upload
                if($upload = $this->uploadFoto('flebackdesc'))
                    $this->produto->setBackDest($upload);
            }
            else
                $this->produto->setBackDest($off);

            //chama o método p/ inserir
            if($this->produtoDAO->insertProduto($this->produto))
                header('location:produtos.php');
            else
                echo('ERRO AO INSERIR');

        }
  
        //Método p/ editar
        public function editaProduto($idProduto){
            //Atribui um valor ao status e ao codigo
            $this->produto->setCodigo($idProduto);

            //Declaração de variaveis
            $off = "";
            $foto = "";
            $fotodest = "";
            $backdest = "";

            //Verifica se o file está vazio
            if($_FILES['flefoto']['name'] == ""){
                $this->produto->setFoto($_SESSION['foto']);
            } 
            //verifica se o upload deu certo
            elseif($upload = $this->uploadFoto('flefoto')){
                $this->produto->setFoto($upload); 

                if($_SESSION['foto'] <> '')
                    $foto = "k";
            }

            //Resgate dos dados não obrigatórios:

            //Texto destaque
            if(isset($_POST['txttextodesc']))
                $this->produto->setTextoDest($_POST['txttextodesc']);
            else
                $this->produto->setTextoDest($off);

            //Foto destaque 
            if($_FILES['flefotodesc']['name'] == ""){
                $this->produto->setFotoDest($_SESSION['fotodest']);
            }
            elseif($upload2 = $this->uploadFoto('flefotodesc')){
                $this->produto->setFotoDest($upload2);

                if($_SESSION['fotodest'] <> '')
                    $fotodest = 'k';
            }

            //Back destaque 
            if($_FILES['flebackdesc']['name'] == ""){
                $this->produto->setBackDest($_SESSION['backdest']);
            }
            elseif($upload3 = $this->uploadFoto('flebackdesc')){
                $this->produto->setBackDest($upload3);

                if($_SESSION['backdest'] <> '')
                    $backdest = 'k';
            }

            //chama o método p/ atualizar
            if($this->produtoDAO->updateProduto($this->produto)){
                if($foto <> '')
                    unlink('../imgs/'.$foto);
                
                if($fotodest <> '')
                    unlink('../imgs/'.$fotodest);

                if($backdest <> '')
                    unlink('../imgs/'.$backdest);

                //if(isset($_SESSION['foto']))
                    unset($_SESSION['foto']);
                //if(isset($_SESSION['fotodest']))
                    unset($_SESSION['fotodest']);
               // if(isset($_SESSION['backdest']))
                    unset($_SESSION['backdest']);
                    
                header('location:produtos.php');
            }
            else
                echo('erro ao atualizar registro');
        }

        //Método p/ deletar
        public function excluiProduto($idProduto){
            if($this->produtoDAO->deleteProduto($idProduto))
                header('location:produtos.php');
            else
                echo('erro ao excluir');
        }

        //Método p/ listar
        public function listaProduto(){
            if($list = $this->produtoDAO->selectAllProduto())
                return $list;
            else
                die();
        }

        //Método p/ listar por id
        public function buscaProduto($idProduto){
            $dados = $this->produtoDAO->selectByIdProduto($idProduto);

            require_once('produtos.php');
        }

        //Método p/ retornar produto p/ modal
        public function produtoModal($idProduto){
            $dados = $this->produtoDAO->selectByIdProduto($idProduto);
            return $dados;
        }


        //Método p/ mudar o status
        public function statusProduto($idProduto, $statusProduto){

            if($statusProduto)
                $status = 0;
            else
                $status = 1;

            if($this->produtoDAO->updateStatusProduto($idProduto, $status))
                header('location:produtos.php');
            else
                echo('erro ao excluir');
        }

        //Método p/ mudar o produto destaque
        public function destaqueProduto($idProduto){

            if($this->produtoDAO->updateDestaqueProduto($idProduto))
                header('location:produtos.php');
            else
                echo('erro ao excluir');
        }
        
    }
?>