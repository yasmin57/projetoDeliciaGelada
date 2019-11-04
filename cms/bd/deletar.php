<?php
    //Verifica a existência da variável modo
    if(isset($_GET['modo'])){
        //Verifica se a variável modo tem a opção de excluir
        if($_GET['modo'] == 'excluir'){
            
            //importa o arquivo de conexão com bd
            require_once('../../bd/conexao.php');
            
            //chamada da função que conecta com o banco
            $conexao =  conexaoMysql();
            
            //resgate da id / do codigo
            $codigo = $_GET['codigo'];
            
            //resgate do nome da página
            $page = $_GET['page'];
            
            //Verifica se a página é de contatos
            if($page == 'admcontatos')
            {
                //Script para deletar
                $sql = "delete from tblcontatos where id =".$codigo;
                
                if(mysqli_query($conexao, $sql))
                    header('location:../raiz/adm_contatos.php');
                else
                    echo('Erro ao deletar registro');
                
            }
            elseif($page == 'admusuarios')
            {
                //Script para deletar
                $sql = "delete from tblusuarios where codigo =".$codigo;
                
                if(mysqli_query($conexao, $sql))
                    header('location:../raiz/crud_usuarios.php');
                else
                    echo('Erro ao deletar registro');
                
            }
 
        }
    }

?>