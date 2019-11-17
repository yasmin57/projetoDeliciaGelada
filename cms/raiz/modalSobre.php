<?php
    //VERIFICA SE EXISTE A VAR MODO
    if(isset($_POST['modo'])){

        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE VISUALIZAR
        if($_POST['modo'] == "visualizar"){

            //IMPORTA O ARQUIVO DE CONEXÃO
            require_once("../../bd/conexao.php");

            //CHAMA A FUNÇÃO DE CONEXÃO
            $conexao = conexaoMysql();

            //RESGATA O CODIGO ENVIADO PELO AJAX
            $code = $_POST['codigo'];

            //SCRIPT P/ O BD
            $sql = "select tblsobre.*, tblmodo.descricao from tblsobre inner join tblmodo on tblmodo.codigo = tblsobre.modo where tblsobre.codigo =".$code;

            //MANDA / O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM ARRAY
            if($rsLojas = mysqli_fetch_array($select)){
                //GUARDA OS DADOS EM VARIAVEIS
                $titulo = $rsLojas['titulo'];
                $texto = $rsLojas['texto'];
                $foto = $rsLojas['foto'];
                $descricao = $rsLojas['descricao'];
                
            }
        }
    }
?>
<div id="img_modal" class="back back_green_light_cms center">
    <img src="../../imgs/<?=$foto?>">
</div>
<table id="table_modal">
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Titulo: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$titulo?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Texto: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$texto?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Modo </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$descricao?></p></td>
    </tr>
</table>