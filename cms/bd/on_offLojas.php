<?php
    //VERIFICA SE EXISTE A VAR STATUS
    if(isset($_GET['status'])){
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once("../../bd/conexao.php");

        //CHAMA A FUNÇÃO DE CONEXÃO
        $conexao = conexaoMysql();

        //VERIFICA O VALOR DO STATUS E O INVERTE
        if($_GET['status'] == 1){
            $status = 0;
        }
        else{
            $status = 1;
        }

        //RESGATA O CODIGO
        $codigo = $_GET['codigo'];

        //SCRIPT P/ O BD
        $sql = "update tbllojas set status=".$status." where codigo =".$codigo;

        //MANDA P/ O BD
        $update = mysqli_query($conexao, $sql);

        //VEREFICA SE MODIFICOU E REDIRECIONA P/ O FORM/CONSULTA
        if($update){
            header("location:../raiz/adm_lojas.php");
        }
        else{
            echo($sql);
        }

    }
?>
