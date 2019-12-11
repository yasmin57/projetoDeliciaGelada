<?php
    /*
        * CLASSE P/ A INTEGRAÇÃO DE CONTATO COM O BANCO DE DADOS
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 04/12/19
        * MODIFICAÇÕES:
         -> DATA: 05/12/19
            ALTERAÇÕES REALIZADAS: Método p/ update, delete e selects implementados
            NOME DO DESENVOLVEDOR: YASMIN PEREIRA DA SILVA
    */
    class CategoriaDAO{
        
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

        //Método p/ inserir
        public function insertCategoria(Categoria $categoria){
            //Script p/ o bd
            $sql = "insert into tblcategorias(nome, status) values(?, ?)";

            //Prepara p/ mandar p/ o bd
            $statement = $this->conexao->prepare($sql);

            //Array com o dado
            $statementDado = array($categoria->getNome(), $categoria->getStatus());

            //Manda p/ o bd e retorna o resultado
            if($statement->execute($statementDado))
                return true;
            else
                return false;
        }

        //Método p/ editar
        public function updateCategoria(Categoria $categoria){
            $sql = "update tblcategorias set nome=? where codigo =?";

            $statement = $this->conexao->prepare($sql);

            $statementDados = 
            array( $categoria->getNome(), 
                   $categoria->getCodigo() );

            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Método p/ deletar
        public function deleteCategoria($codeCategoria){
            $sql = "delete from tblcategorias where codigo=".$codeCategoria;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        //Método p/ listar
        public function selectAllCategoria($code){
            $sql = "select * from tblcategorias where codigo <>".$code;

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC))
            {
                //Instancia da classe categoria
                $listCategorias[] = new Categoria();
                $listCategorias[$cont]->setCodigo($rs['codigo']);
                $listCategorias[$cont]->setNome($rs['nome']);
                $listCategorias[$cont]->setStatus($rs['status']);

                $cont++;
            }

            if(isset($listCategorias))
                return $listCategorias;
            else
                return false;
        }

        //Método p/ listar por id
        public function selectByIdCategoria($codeCategoria){
            $sql = "select * from tblcategorias where codigo=".$codeCategoria;

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC))
            {
                //Instancia da classe categoria
                $dadosCategoria = new Categoria();
                $dadosCategoria->setCodigo($rs['codigo']);
                $dadosCategoria->setNome($rs['nome']);

                $cont++;
            }

            return $dadosCategoria;

        }

        //Método p/ editar status
        public function statusCategoria(Categoria $categoria){
            $sql = "update tblcategorias set status=? where codigo =?";

            $statement = $this->conexao->prepare($sql);

            $statementDados = 
            array( $categoria->getStatus(), 
                   $categoria->getCodigo() );

            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }
    }

?>