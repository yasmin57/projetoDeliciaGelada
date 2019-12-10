<?php
    class ProdutoController{
        //Variaveis
        private $produto;
        private $produtoDAO;
        private $subcategorias;
        private $arraySub;
        
        //Construtor
        public function __construct()
        {
            if(!isset($_SESSION))
                session_start();


            require_once('model/produtoClass.php');
            require_once('model/DAO/produtoDAO.php');

            //Verifica se o método é post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Instancia da classe categoria
                $this->produto = new Produto();

                $cont = 0;


                while($cont < $_SESSION['quantidade']){
                    if(isset($_POST['chk'.$cont])){;
                        if($_POST['chk'.$cont] <> ''){
                            //$this->subcategorias .=$_POST['chk'.$cont].", " ;
                            $this->subcategorias[$cont] = $_POST['chk'.$cont];
                        }
                    }

                    $cont++;
                }
                

                //Resgata o dado via post
                $this->produto->setNome($_POST['txtnome']);
                $this->produto->setDescricao($_POST['txtdescricao']);
                $this->produto->setPreco($_POST['txtpreco']); 
                $this->produto->setFoto($_SESSION['previewFoto']);
                $this->produto->setCategoria($_SESSION['codecategoria']); 
                $this->produto->setDesconto($_POST['txtdesconto']);
            }
            $this->produtoDAO = new ProdutoDAO();
        }

        //Método p/ inserir
        public function novoProduto(){
            //Atribui um valor ao status
            $this->produto->setStatus(1);

            if(isset($_POST['chkdestaque'])){
                $this->produto->setDestaque($_POST['chkdestaque']);
            }
            else{
                $this->produto->setDestaque(0);
            }

            $cont = 0;

            while($cont < count($this->subcategorias)){
                $this->arraySub = array($this->subcategorias[$cont],);
                $cont++;
            }
            


            
            //Verifica se o texto é destaque
            if($this->produto->getDestaque()){
                if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> "")
                {

                    //Guarda o tamanho do arquivo a ser upado para o servidor
                    $arquivo_size = $_FILES['flefoto']['size'];
                    //Converte o tamanho do arquivo p/ kbyte e pega somente a parte inteira da conversão (round)
                    $tamanho_arquivo = round($arquivo_size/1024);
                    //Guarda os tipos de extenções permitidos
                    $arquivo_permitidos = array("image/jpeg", "image/jpg", "image/png");
                    //Guarda o tipo de extenção do arquivo a ser upado p/ o servidor
                    $ext_arquivo = $_FILES['flefoto']['type'];



                    //Verifica se a extenção do arquivo enviado é permitida
                    if(in_array($ext_arquivo, $arquivo_permitidos))
                    {
                        //Verifica se o tamanho é menor do que o máximo permitido
                        if($tamanho_arquivo < 2000)
                        {
                            //PERMITE RETORNAR APENAS O NOME DO ARQUIVO
                            $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                            //PERMITE RETORNAR APENAS A EXTENÇÃO DO ARQUIVO
                            $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                            //NO PHP PODEMOS USAR DOIS ALGORITMOS DE CRIPTOGRAFIA (MD5, SHA1) E
                            // EX: hash("tipo do algoritimo", var); tipo: sha256, md5 ...

                            //Estamos gerando uma chave com o nome do arquivo + uniqid(time()) ~numero aleatório com base em uma hh:mm:ss do upload. 
                            $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                            $foto = $nome_arquivo_cripty.".".$ext;

                            $arquivo_temp = $_FILES['flefoto']['tmp_name'];
                            $diretorio = "../imgs/";

                            if(move_uploaded_file($arquivo_temp, $diretorio.$foto))
                            {
                                $this->produto->setFotoDestaque('$foto');
                            } 
                            else{
                                echo("<script> 
                                    alert('Não foi possível enviar o arquivo para o servidor');
                                </script>");
                            }
                        }
                        else
                        {
                            echo("<script> 
                                    alert('tamanho de arquivo não pode ser maior do que 2Mb');
                                </script>");
                        }
                    }
                    else
                    {
                        echo("<script> 
                                alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                            </script>");
                    }
                }
                else
                {
                echo("<script> 
                            alert('Arquivo não selecionado conforme o tamanho ou o tipo');
                        </script>"); 
                }
                $this->produto->setTexto($_POST['txttexto']);
            }
            else{
                $this->produto->setFotoDestaque('');
                $this->produto->setTexto('');
            }

            if($this->produtoDAO->insertProduto($this->produto)){
                if($code = $this->produtoDAO->selectCodeUltimoProduto()){
                    if($this->produtoDAO->insertProdutoSubcategoria($code, $this->arraySub))
                        header('location: produtos.php');
                    else
                        echo('Erro ao inserir sub');
                }
                else{
                    echo('Erro ao selecionar o ultimo: '.$code);
                }
            }
            else{
                echo('Erro ao inserir'); 
            }

            
        }

        //Método p/ editar
        public function editaProduto($idCategoria){
        }

        //Método p/ deletar
        public function excluiProduto($idCategoria){
        }

        //Método p/ listar
        public function listaProduto(){
            $list = $this->produtoDAO->selectAllProduto();

            if($list)
                return $list;
            else
                die();
        }

        //Método p/ listar por id
        public function buscaProduto($idCategoria){
        }

        //Método p/ mudar o status
        public function statusProduto($idCategoria, $statusCategoria){
        }
        
    }
?>