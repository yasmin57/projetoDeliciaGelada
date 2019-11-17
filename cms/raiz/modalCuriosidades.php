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
            $sql = "select tblcuriosidades.*, tblcolors.classe_css, tblseparasessao.background from tblcuriosidades inner join tblseparasessao on tblcuriosidades.codeimg = tblseparasessao.codigo inner join tblcolors on tblcolors.codigo = tblcuriosidades.codecor where tblcuriosidades.codigo = ".$code;

            //MANDA / O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM ARRAY
            if($rsCuriosidades = mysqli_fetch_array($select)){
                //GUARDA OS DADOS EM VARIAVEIS
                $titulo = $rsCuriosidades['titulo'];
                $texto = $rsCuriosidades['texto'];
                $foto = $rsCuriosidades['foto'];
                $back = $rsCuriosidades['background'];
                $cor = $rsCuriosidades['classe_css'];
                
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
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Cor </p></td>
        <td class="lojas_coluna fonte <?=$cor?> color_white"> </td>
    </tr>
</table>
<h3>Imagem em baixo: </h3>
<div id="img_modal" class="back back_green_light_cms center">
    <img src="../../imgs/<?=$back?>">
</div>