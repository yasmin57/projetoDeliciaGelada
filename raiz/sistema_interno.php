<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Promoções| Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/sistema_interno.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
        
        <!-- CONTEUDO -->
        <div id="sistema_interno" class="back_green">
            <section class="conteudo back_green txt_center center fonte color_white">
                <h1> Deseja administrar os produtos?</h2>
                <h4> Insira os seus dados para efetuar o login.</h4>

                <div class="float back" id="imagem_adm"></div>

                <form method="get" name="frmcontato" action="../bd/inserir.php">
                    <table class="float">
                        <tr class="itens_frm fonte">
                            <td class="texto_frm">Nome:</td>
                            <td>  <input class="input" onkeypress="return validarEntrada(event, 'string');" type="text" maxlength="100" name="txtnome" size="45" required > </td>
                        </tr>
                        <tr class="itens_frm fonte">
                            <td  class="texto_frm">Senha:</td>
                            <td>  <input class="input" type="text" maxlength="15" name="txtsenha" size="45" required> </td>
                        </tr>
                        <tr class="itens_frm ">
                            <td colspan="2"> <input class="botao center back_yellow fonte" type="submit" name="btnlogar" value="LOGIN"> </td>
                        </tr>
                    </table>
                </form>

                <div class="float back" id="imagem_suco"></div>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>