<?php
    //INICIA A VARIAVEL DE SESSÃO
    if(!isset($_SESSION)){
        session_start();
    }

    //VARIAVEIS GLOBAIS

    //VERIFICA SE HOUVE A AÇÃO DO POST NO FORM DE USUÁRIOS
    if(isset($_POST['btncreateuser']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
        require_once("../../bd/conexao.php");

        //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
        $conexao = conexaoMysql();

        //RESGATE DOS DADOS DO FORMULÁRIO
        $nome = $_POST['txtnome'];
        $email = $_POST['txtemail'];
        $celular = $_POST['txtcelular'];
        $usuario = $_POST['txtnameuser'];
        $rg = $_POST['txtrg'];
        $cpf = $_POST['txtcpf'];
        $nivel = $_POST['slcnivel'];
        $senha = $_POST['txtsenha'];

        //CRIPTOGRAFIA DA SENHA
        $senha_cripty = md5($senha);

        //VERIFICA A AÇÃO DO BOTÃO
        if(strtoupper($_POST['btncreateuser']) == 'CRIAR')
        {
            //SCRIPT P/ INSERIR DADOS NO BD
            $sql = "insert into tblusuarios(nome, email, celular, login, rg, cpf, senha, codenivel)
                    values('".$nome."', '".$email."', '".$celular."',
                    '".$usuario."', '".$rg."', '".$cpf."', '".$senha_cripty."', ".$nivel.")";
        }
        elseif(strtoupper($_POST['btncreateuser']) == 'EDITAR'){
            //SCRIPT P/ ATUALIZAR DADOS NO BD
            $sql = "update tblusuarios set nome ='".$nome."', email = '".$email."', celular = '".$celular."'
                    , login ='".$usuario."', rg ='".$rg."', cpf='".$cpf."', senha='".$senha_cripty."',
                    codenivel =".$nivel;
        }

        //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA 
        if(mysqli_query($conexao, $sql)){
            header('location:../raiz/adm_usuarios.php');
        }
        else{
            echo("Error: ".$sql);
        }

    }
?>