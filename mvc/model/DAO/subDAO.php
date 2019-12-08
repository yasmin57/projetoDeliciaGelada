<?php
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
            //Script p/ inserir
            $sql = "insert into tblsubcategorias (descricao, status, idcategoria)
                    values(?,?,?)";
            
            //Prepara para enviar sql p/ o bd
            $statement = $this->conexao->prepare($sql);
            
            //Array com os dados do objeto  Contato
            $statementDados = array(
                $subcategoria->getDescricao(), 
                $subcategoria->getStatus(), 
                $subcategoria->getIdCategoria() );

            //Manda executar no bds
            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Update de uma subcategoria
        public function updateSubcategoria(Subcategoria $subcategoria){
            //Script p/ inserir
            $sql = "update tblsubcategorias set descricao=?, idcategoria=?
                    where codigo=?";
            
            //Prepara para enviar sql p/ o bd
            $statement = $this->conexao->prepare($sql);
            
            //Array com os dados do objeto  Contato
            $statementDados = array(
                $subcategoria->getDescricao(), 
                $subcategoria->getIdCategoria(),
                $subcategoria->getCodigo() );

            //Manda executar no bds
            if($statement->execute($statementDados))
                return true;
            else
                return false;
        }

        //Delete de uma subcategoria
        public function deleteSubcategoria($codigoSubcategoria){

            //Script
            $sql = "delete from tblsubcategorias where codigo = ".$codigoSubcategoria;

            //Manda p/ o bd e Verifica se funcionou
            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        //Select all das subcategoria
        public function selectAllSubcategoria(){
            $sql = "select tblsubcategorias.*, tblcategorias.nome from tblcategorias 
                    inner join tblsubcategorias on 
                    tblcategorias.codigo = tblsubcategorias.idcategoria";

            $select = $this->conexao->query($sql);

            $cont = 0;

            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                //Coleção de objetos
                $listSub[] = new Subcategoria();

                //Guarda os dados
                $listSub[$cont]->setCodigo($rs['codigo']);
                $listSub[$cont]->setDescricao($rs['descricao']);
                $listSub[$cont]->setStatus($rs['status']);
                $listSub[$cont]->setNome($rs['nome']);
                $listSub[$cont]->setIdCategoria($rs['idcategoria']);;

                $cont++;
            }

            if(isset($listSub))
                return $listSub;
            else
                return false;
        }

        //Select de uma subcategoria
        public function selectByIdSubcategoria($codigoSubcategoria){
            $sql = "select tblsubcategorias.*, tblcategorias.*, 
                    tblcategorias.codigo as codecategoria, 
                    tblsubcategorias.codigo as codesubcategoria 
                    from tblcategorias inner join tblsubcategorias 
                    on tblcategorias.codigo = tblsubcategorias.idcategoria
                    where tblsubcategorias.codigo =".$codigoSubcategoria;

            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){
                //Coleção de objetos
                $listSub = new Subcategoria();

                //Guarda os dados
                $listSub->setCodigo($rs['codesubcategoria']);
                $listSub->setDescricao($rs['descricao']);
                $listSub->setStatus($rs['status']);
                $listSub->setNome($rs['nome']);
                $listSub->setCodigoCategoria($rs['codecategoria']);
                $listSub->setIdCategoria($rs['idcategoria']);;
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