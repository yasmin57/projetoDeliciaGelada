<?php
    class ProdutoDAO{
        
        private $conexao;
        private $conexaoMysql;

        public function __construct(){
            //Importe dos arquivos
            require_once('conexaoMysql.php');

            require_once('model/categoriaClass.php');
            
            //Instancia da classe conexao
            $this->conexaoMysql = new ConexaoMysql();

            //Guarda o retorno do método de conexão
            $this->conexao = $this->conexaoMysql->connectDatabase();
        }

        //Método p/ inserir tblprodutos
        public function insertProduto(Produto $produto){
            //Script p/ o bd
            $sql = "insert into tblprodutos (nome, descricao, preco, foto, status,
                    destaque, textodestaque, fotodestaque, backdestaque, desconto) 
                    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            //Prepara p/ mandar p/ o bd
            $statement = $this->conexao->prepare($sql);

            if($produto->getDestaque() <> null){
                $destaque = 1;
            }
            else{
                $destaque = 0;
            }

            //Array com o dado
            $statementDados = array(
                $produto->getNome(), $produto->getDescricao(),
                $produto->getPreco(), $produto->getFoto(),
                $produto->getStatus(), $destaque, 
                $produto->getTextoDest(),  $produto->getFotoDest(),
                $produto->getBackDest(), $produto->getDesconto()
            );

            //Manda p/ o bd e retorna o resultado
            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Método p/ editar
        public function updateProduto(Produto $produto){
        }

        //Método p/ deletar
        public function deleteProduto($codeProduto){
            $sql = "delete from tblprodutos where codigo =".$codeProduto;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        //Método p/ listar
        public function selectAllProduto(){
            $sql = "select * from tblprodutos";

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC))
            {
                //Instancia da classe categoria
                $listProdutos[] = new Produto();
                $listProdutos[$cont]->setCodigo($rs['codigo']);
                $listProdutos[$cont]->setNome($rs['nome']);
                $listProdutos[$cont]->setDescricao($rs['descricao']);
                $listProdutos[$cont]->setPreco($rs['preco']);
                $listProdutos[$cont]->setDesconto($rs['desconto']);
                $listProdutos[$cont]->setDestaque($rs['destaque']);
                $listProdutos[$cont]->setFotoDest($rs['fotodestaque']);
                $listProdutos[$cont]->setTextoDest($rs['textodestaque']);
                $listProdutos[$cont]->setBackDest($rs['backdestaque']);
                $listProdutos[$cont]->setFoto($rs['foto']);
                $listProdutos[$cont]->setStatus($rs['status']);

                $cont++;
            }

            if(isset($listProdutos))
                return $listProdutos;
            else
                return false;
        }

        //Método p/ listar por id
        public function selectByIdProduto($codeCategoria){
        }

        //Método p/ editar status
        public function updateStatusProduto($codeProduto, $statusProduto){
            $sql = "update tblprodutos set status =".$statusProduto." where codigo =".$codeProduto;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }
    }


    //Método p/ inserir na tblprodutos_subcategorias
        // public function insertProdutoSubcategoria($codeProduto, $subcategorias){
        //     $cont = 0;

        //     while($cont < count($subcategorias)){
        //         $sql = " insert into tblprodutos_subcategorias(idproduto, idsubcategoria) 
        //         values(".$codeProduto." ,".$subcategorias[$cont]." )";

        //         if($insert = $this->conexao->query($sql))
        //             $cont++;
        //         else
        //             $cont = 100;
        //     }

        //     if($insert)
        //         return true;
        //     else
        //         return false;
            
        // }

        //Método p/ pegar o código do último registro
        // public function selectCodeUltimoProduto(){
        //     $sql = "select codigo from tblprodutos order by codigo desc";

        //     if($select = $this->conexao->query($sql)){
        //         $rs = $select->fetch(PDO::FETCH_ASSOC);

        //         return $rs['codigo'];
        //     }
        //     else{
        //         return false;
        //     }
        // }
?>


