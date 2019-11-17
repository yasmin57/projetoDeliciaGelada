<?php
    //VERIFICA SE A VAR MODO EXISTE
    if(isset($_GET['modo'])){
        //VERIFICA SE A MODO TEM A FUNÇÃO DE EXCLUIR
        if($_GET['modo'] == 'excluir')
        {
            //RESGATA O CODIGO DA FAIXA e O NOME DA FOTO
            $codigo = $_GET['codigo'];
            $foto = $_GET['nomeFoto'];

            //importa o arquivo de conexão com bd
            require_once('../../bd/conexao.php');
            
            //chamada da função que conecta com o banco
            $conexao =  conexaoMysql();

            //SCRIPT DE DELETE 
            $sql = "delete from tbllojas where codigo=".$codigo;

            //MANDA O SCRIPT P/ O BD
            $delete = mysqli_query($conexao, $sql);

            //VERIFICA SE NÃO HOUVE ERRO E REDIRECIONA P/ A PAG DO FORM
            if($delete){
                unlink('../../imgs/'.$foto);
                header('location:../raiz/adm_lojas.php');
            }
            else{
                echo($sql);
            }
        }
    }
?>