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
        $sql = "update tblsobredestaque set status = 0 where codigo > 0";
        $update = mysqli_query($conexao, $sql);

        //Script p/ o bd 
        $sql = "update tblsobredestaque set status=".$status." where codigo =".$code;
        $update = mysqli_query($conexao, $sql);

        //Verifica se não houve erro e redireciona p/ o formulário
        if($update){
            header('location:../raiz/adm_sobreDestaque.php');
        }
        else{
            echo($sql);
        }
    }
?>