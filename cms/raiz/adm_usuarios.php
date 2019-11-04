<?php

    //variaveis globais
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $botaoNivel = "CRIAR";
    $botaoUsuario = "CRIAR";
    $codeNivel = 0;

    //Variavel de sessão ~iniciando
    if(!isset($_SESSION))
    {
        session_start();    
    }

    //Importa o arquivo de conexao
    require_once('../../bd/conexao.php');
            
    //chamada da função que conecta com o banco
    $conexao =  conexaoMysql();

//****************** PARA EDITAR NÍVEIS E USUÁRIOS ******************/
    //valida se existe a variável modo
    if(isset($_GET['modo']))
    {
        // valida se a ação de modo é editar
        if($_GET['modo'] == 'editar')
        {
            // resgata o código do registro
            $codigo = $_GET['codigo'];
            
            //variavel de sessão p/ outro arquivo
            $_SESSION['codigo'] = $codigo;

            //verifca se existe a variavel form
            if(isset($_GET['form']))
            {
                //verifica se a variavel form é do usuário
                if($_GET['form'] == 'usuario')
                {
                    //script para mandar p/ o bd
                    $sql = "select tblusuarios.*, tblniveis.descricao
                    from tblusuarios inner join tblniveis
                    on tblniveis.codigo = tblusuarios.codenivel
                    where tblusuarios.codigo =".$codigo;

                    //conecta e envia o script
                    $select = mysqli_query($conexao, $sql);  
                    
                    //verifica se a conexao foi realizada com sucesso
                    if($select)
                    {
                        //Trasnformando os dados em array
                        $rsUsuarios = mysqli_fetch_array($select);

                        //Resgate dos dados
                        $nomeUsuario = $rsUsuarios['nome'];
                        $email = $rsUsuarios['email'];
                        $celular = $rsUsuarios['celular'];
                        $usuario = $rsUsuarios['login'];
                        $rg = $rsUsuarios['rg'];
                        $cpf = $rsUsuarios['cpf'];
                        $nivel = $rsUsuarios['descricao'];
                        $senha = $rsUsuarios['senha'];
                        $codeNivel = $rsUsuarios['codenivel'];
                    }

                    //muda o value do botão
                    $botaoUsuario = "EDITAR";
                }

                //verifica se a variavel form é do nivel
                elseif($_GET['form'] == 'nivel')
                {
                    //script para mandar p/ o bd
                    $sql = "select * from tblniveis where codigo =".$codigo;

                    //conecta e envia o script
                    $select = mysqli_query($conexao, $sql);

                    //verifica se a conexao foi realizada com sucesso
                    if($select)
                    {
                        //Trasnformando os dados em array
                        $rsNiveis = mysqli_fetch_array ($select);
                        
                        //Resgate dos dados
                        $nomeNivel = $rsNiveis['descricao'];
                        $adm_conteudo = $rsNiveis['adm_conteudo'];
                        $adm_cliente = $rsNiveis['adm_cliente'];
                        $adm_usuarios = $rsNiveis['adm_usuarios'];

                        //verifica quais permissões estão ativas
                        if($adm_conteudo == 1){
                            $checked1 = 'checked';
                        }
                        if($adm_cliente == 1){
                            $checked2 = 'checked';
                        }
                        if($adm_usuarios == 1){
                            $checked3 = 'checked';
                        }

                        //muda o value do botão
                        $botaoNivel = "EDITAR";

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
                <form method="post" action="../bd/salvarUsuario.php" name="frmusuarios" >
                    <table class="frm_usuarios center fonte back_green_dark color_white">
                        <tr>
                            <td colspan="3" class="txt_center back_pink">
                                <h2>  Crie Usuários </h2>
                            </td>
                        </tr>
                            <td  class="frm_usuarios_img back_green_light" rowspan="10">
                                <div class="icon_user div_usuarios_img back"></div>
                            </td>
                            <td colspan="2">
                                <a href="crud_usuarios.php" class="back btn_usuarios_ver botao">
                                    <img src="../imgs/icon_eye.png" alt="imagem" title="ver usuários">
                                </a>
                            </td>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nome: </p>
                            </td>
                            <td> <input value="<?=@$nomeUsuario?>" name="txtnome" placeholder="Digite seu nome" class="fonte" type="text" maxlength="100" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Email: </p>
                            </td>
                            <td> <input value="<?=@$email?>" name="txtemail" placeholder="Digite seu email" class="fonte" type="email" maxlength="1000" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Celular: </p>
                            </td>
                            <td> <input value="<?=@$celular?>" name="txtcelular" placeholder="Digite seu celular" class="fonte" type="text" maxlength="15" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name  txt_center">
                                <p> Usuário: </p>
                            </td>
                            <td> <input value="<?=@$usuario?>" name="txtnameuser" placeholder="Digite seu nome de usuário" class="fonte" type="text" maxlength="100" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> RG: </p>
                            </td>
                            <td> <input value="<?=@$rg?>" name="txtrg" placeholder="00.000.000-0" class="fonte" type="text" maxlength="12" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> CPF: </p>
                            </td>
                            <td> <input value="<?=@$cpf?>" name="txtcpf" placeholder="000.000.000-00" class="fonte" type="text" maxlength="14" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nível: </p>
                            </td>
                            <td> 
                                <select name="slcnivel" id="frm_users_select" class="fonte">
                                    <?php
                                        //verifica a ação do modo e do form
                                        if($_GET['modo'] == 'editar' && $_GET['form'] == 'usuario'){ ?>
                                        <option value="<?=$codeNivel?>"> <?=$nivel?> </option>

                                    <?php
                                        } else {
                                    ?>
                                        <option value=""> Selecione um nivel </option>
                                    <?php
                                        }    
                                        //script p/ o bd 
                                        $sql = "select * from tblniveis where codigo <> ".$codeNivel;

                                        //conexao com o bd
                                        $select = mysqli_query($conexao, $sql);

                                        //exibe enquanto exitir dados no array
                                        while($rsNiveis = mysqli_fetch_array($select)){
                                    ?>
                                        <option value="<?=$rsNiveis['codigo']?>"> <?=$rsNiveis['descricao']?> </option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Senha: </p>
                            </td>
                            <td> <input name="txtsenha" placeholder="Digite seu senha" class="fonte" type="text" maxlength="20" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="txt_center" colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="<?=$botaoUsuario?>" name="btncreateuser">
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
                            <td> <input name="txtnome" placeholder="Digite o nome do nível" class="fonte" type="text" maxlength="100" required size="41" value="<?=@$nomeNivel?>"> </td>
                        </tr>
                        <tr rowspan="3">
                            <td class="frm_usuarios_name txt_center">
                                <p> Permissões: </p>
                            </td>
                            <td style="box-sizing: border-box; padding-top: 10px; "> 
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkconteudo" <?=$checked1?>> 
                                    <p class="float"> Administração de Conteúdo </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkcliente" <?=$checked2?>> 
                                    <p class="float"> Administração Fale Conosco </p>
                                </div>
                                <div class="checkbox_nivel_container">
                                    <input class="checkbox_nivel float" type="checkbox" value="1" name="chkusers" <?=$checked3?>>
                                    <p class="float"> Administração de Usuários </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="txt_center"  colspan="2">
                                <input class="botao back_green color_white fonte btn_users" type="submit" value="<?=$botaoNivel?>" name="btncreatenivel">
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