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
            $sql = "select * from tbllojas where codigo =".$code;

            //MANDA / O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM ARRAY
            if($rsLojas = mysqli_fetch_array($select)){
                //GUARDA OS DADOS EM VARIAVEIS
                $cidade = $rsLojas['cidadeestado'];
                $local = $rsLojas['local'];
                $endereco = $rsLojas['endereco'];
                $numero = $rsLojas['numero'];
                $telefone = $rsLojas['telefone'];
                $celular = $rsLojas['celular'];
                $horario = $rsLojas['horario'];
                $foto = $rsLojas['foto'];
            }
        }
    }
?>
<div id="img_modal" class="back back_green_light_cms center">
    <img src="../../imgs/<?=$foto?>">
</div>
<table id="table_modal">
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Cidade - UF: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$cidade?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Local: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$local?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Endereco: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$endereco?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Numero: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$numero?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Telefone: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$telefone?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Celular: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$celular?></p></td>
    </tr>
    <tr>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p> Horario: </p></td>
        <td class="lojas_coluna fonte back_green_cms color_white"> <p><?=$horario?></p></td>
    </tr>
</table>