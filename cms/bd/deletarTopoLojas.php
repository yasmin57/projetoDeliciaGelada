<?php
    //VERIFICA SE EXISTE A VAR MODO
    if(isset($_GET['modo'])){

        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE EXCLUIR
        if($_GET['modo'] == 'excluir'){

            //RESGATA O CODIGO E NOME DA FOTO
            $code = $_GET['codigo'];
            $foto = $_GET['nomeFoto'];

            //IMPORTA O ARQUIVO DE CONEXAO
            require_once("../../bd/conexao.php");

            //CHAMA A FUNÇÃO DE CONEXAO
            $conexao = conexaoMysql();

            //SCRIPT P/ O BD
            $sql = "delete from tbltopolojas where codigo =".$code;

            //MANDA P/ O BD
            $delete = mysqli_query($conexao, $sql);

            //VERIFICA SE DEU CERTO, APAGA A FOTO E REDIRECIONA P/ O FORM
            if($delete){
                unlink("../../imgs/".$foto);
                header("location:../raiz/adm_topoLoja.php");
            }
            else{
                echo($sql);
            }
        }
    }
?>