<?php
    //verifica se existe a variavel status
    if(isset($_GET['status']))
    {

        //importa o arquivo de conexão com o bd
        require_once("../../bd/conexao.php");

        //chamada da função que conecta com o bd
        $conexao = conexaoMysql();

        //altera o status
        if($_GET['status'] == 1){
             $status = 0;
        }
        else{
             $status = 1;
        } 
            
        //verifica se a alteração é na tabela de usuários
        if($_GET['form'] == "usuarios")
        {
            $sql = "update tblusuarios set status =".$status." where codigo =".$_GET['codigo'];
        }
        
        //verifica se a conexão foi realizada com sucesso
        if(mysqli_query($conexao, $sql)){
            header('location:../raiz/crud_usuarios.php');
        }
        else{
            echo("Error: ".$sql);
        }
    }

?>