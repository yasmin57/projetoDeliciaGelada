<?php
    
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_GET['btnenviar']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();
            
        //RESGATA DADOS ENVIADOS PELO FORMULÁRIO
        $nome = $_GET['txtnome'];
        $telefone = $_GET['txttelefone'];
        $celular = $_GET['txtcelular'];
        $email = $_GET['txtemail'];
        $homepage = $_GET['txthomepage'];
        $facebook = $_GET['txtfacebook'];
        $sexo = $_GET['rdosexo'];
        $tipo = $_GET['slcmsg'];
        $mensagem = $_GET['txtmensagem'];
        $profissao = $_GET['txtprofissao'];
        
        
        $sql = "insert into tblcontatos (nome, telefone, celular, email, homepage, facebook, tipo, mensagem, sexo, profissao)
                values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$homepage."', '".$facebook."', '".$tipo."','".$mensagem."', '".$sexo."', '".$profissao."')";
        
       //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
        
       if(mysqli_query($conexao, $sql)){   
           header('location:../raiz/contato.php');
       }   
       else{
           echo("Erro ao executar o script");
       } 
    }

?>