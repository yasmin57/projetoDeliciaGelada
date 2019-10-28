<?php

    //valida se existe a variável modo
    if(isset($_GET['modo']))
    {
        // valida se a ação de modo é editar
        if($_GET['modo'] == 'editar')
        {
            //Importa o arquivo de conexao
            require_once('../../bd/conexao.php');
            
            //chamada da função que conecta com o banco
            $conexao =  conexaoMysql();
            
            // resgata o código do registro
            $codigo = $_GET['codigo'];
            
            //verifca se existe a variavel form
            if(isset($_GET['form']))
            {
                //verifica se a variavel form é do nivel
                if($_GET['form'] == 'nivel')
                {
                    $sql = "select * from tblniveis where codigo =".$codigo;
            
                    $select = mysqli_query($conexao, $sql);

                    if($select)
                    {
                        $rsNiveis = mysqli_fetch_array ($select);
                        
                        $nome = $rsNiveis['nome'];
                        

                    }
                }
                
            }
            
            
            
        }
    }

    

    

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
                            <td  class="frm_usuarios_img back_green_light" rowspan="9">
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
                            <td> <input name="txtemail" placeholder="Digite seu email" class="fonte" type="email" maxlength="1000" size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Celular: </p>
                            </td>
                            <td> <input name="txtcelular" placeholder="Digite seu celular" class="fonte" type="text" maxlength="15"  size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Usuário: </p>
                            </td>
                            <td> <input name="txtnameuser" placeholder="Digite seu nome de usuário" class="fonte" type="text" maxlength="100" required size="41"> </td>
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
                            <td> <input name="txtsenha" placeholder="Digite seu senha" class="fonte" type="text" maxlength="20" required size="41"> </td>
                        </tr>
<!--
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Confirmar: </p>
                            </td>
                            <td> <input name="txtsenha2" placeholder="Confirme a sua senha" class="fonte" type="text" maxlength="1000" required size="41"> </td>
                        </tr>
-->
                        <tr>
                            <td class="txt_center" colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="CRIAR" name="btncreateuser">
                            </td>
                        </tr>
                    </table>
                </form>  
                
                <!-- Formulário Para Criar Níveis -->
                <form method="post" action="../bd/salvarNivel.php" name="frmniveis" >
                    <table class="frm_usuarios center fonte back_green_dark color_white">
                        <tr>
                            <td colspan="3" class="txt_center back_pink">
                                <h2>  Crie Níveis </h2>
                            </td>
                        </tr>
                        <tr> 
                            <td  class="frm_usuarios_img back_green_light" rowspan="7">
                                <div class="icon_level div_level_img back"></div>
                            </td>
                            <td colspan="2">
                                <a href="crud_usuarios.php" class="back btn_usuarios_ver botao">
                                    <img src="../imgs/icon_eye.png" alt="imagem" title="ver níveis">
                                </a>
                            </td>
                         </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nome: </p>
                            </td>
                            <td> <input name="txtnome" placeholder="Digite o nome do nível" class="fonte" type="text" maxlength="100" required size="41" value="<?=@$nome?>"> </td>
                        </tr>
                        <tr rowspan="3">
                            <td class="frm_usuarios_name txt_center">
                                <p> Permissões: </p>
                            </td>
                            <td style="box-sizing: border-box; padding-top: 10px; "> 
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkconteudo"> 
                                    <p class="float"> Administração de Conteúdo </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkcliente"> 
                                    <p class="float"> Administração Fale Conosco </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkusers">
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