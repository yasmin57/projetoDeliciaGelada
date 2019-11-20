<?php
    //INICIA VARIÁVEL DE SESSÃO
    if(!isset($_SESSION))
    {
        session_start();
    }

    //VARIAVEL ERRO
    $_SESSION['error'] = "";

    //VERIFICA A AÇÃO DO BOTÃO LOGIN
    if(isset($_POST['btnlogar'])){
        
        //IMPORTE DO ARQUIVO DE CONEXAO
        require_once('../bd/conexao.php');
        //CHAMADA DA FUNÇÃO
        $conexao = conexaoMysql();
        
        //RESGATE DOS DADOS E CRIPTOGRAFIA
        $usuario = $_POST['txt_user'];
        $senhaLogin = $_POST['txt_password'];
        $senha_criptyLogin = md5($senhaLogin);
        
        //SCRIPT P/ O BD 
       // $sql = "select * from tblusuarios where tblusuarios.login ='".$usuario."' and tblusuarios.senha ='".$senha_cripty."'";
        $sql = "select * from tblusuarios where tblusuarios.login ='".$usuario."'";
        $select = mysqli_query($conexao, $sql);
        
        //VERIFICA SE O SELECT FUNCIONOU
        if($select)
        {
            //TRANSFORMA EM ARRAY
            $rsLogin = mysqli_fetch_array($select);

            //VERIFICA SE O USUÁRIO EXISTE
            if($rsLogin <> '')
            {
                //VERIFICA SE A SENHA ESTÁ CORRETA
                if($rsLogin['senha'] == $senha_criptyLogin)
                {
                    
                    //VERIFICA SE O USUÁRIO ESTÁ ATIVADO
                    if($rsLogin['status'] <> 0)
                    {
                        //SCRIPT P/ RESGATAR O STATUS DO NÍVEL
                        $sql = "select * from tblniveis where tblniveis.codigo =".$rsLogin['codenivel'];
                        
                        $select2 = mysqli_query($conexao, $sql);

                        $rsNivel = mysqli_fetch_array($select2);

                        if($rsNivel['status'] == 1){
                            //RESGATE DE DADOS NECESSÁRIOS/ VARIAVEIS DE SESSÃO
                            $_SESSION['nomeUsuarioLogin'] = $rsLogin['nome'];
                            $_SESSION['codenivel'] = $rsLogin['codenivel'];
                                    
                            //REDIRECIONA P/ A PÁGINA DO CMS
                            header('location:../cms/raiz/index.php');
                        }
                        //Caso o nivel esteja desativado
                        else
                        {   $_SESSION['error'] = "nivel do usuário está desativado";
                            header('location:../raiz/home.php'); 
                        }
                    }
                    //Caso o usuário esteja desativado
                    else
                    {   $_SESSION['error'] = "usuário desativado";
                        header('location:../raiz/home.php'); }
                }
                //Caso a senha esteja incorreta
                else{ $_SESSION['error'] = "senha inválida";
                     header('location:../raiz/home.php'); }
            }
            //Caso o usuario esteja incorreto
            else
            {  $_SESSION['error'] = "usuário inválido";
               header('location:../raiz/home.php');  }       
        }
    }
?>