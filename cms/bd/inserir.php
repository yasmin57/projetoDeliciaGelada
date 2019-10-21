<?php
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btnnivel']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('../../bd/conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();
        
        //RESGATE DOS DADOS DO FORMULÁRIO
        $nome = $_POST['txtnome'];
        $permissao1 = $_POST['permissao1'];
        $permissao2 = $_POST['permissao2'];
        $permissao3 = $_POST['permissao3'];
        
        
        
        //obs: criar tabela de nivel
        $sql = "insert into tblnivel()"
    }
    
    

?>