<?php
    if(!isset($_SESSION))
    {
        session_start();    
    }

    //VARIAVEIS GLOBAIS
    $chkconteudo = 0;
    $chkcliente = 0;
    $chkusers = 0;
    $zero = 0;

    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btncreatenivel']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('../../bd/conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();

        //RESGATE DOS DADOS DO FORMULÁRIO
        $nome = $_POST['txtnome'];

        if($_POST['chkconteudo'] <> ""){
            $chkconteudo = $_POST['chkconteudo'];
        }
        if($_POST['chkcliente'] <> ""){
            $chkcliente = $_POST['chkcliente'];
        }
        if($_POST['chkusers'] <> ""){
            $chkusers = $_POST['chkusers'];
        }
        
        //TESTA A AÇÃO DO BOTÃO
        if(strtoupper($_POST['btncreatenivel']) == 'CRIAR'){
            //SCRIPT P/ INSERIR DADOS NO BD
            $sql = "insert into tblniveis(descricao, adm_conteudo, adm_cliente, adm_usuarios)
            values('".$nome."', ".$chkconteudo.", ".$chkcliente.", ".$chkusers.")";
        }
        elseif(strtoupper($_POST['btncreatenivel']) == 'EDITAR'){
            //SCRIPT P/ ATUALIZAR DADOS NO BD
            $sql = "update tblniveis set descricao='".$nome."', adm_conteudo=".$chkconteudo.", 
            adm_cliente=".$chkcliente.", adm_usuarios=".$chkusers." where codigo =".$_SESSION['codigo'];
        }

        
        
        //CONFERE SE INSERIU OS DADOS E REDIRECIONA P/ OUTRA PAG
        if(mysqli_query($conexao, $sql))
            header('location:../raiz/crud_niveis.php');
        else
            echo("Error: ".$sql);
    }
    
    

?>