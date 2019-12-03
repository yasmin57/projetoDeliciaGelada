<?php
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
            $sql = "insert into tblcategorias(nome) values(?)";

            //Prepara p/ mandar p/ o bd
            $statement = $this->conexao->prepare($sql);

            //Array com o dado
            $statementDado = array($categoria->getNome());

            //Manda p/ o bd e retorna o resultado
            if($statement->execute($statementDado))
                return true;
            else
                return false;
        }

        //Método p/ editar
        public function updateCategoria(){}

        //Método p/ deletar
        public function deleteCategoria(){}

        //Método p/ listar
        public function selectAllCategoria(){}

        //Método p/ listar por id
        public function selectByIdCategoria(){}
    }

?>