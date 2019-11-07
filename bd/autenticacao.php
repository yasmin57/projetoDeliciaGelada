<?php

    //VERIFICA A AÇÃO DO BOTÃO LOGIN
    if(isset($_POST['btnlogar'])){
        
        //IMPORTE DO ARQUIVO DE CONEXAO
        require_once('../bd/conexao.php');
        //CHAMADA DA FUNÇÃO
        $conexao = conexaoMysql();
        
        //RESGATE DOS DADOS E CRIPTOGRAFIA
        $usuario = $_POST['txt_user'];
        $senha = $_POST['txt_password'];
        $senha_cripty = md5($senha);
        
        //SCRIPT P/ O BD 
        $sql = "select * from tblusuarios where tblusuarios.login ='".$usuario."' and tblusuarios.senha ='".$senha_cripty."'";
        
        $select = mysqli_query($conexao, $sql);
        
        //VERIFICA SE O SELECT FUNCIONOU
        if($select)
        {
            //TRANSFORMA EM ARRAY
            $rsLogin = mysqli_fetch_array($select);

            //VERIFICA SE O USUÁRIO ESTÁ ATIVADO
            if($rsLogin['status'] == 1)
            {
                //INICIA VARIÁVEL DE SESSÃO
                if(!isset($_SESSION))
                {
                    session_start();
                }
            
                //RESGATE DE DADOS NECESSÁRIOS/ VARIAVEIS DE SESSÃO
                $_SESSION['nomeUsuario'] = $rsLogin['nome'];
                $_SESSION['codenivel'] = $rsLogin['codenivel'];
            
                //REDIRECIONA P/ A PÁGINA DO CMS
                header('location:../cms/raiz/index.php');
            }
            else
            {
                define("ERROR_LOGIN", "usuário desativado");
                header('location:../raiz/home.php');
            }
        }
        else
        {
           define("ERROR_LOGIN", "usuário ou senha inválidos");
           header('location:../raiz/home.php');
        }
 
    }
?>