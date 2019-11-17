<?php
    //VERIFICA SE EXISTE A VAR STATUS
    if(isset($_GET['status'])){

        //PEGA O CÓDIGO
        $codigo = $_GET['codigo'];
   
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('../../bd/conexao.php');

        //CHAMA A FUNÇÃO DE CONEXÃO
        $conexao = conexaoMysql();

        //SCRIPT P/ ZERAR TODOS OS STATUS DO BD
        $sql = "update tbltopolojas set status = 0 where codigo > 0";

        //MANDA P/ O BD
        $update = mysqli_query($conexao, $sql);

        //SCRIPT P/ ATIVAR O STATUS DESEJADO 
        $sql = "update tbltopolojas set status = 1 where codigo =".$codigo;

        //MANDA P/ O BD 
        $update2 = mysqli_query($conexao, $sql);

        //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA E REDIRECIONA P/ O FORMULÁRIO
        if($update2)
        {
            header('location:../raiz/adm_topoLoja.php');
        }
        else{
            echo($sql);
        }
    }

?>