<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="usuarios_container">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>
                
                <form method="post" action="" name="frmusuarios" >
                    <table id="frm_usuarios" class="center fonte">
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Nome: </p>
                            </td>
                            <td class="back_pink_light"> <input name="txtnome" class="fonte" type="text" maxlength="100" required size="29"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Email: </p>
                            </td>
                            <td class="back_pink_light"> <input name="txtemail" class="fonte" type="email" maxlength="1000" required size="29"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Telefone: </p>
                            </td>
                            <td class="back_pink_light"> <input name="txttelefone" class="fonte" type="text" maxlength="15" required size="29"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Registro: </p>
                            </td>
                            <td class="back_pink_light"> <input name="txtregistro" class="fonte" type="text" maxlength="5" required size="29"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Nível: </p>
                            </td>
                            <td class="back_pink_light"> 
                                <select name="slcnivel" id="frm_users_select" class="fonte">
                                    <option value="1"> Nível Administrador </option>
                                    <option value="2"> Nível Operador de Conteúdo </option>
                                    <option value="3"> Relacionamento com o Cliente </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name back_black color_white txt_center">
                                <p> Senha: </p>
                            </td>
                            <td class="back_pink_light"> <input name="txtsenha" class="fonte" type="text" maxlength="1000" required size="29"> </td>
                        </tr>
                        <tr>
                            <td class="back_black color_white txt_center" colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="CRIAR" name="btncreateuser">
                            </td>
                        </tr>
                    </table>
<!--
                
                    <div class="itens_frm_users">
                        
                    </div>
-->
                </form>                
                
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>