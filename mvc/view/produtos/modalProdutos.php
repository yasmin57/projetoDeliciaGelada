<?php
    if(isset($_POST['modo'])){
        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE VISUALIZAR
        if($_POST['modo'] == "visualizar"){

            if(!isset($_SESSION))
                session_start();

            $modal = "modal";
            $_SESSION['modal'] = $modal;

            require_once('controller/produtoController.php');

            $controller = new ProdutoController();

            //Recebe o id do registro enviado pelo Ajax
            $codigo = $_POST['codigo'];

            $produto = $controller->produtoModal($codigo);

            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $preco = $produto->getPreco();
            $desconto = $produto->getDesconto();
            $foto = $produto->getFoto();
            $textoDest = $produto->getTextoDest();
            $fotoDest = $produto->getFotoDest();
            $backDest = $produto->getBackDest();

        }
    }
?>
<div class="back back_green_light_cms center img_modal">
    <img src="../imgs/<?=$foto?>">
</div>
<table id="table_modal">
    <tr>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p> Nome: </p></td>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p><?=$nome?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p> Descrição: </p></td>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p><?=$descricao?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p> Preço: </p></td>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p><?=$preco?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p> Desconto: </p></td>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p><?=$desconto?></p></td>
    </tr>
    <?php if($textoDest <> '') {?>
    <tr>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p> Texto Destaque: </p></td>
        <td class="contatos_coluna fonte back_green_cms color_white"> <p><?=$textoDest?></p></td>
    </tr>
    <?php }?>
</table>
<?php if($fotoDest <> '') {?>
    <h3>Foto Destaque: </h3>
    <div class="back back_green_light_cms center img_modal">
        <img src="../imgs/<?=$fotoDest?>">
    </div>
<?php }?>
<?php if($backDest <> '') { ?>
    <h3> Imagem de fundo Destaque: </h3>
    <div class="back back_green_light_cms center img_modal">
        <img src="../imgs/<?=$backDest?>">
    </div>
<?php }

    unset($_SESSION['modal']);
?>