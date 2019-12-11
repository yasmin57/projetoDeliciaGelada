<?php
    /*
        * CLASSE P/ A INTEGRAÇÃO DE CONTATO COM O BANCO DE DADOS
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 06/12/19
        * MODIFICAÇÕES:
         -> DATA: 07/12/19
            ALTERAÇÕES REALIZADAS: Método p/ update, delete e selects implementados
            NOME DO DESENVOLVEDOR: YASMIN PEREIRA DA SILVA
         -> DATA: 11/12/19
            ALTERAÇÕES REALIZADAS: Atualizações dos scripts
            NOME DO DESENVOLVEDOR: YASMIN PEREIRA DA SILVA
    */
    class SubcategoriaDAO{

        private $conexao;
        private $conexaoMysql;

        public function __construct(){
             //Importe dos arquivos
             require_once('conexaoMysql.php');
             require_once('model/categoriaClass.php');

             //Instancia e chama o método de conexão
             $this->conexaoMysql = new ConexaoMysql();
             $this->conexao = $this->conexaoMysql->connectDatabase();
        }

        //Insert de uma subcategoria
        public function insertSubcategoria(Subcategoria $subcategoria){
            $sql = "insert into tblsubcategorias (descricao, status)
                    values(?,?)";
            
            //Prepara para enviar sql p/ o bd
            $statement = $this->conexao->prepare($sql);
            
            //Array com os dados do objeto  Contato
            $statementDados = array(
                $subcategoria->getDescricao(), 
                $subcategoria->getStatus(), );

            //Manda executar no bds
            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Update de uma subcategoria
        public function updateSubcategoria(Subcategoria $subcategoria){
            $sql = "update tblsubcategorias set descricao=?
                    where codigo=?";
            
            //Prepara para enviar sql p/ o bd
            $statement = $this->conexao->prepare($sql);
            
            //Array com os dados do objeto  Contato
            $statementDados = array(
                $subcategoria->getDescricao(), 
                $subcategoria->getCodigo() );

            //Manda executar no bd
            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Delete de uma subcategoria
        public function deleteSubcategoria($codigoSubcategoria){
            $sql = "delete from tblsubcategorias where codigo = ".$codigoSubcategoria;

            //Manda p/ o bd e Verifica se funcionou
            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        //Select all das subcategoria
        public function selectAllSubcategoria(){
            $sql = "select * from tblsubcategorias";

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                //Coleção de objetos
                $listSub[] = new Subcategoria();

                //Guarda os dados
                $listSub[$cont]->setCodigo($rs['codigo']);
                $listSub[$cont]->setDescricao($rs['descricao']);
                $listSub[$cont]->setStatus($rs['status']);

                $cont++;
            }

            if(isset($listSub))
                return $listSub;
            else
                return false;
        }

        //Select de uma subcategoria por id
        public function selectByIdSubcategoria($codigoSubcategoria){
            $sql = "select * from tblsubcategorias
                    where codigo =".$codigoSubcategoria;

            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                //Coleção de objetos
                $listSub = new Subcategoria();

                //Guarda os dados
                $listSub->setCodigo($rs['codigo']);
                $listSub->setDescricao($rs['descricao']);
                $listSub->setStatus($rs['status']);
            }

            return $listSub;
        }

        //Update status de uma subcategoria
        public function updateStatusSubcategoria($codigoSubcategoria, $statusSubcategoria){
            $sql = "update tblsubcategorias set status =".$statusSubcategoria.
                   " where codigo=".$codigoSubcategoria;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }
    }
?>