<?php
    //VERIFICA SE A VAR MODO EXISTE
    if(isset($_GET['modo'])){
        //VERIFICA SE A MODO TEM A FUNÇÃO DE EXCLUIR
        if($_GET['modo'] == 'excluir')
        {
            //RESGATA O CODIGO DA FAIXA e O NOME DA FOTO
            $codigo = $_GET['codigo'];
            $nomeFoto = $_GET['nomeFoto'];

            //importa o arquivo de conexão com bd
            require_once('../../bd/conexao.php');
            
            //chamada da função que conecta com o banco
            $conexao =  conexaoMysql();

            //SCRIPT DE DELETE 
            $sql = "delete from tbltopocuriosidades where codigo =".$codigo;

            //MANDA O SCRIPT P/ O BD
            $select = mysqli_query($conexao, $sql);

            //VERIFICA SE NÃO HOUVE ERRO E REDIRECIONA P/ A PAG DO FORM
            if($select){
               unlink('../../imgs/'.$nomeFoto); 
               header('location:../raiz/adm_topoCuriosidades.php');
            }
            else{
                echo($sql);
            }
        }
    }
?>