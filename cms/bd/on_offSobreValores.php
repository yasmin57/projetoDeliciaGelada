<?php
    //VERIFICA SE EXISTE A VAR ID
    if(isset($_GET['id'])){

        //PEGA O CÓDIGO e O ID
        $codigo = $_GET['codigo'];
        $id = $_GET['id'];
   
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('../../bd/conexao.php');

        //CHAMA A FUNÇÃO DE CONEXÃO
        $conexao = conexaoMysql();

        //SCRIPT P/ ZERAR TODOS OS STATUS DO BD
        $sql = "update tblvalores set status = 0 where id =".$id;

        //MANDA P/ O BD
        $update = mysqli_query($conexao, $sql);

        //SCRIPT P/ ATIVAR O STATUS DESEJADO 
        $sql = "update tblvalores set status = 1 where codigo =".$codigo;

        //MANDA P/ O BD 
        $update2 = mysqli_query($conexao, $sql);

        //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA E REDIRECIONA P/ O FORMULÁRIO
        if($update2)
        {
            header('location:../raiz/adm_sobreValores.php');
        }
        else{
            echo($sql);
        }
    }
?>