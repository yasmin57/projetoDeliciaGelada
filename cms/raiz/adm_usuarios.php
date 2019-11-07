<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | ADM USUARIOS
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
                
        <!-- CONTEÚDO -->
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>
                
                <table id="usuarios_table" class="center back_green_limon color_white fonte">
                    <tr class="txt_center back_green_dark">
                        <td colspan="2" class="border_bottom border_right"><h2> Gerencie Usuários </h2></td>
                        <td colspan="2" class="border_bottom"><h2> Gerencie Níveis</h2></td>
                    </tr>
                    <tr>
                        <td class="usuarios_column" rowspan="5">
                            <a href="crud_usuarios.php" class="back center icon_usuarios">
                                <img src="../imgs/icon_user.png" class="border_radius_usuarios" title="gerencie usuários" alt="imagem"/>
                            </a>
                        </td>
                        <td class="usuarios_column border_right" rowspan="5">
                            <a href="crud_usuarios.php" class="color_white fonte"> <p class="link_menu"> Crie </p></a>
                            <a href="crud_usuarios.php" class="color_white fonte"> <p class="link_menu"> Consulte </p></a>
                            <a href="crud_usuarios.php" class="color_white fonte"> <p class="link_menu"> Atualize </p></a>
                            <a href="crud_usuarios.php" class="color_white fonte"> <p class="link_menu"> Delete </p></a>
                        </td>
                        <td class="usuarios_column" rowspan="5">
                            <a href="crud_niveis.php" class="back center icon_usuarios">
                                <img src="../imgs/icon_level.png" class="border_radius_usuarios back_green_light" title="gerencie níveis" alt="imagem"/>
                            </a>
                        </td>
                        <td class="usuarios_column" rowspan="5">
                            <a href="crud_niveis.php" class="color_white fonte"> <p class="link_menu"> Crie </p></a>
                            <a href="crud_niveis.php" class="color_white fonte"> <p class="link_menu"> Consulte </p></a>
                            <a href="crud_niveis.php" class="color_white fonte"> <p class="link_menu"> Atualize </p></a>
                        </td>
                    </tr>
                </table>

            </section>
        </div>
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>