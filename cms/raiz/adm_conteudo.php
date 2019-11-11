<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/conteudo.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="conteudo_opcoes">
            <div class="conteudo center">
                <div class="conteudo_opcoes">
                    <a href="adm_curiosidades.php"><img src="../imgs/icon_option.png" title="curiosidades" alt="imagem" class="conteudo_img_page float botao"></a>
                    <div class="conteudo_name_page float fonte botao"> <a href="adm_curiosidades.php"> Curiosidades </a></div>
                </div>
                <div class="conteudo_opcoes">
                    <img src="../imgs/icon_option.png" title="sobre" alt="imagem" class="conteudo_img_page float botao">
                    <div class="conteudo_name_page float fonte botao"> <a> Sobre </a></div>
                </div>
                <div class="conteudo_opcoes">
                    <img src="../imgs/icon_option.png" title="lojas" alt="imagem" class="conteudo_img_page float botao">
                    <div class="conteudo_name_page float fonte botao"> <a> Lojas </a></div>
                </div>
            </div>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>