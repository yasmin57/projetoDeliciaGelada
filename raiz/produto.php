<?php
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $sql = "select * from tblprodutos where destaque = 1";

    $select = mysqli_query($conexao, $sql);

    $rs = mysqli_fetch_array($select);

    $titulo = $rs['nome'];
    $texto = $rs['textodestaque'];
    $foto = $rs['fotodestaque'];
    $back = $rs['backdestaque'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Produto Do Mês | Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/produto.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
       
       <!-- CONTEÚDO      -->
       <div id="produto_mes_main" style="background-image: url('../imgs/<?=$back?>')" class="back">
          <div class="conteudo back center">
             <div id="img_limao" class="back" style="background-image: url('../imgs/<?=$foto?>')"></div>
             <section class="fonte texto">
                <h2> <?=$titulo?> </h2>
                <p>
                    <?=$texto?>
                </p>
                 <div id="botoes">
                     <div class="produto_mes_btn fonte float"> <a href="home.php">Compre</a> </div>
                     <div class="produto_mes_btn fonte float"><a href="https://www.google.com.br" target="_blank">Saiba Mais</a></div>
                 </div>
             </section>
          </div>
       </div>
       
       <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>