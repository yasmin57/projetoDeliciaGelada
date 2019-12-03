<?php
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO -->
        <?php require_once("../header.php"); ?>
        
        <div id="bemvindo">
            <section class="conteudo center fonte txt_center"> 
                <!-- Botao p/ gerenciar as categorias -->
                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="../categorias/adm_categorias.php"> Gerencie as Categorias </a>
                </div>
                <!-- Botao p/ gerenciar as subcategorias -->
                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="../subcategorias/adm_subcategorias.php"> Gerencie as Sub-Categorias </a>
                </div>

            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("../footer.php"); ?>
    </body>
</html>