<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>CMS | Delicia Gelada</title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/conteudo.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
                
        <!-- CONTEÚDO -->
        <div id="curiosidades">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Curiosidades </h1>

                <!-- Formulário Para Criar Páginas -->
                <form method="post" action="../bd/salvarNivel.php" name="frmniveis" >
                    <table class="frm_curiosidades center fonte back_green_dark color_white">
                        <tr>
                            <td rowspan="10">

                            </td>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Título: </p>
                            </td>
                            <td> <input name="txttitulo" placeholder="Digite o titulo da curiosidade" class="fonte" type="text" maxlength="100" required size="45"> </td>
                        </tr>
                        <tr>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Texto: </p>
                            </td>
                            <td> <textarea class="caixa_texto fonte" maxlength="4000" name="txtmensagem" required ></textarea> </td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="frm_curiosidades_name txt_center">
                                <p> Cor da faixa: </p>
                            </td>
                            <td > 
                                <div class="colors float">
                                    <div class="color color_site01 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Laranja </p></div>
                                </div>
                                <div class="colors float">
                                    <div class="color color_site02 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Roxo </p></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="colors float">
                                    <div class="color color_site03 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Amarelo </p></div>
                                </div>
                                <div class="colors float">
                                    <div class="color color_site04 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Verde </p></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="colors float">
                                    <div class="color color_site06 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Ciano </p></div>
                                </div>
                                <div class="colors float">
                                    <div class="color color_site07 float"> <input name="rdocolor" type="radio" class="radio"></div>
                                    <div class="title_color float"> <p> Rosa </p></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>

            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>

    </body>
</html>