<?php
    //Verifica a existência da variável modo
    if(isset($_GET['modo'])){
        //Verifica se a variável modo tem a opção de excluir
        if($_GET['modo'] == 'excluir'){
            //importa o arquivo de conexão com bd
            require_once('../../bd/conexao.php');
            //chamada da função que conecta com o banco
            $conexao =  conexaoMysql();
            
            //resgate da id
            $codigo = $_GET['codigo'];
            //Script para deletar
            $sql = "delete from tblcontatos where id =".$codigo;
            
            if(mysqli_query($conexao, $sql))
                header('location:../raiz/adm_contatos.php');
            else
                echo('Erro ao deletar registro');
        }
    }

?>