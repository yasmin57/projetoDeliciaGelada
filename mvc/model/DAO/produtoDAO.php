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
            $sql = "insert into tblprodutos(nome, descricao, preco, foto, idcategoria, status,
                    destaque, textodestaque, fotodestaque, desconto) 
                    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            //Prepara p/ mandar p/ o bd
            $statement = $this->conexao->prepare($sql);

            //Array com o dado
            $statementDado = array(
                $produto->getNome(), $produto->getDescricao(),
                $produto->getPreco(), $produto->getFoto(),
                $produto->getCategoria(), $produto->getStatus(),
                $produto->getDestaque(), $produto->getTexto(),
                $produto->getFotoDestaque(), $produto->getDesconto()
            );

            //Manda p/ o bd e retorna o resultado
            if($statement->execute($statementDado))
                return true;
            else
                return false;
        }

        //Método p/ inserir na tblprodutos_subcategorias
        public function insertProdutoSubcategoria($codeProduto, $subcategorias){
            $cont = 0;

            while($cont < count($subcategorias)){
                $sql = " insert into tblprodutos_subcategorias(idproduto, idsubcategoria) 
                values(".$codeProduto." ,".$subcategorias[$cont]." )";

                if($insert = $this->conexao->query($sql))
                    $cont++;
                else
                    $cont = 100;
            }

            if($insert)
                return true;
            else
                return false;
            
        }

        //Método p/ pegar o código do último registro
        public function selectCodeUltimoProduto(){
            $sql = "select codigo from tblprodutos order by codigo desc";

            if($select = $this->conexao->query($sql)){
                $rs = $select->fetch(PDO::FETCH_ASSOC);

                return $rs['codigo'];
            }
            else{
                return false;
            }
        }


        //Método p/ editar
        public function updateProduto(Categoria $categoria){
        }

        //Método p/ deletar
        public function deleteProduto($codeCategoria){
        }

        //Método p/ listar
        public function selectAllProduto(){
            $sql = "select * from tblprodutos ";

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC))
            {
                //Instancia da classe categoria
                $listProdutos[] = new Produto();
                $listProdutos[$cont]->setCodigo($rs['codigo']);
                $listProdutos[$cont]->setNome($rs['nome']);
                $listProdutos[$cont]->setNome($rs['descricao']);
                $listProdutos[$cont]->setNome($rs['preco']);
                $listProdutos[$cont]->setNome($rs['desconto']);
                $listProdutos[$cont]->setNome($rs['destaque']);
                $listProdutos[$cont]->setNome($rs['fotodestaque']);
                $listProdutos[$cont]->setNome($rs['textodestaque']);
                $listProdutos[$cont]->setNome($rs['foto']);
                $listProdutos[$cont]->setNome($rs['idcategoria']);
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
        public function statusProduto(Categoria $categoria){
        }
    }
?>