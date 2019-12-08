<?php
    //Inicia Var de sessão
    if(!isset($_SESSION))
        session_start();

    //Verifica se o botão existe
    if(isset($_POST['btnlogar'])){

        //Importa o arquivo de conexão
        require_once('../bd/conexao.php');

        //Chama a função
        $conexao = conexaoMysql();

        //Resgata os dados
        $usuario = $_POST['txtnome'];
        $senhaLogin = $_POST['txtsenha'];
        $senha_criptyLogin = md5($senhaLogin);

        //Script
        $sql = "select * from tblusuarios where tblusuarios.login ='".$usuario."'";

        //Verifica valor do select
        if($select = mysqli_query($conexao, $sql))
        {
            //Trasnforma o retorno em array
            $rsLogin = mysqli_fetch_array($select);

            //Verifica se o array não está vazio
            if($rsLogin <> '')
            {
                //Verifica se a senha está correta
                if($rsLogin['senha'] == $senha_criptyLogin)
                {
                    //Verifica se o usuário não está desativado
                    if($rsLogin['status'])
                    {
                        //SCRIPT P/ RESGATAR O STATUS DO NÍVEL
                        $sql = "select * from tblniveis where tblniveis.codigo =".$rsLogin['codenivel'];
                        
                        $select = mysqli_query($conexao, $sql);

                        $rsNivel = mysqli_fetch_array($select);

                        //Verifica status do nivel
                        if($rsNivel['status']){
                            
                            //Verifica se o usuário tem permissão para administrar conteúdo
                            if($rsNivel['adm_conteudo']){
                                //RESGATE DE DADOS NECESSÁRIOS/ VARIAVEIS DE SESSÃO
                                $_SESSION['nomeUsuarioLogin'] = $rsLogin['nome'];

                                //REDIRECIONA P/ A PÁGINA DO CMS MVC
                                header('location:../mvc/index.php');
                            }
                            else
                            {   $_SESSION['error'] = "usuário não possui permissão";
                                header('location:../raiz/home.php'); 
                            }        
                        }
                        //Caso o nivel esteja desativado
                        else
                        {   $_SESSION['error'] = "nivel do usuário está desativado";
                            header('location:../raiz/home.php'); 
                        }
                    }
                    else{ $_SESSION['error'] = "usuário desativado";
                          header('location:../raiz/sistema_interno.php');}
                }
                //Caso a senha esteja incorreta
                else{$_SESSION['error'] = "senha inválida";
                     header('location:../raiz/sistema_interno.php'); }
            }
            //Caso o usuario esteja incorreto
            else
            {  $_SESSION['error'] = "usuário inválido";
               header('location:../raiz/sistema_interno.php');  }
            
        }
         
    }
?>