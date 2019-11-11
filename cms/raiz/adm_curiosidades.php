<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();
?>
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
                <form method="post"  action="../bd/salvarCuriosidade.php" name="frmcuriosidades" enctype="multipart/form-data">
                    <table class="frm_curiosidades center fonte back_green_dark_cms color_white">
                        <tr>
                            <td rowspan="6" style="background-color: #000000;" id="frm_curiosidades_foto">

                            </td>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Título: </p>
                            </td>
                            <td> <input name="txttitulo" placeholder="Digite o titulo da curiosidade" class="fonte" type="text" maxlength="150" required size="45"> </td>
                        </tr>
                        <tr>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Texto: </p>
                            </td>
                            <td> <textarea class="caixa_texto fonte" maxlength="4000" name="txttexto" required ></textarea> </td>
                        </tr>
                        <tr>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Cor da faixa: </p>
                            </td>
                            <td> 
                                <?php
                                    $sql = "select * from tblcolors";

                                    $select = mysqli_query($conexao, $sql);

                                    while($rsColors = mysqli_fetch_array($select))
                                    {
                                ?>
                                        <div class="colors">
                                            <div class="color <?=$rsColors['classe_css']?> float">
                                                <input name="rdocolor" value="<?=$rsColors['codigo']?>" type="radio" class="radio">
                                            </div>
                                            <div class="title_color float"> <p> <?=$rsColors['nome']?> </p></div>
                                        </div>
                                        <div class="space_colors"></div>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="frm_curiosidades_name txt_center">
                                <p> Foto: </p>
                            </td>
                            <td>
                                <input class="input" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                            </td>
                        </tr>
                        <tr rowspan="2">
                            <td colspan="2">
                                <input class="botao back_green_cms color_white fonte btn_users" type="submit" value="criar" name="btncuriosidades">
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