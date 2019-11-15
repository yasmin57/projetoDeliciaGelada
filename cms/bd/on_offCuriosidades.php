<?php
    //Verifica se existe a var status
    if(isset($_GET['status'])){

        //resgata o codigo da faixa
        $code = $_GET['codigo'];    

        //Verifica o valor do status e o inverte
        if($_GET['status'] == 1){
            $status = 0;
        }
        else{
            $status = 1; 
        }

        //importe e chamada da função que conecta com o bd
        require_once('../../bd/conexao.php');
        $conexao = conexaoMysql();

        //Script p/ o bd 
        $sql = "update tblcuriosidades set status=".$status." where codigo =".$code;
        $select = mysqli_query($conexao, $sql);

        //Verifica se não houve erro e redireciona p/ o formulário
        if($select){
            header('location:../raiz/adm_curiosidades.php');
        }
        else{
            echo($sql);
        }
    }

?>