<?php
    if(isset($_POST['btnsobredestaque'])){
        
        require_once("../../bd/conexao.php");

        $conexao = conexaoMysql();

        if(!isset($_SESSION)){
            session_start();
        }

        $texto = $_POST['txttexto'];

        if($_POST['btnsobredestaque'] == "CRIAR"){
            $sql = "insert into tblsobredestaque (texto) values ('".$texto."')";
        }
        else{
            $sql = "update tblsobredestaque set texto = '".$texto."' where codigo =".$_SESSION['codigo'];
        }

        $insert = mysqli_query($conexao, $sql);

        if($insert){
            header("location:../raiz/adm_sobreDestaque.php");
        }
        else{
            echo($sql);
        }

    }

?>