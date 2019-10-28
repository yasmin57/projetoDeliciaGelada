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
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>
                
                <!-- Formulário Para Criar Usuários -->
                <form method="post" action="adm_usuarios.php" name="frmusuarios" >
                    <table class="frm_usuarios center fonte back_green_dark color_white">
                        <tr>
                            <td colspan="3" class="txt_center back_pink">
                                <h2>  Crie Usuários </h2>
                            </td>
                        </tr>
                        <tr>
                            <td  class="frm_usuarios_img back_green_light" rowspan="10">
                                <div class="icon_user div_usuarios_img back"></div>
                            </td>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nome: </p>
                            </td>
                            <td> <input name="txtnome" placeholder="Digite seu nome" class="fonte" type="text" maxlength="100" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Email: </p>
                            </td>
                            <td> <input name="txtemail" placeholder="Digite seu email" class="fonte" type="email" maxlength="1000" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Celular: </p>
                            </td>
                            <td> <input name="txtcelular" placeholder="Digite seu celular" class="fonte" type="text" maxlength="15" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Usuário: </p>
                            </td>
                            <td> <input name="txtnameuser" placeholder="Digite seu nome de usuário" class="fonte" type="text" maxlength="10" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> RG: </p>
                            </td>
                            <td> <input name="txtrg" placeholder="00.000.000-0" class="fonte" type="text" maxlength="12" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> CPF: </p>
                            </td>
                            <td> <input name="txtcpf" placeholder="000.000.000-00" class="fonte" type="text" maxlength="14" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nível: </p>
                            </td>
                            <td> 
                                <select name="slcnivel" id="frm_users_select" class="fonte">
                                    <option value="1"> Nível Administrador </option>
                                    <option value="2"> Nível Operador de Conteúdo </option>
                                    <option value="3"> Relacionamento com o Cliente </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Senha: </p>
                            </td>
                            <td> <input name="txtsenha" placeholder="Digite seu senha" class="fonte" type="text" maxlength="1000" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Confirmar: </p>
                            </td>
                            <td> <input name="txtsenha2" placeholder="Confirme a sua senha" class="fonte" type="text" maxlength="1000" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="txt_center" colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="CRIAR" name="btncreateuser">
                            </td>
                        </tr>
                    </table>
                </form>  
                
                <!-- Formulário Para Criar Níveis -->
                <form method="post" action="adm_usuarios.php" name="frmniveis" >
                    <table class="frm_usuarios center fonte back_green_dark color_white">
                        <tr>
                            <td colspan="3" class="txt_center back_pink">
                                <h2>  Crie Níveis </h2>
                            </td>
                        </tr>
                        <tr> 
                            <td  class="frm_usuarios_img back_green_light" rowspan="7">
                                <div class="icon_level div_level_img back"  ></div>
                            </td>
                         </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nome: </p>
                            </td>
                            <td> <input name="txtnome" placeholder="Digite o nome do nível" class="fonte" type="text" maxlength="100" required size="41"> </td>
                        </tr>
                        <tr rowspan="3">
                            <td class="frm_usuarios_name txt_center">
                                <p> Permissões: </p>
                            </td>
                            <td style="box-sizing: border-box; padding-top: 10px; "> 
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="permissao1"> 
                                    <p class="float"> Administração de Conteúdo </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="permissao2"> 
                                    <p class="float"> Administração Fale Conosco </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="permissao3">
                                    <p class="float"> Administração de Usuários </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="txt_center"  colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="CRIAR" name="btncreatenivel">
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


<!-- <div class="botao btn_users back_green txt_center"><a href="criar_usuarios.php" class="color_white"> Criar Usuário </a></div>
                
                <div class="botao btn_users back_green txt_center"><a href="criar_niveis.php" class="color_white"> Criar Nível </a></div> -->
                
                <!-- <div id="card_container">
                    <h1>Usuários:</h1> -->
                    

                    <!-- <div class="card_user"> -->
                        <!-- Ícone -->
                        <!-- <div class="user_image float"></div> -->
                        <!-- Status (ativado ou desativado) -->
                        <!-- <div class="user_status float"></div> -->
                        <!-- Setor e Nível -->
                        <!-- <div class="user_detals">
                            <p> Nome: </p>
                            <p> Nível: </p>
                        </div> -->
                        <!-- Editar -->
                        <!-- <div class="user_edit botao back_green txt_center">
                            <a class="color_white ">Editar</a>
                        </div>
                    </div> -->
                    
                <!-- </div> -->