<?php
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btncreatenivel']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('../../bd/conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();
        
        //
        $chkconteudo = 0;
        $chkcliente = 0;
        $chkusers = 0;
        
        //RESGATE DOS DADOS DO FORMULÁRIO
        $nome = $_POST['txtnome'];
        
        if($_POST['chkconteudo'] <> ""){
            $chkconteudo = $_POST['chkconteudo'];
        }
        elseif($_POST['chkcliente'] <> ""){
            $chkcliente = $_POST['chkcliente'];
        }
        elseif($_POST['chkusers'] <> ""){
            $chkusers = $_POST['chkusers'];
        }
        
        //SCRIPT P/ INSERIR
        $sql = "insert into tblniveis(nome, adm_conteudo, adm_cliente, adm_usuarios)
        values('".$nome."', ".$chkconteudo.", ".$chkcliente.", ".$chkusers.")";
        
        //CONFERE SE INSERIU OS DADOS E REDIRECIONA P/ OUTRA PAG
        if(mysqli_query($conexao, $sql))
            header('location:../raiz/adm_usuarios.php');
        else
            echo("Error: ".$sql);
    }
    
    

?>