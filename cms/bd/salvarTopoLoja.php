<?php
    //VERIFICA SE HOUVE A AÇÃO DO POST
    if(isset($_POST['btnlojas'])){
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once("../../bd/conexao.php");
        
        //CHAMA A FUNÇÃO DE CONEXÃO
        $conexao = conexaoMysql();

        //ATIVA O RECURSO DA VAR DE SESSÃO
        if(!isset($_SESSION)){
            session_start();
        }

        //SCRIPT P/ O BD
        $sql = "insert into tbltopolojas (foto) values('".$_SESSION['preview']."')";

        //MANDA P/ O BD
        $insert = mysqli_query($conexao, $sql);

        //SE DEU CERTO E REDIRECIONA P/ A PAGE DO FORM/CONSULTA
        if($insert){
            //header("location:../raiz/adm_topoLoja.php");
            echo($sql);
        }
        else{
            echo("erro");
            echo($sql);
        }

    }
?>