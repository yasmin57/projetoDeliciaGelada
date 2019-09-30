<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/index_cms.css" rel="stylesheet">
        <link type="text/css" href="../css/cms.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
        
        
        <!-- MENU -->
        <div id="menu" class="back_pink">
            <div class="conteudo center back_pink">
                <table>
                    <tr>
                        <td class="menu_itens">
                            <div class="menu_icon back" id="adm_conteudo"></div>
                            <div class="menu_option fonte botao"><p>Adm. Conteúdo</p></div>
                        </td>
                        <td class="menu_itens">
                            <div class="menu_icon back" id="adm_fale"></div>
                            <div class="menu_option fonte botao"><p>Adm. Fale Conosco</p></div>
                        </td>
                        <td class="menu_itens"></td>
                        <td class="menu_itens">
                            <div class="menu_icon back" id="adm_usuarios"></div>
                            <div class="menu_option fonte botao"><p>Adm. Usuários</p></div>
                        </td>
                        <td class="menu_itens" colspan="2">
                            <div class="menu_mensagem fonte"><p> Bem Vindo, Yasmin Pereira da Silva</p></div>
                            <div class="menu_mensagem fonte botao logout back_green_dark"><a>logout</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- CONTEÚDO -->
        <div id="opcoes">
            <div class="conteudo center">
                <div class="opcoes">
                    <img src="../imgs/icon_option.png" class="img_page float">
                    <div class="name_page float fonte botao"> <a> Curiosidades </a></div>
                </div>
                <div class="opcoes">
                    <img src="../imgs/icon_option.png" class="img_page float">
                    <div class="name_page float fonte botao"> <a> Sobre </a></div>
                </div>
                <div class="opcoes">
                    <img src="../imgs/icon_option.png" class="img_page float">
                    <div class="name_page float fonte botao"> <a> Promoções </a></div>
                </div>
                <div class="opcoes">
                    <img src="../imgs/icon_option.png" class="img_page float">
                    <div class="name_page float fonte botao"> <a> Lojas </a></div>
                </div>
                <div class="opcoes">
                    <img src="../imgs/icon_option.png" class="img_page float">
                    <div class="name_page float fonte botao"> <a> Produto do Mês </a></div>
                </div>
            </div>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>