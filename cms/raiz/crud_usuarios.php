<?php
    //IMPORTA O ARQUIVO DE CONEXÃO
    require_once('../../bd/conexao.php');
        
    //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
    $conexao = conexaoMysql();   

    //INICIA A VARIAVEL DE SESSÃO
    if(!isset($_SESSION))
    {
        session_start();
    }

    //variaveis globais
    $checked1 = "";
    $checked2 = "";
    $checked3 = "";
    $botaoUsuario = "CRIAR";
    $codeNivel = 0;

//****************** PARA EDITAR USUÁRIOS ******************/
    //valida se existe a variável modo
    if(isset($_GET['modo']))
    {
        // valida se a ação de modo é editar
        if($_GET['modo'] == 'editar')
        {
            // resgata os dados do registro
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
        <link type="text/css" href="../css/usersAndChat.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../../js/modulos.js"></script>
        <script src="../js/modulos.js"></script>
        <script src="../js/ancora.js"></script>

        <!-- CODE JS - MODAL -->
        <script>
            $(document).ready(function(){
                //abre a modal
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });
                
                $('#fechar_modal').click(function(){
                    $('#container').fadeOut(1000);
                })
            });
            
            function verDados(idItem)
            {
                $.ajax({
                    type:"POST",
                    url:"modalUsuarios.php",
                    data: {modo:'visualizar', codigo:idItem},
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                })
            }
        </script>
    </head>
    <body>
        <!-- MODAL -->
        <div id="container">
            <div id="modal">
                <div id="modalDados"></div>
                <div id="fechar_modal" class="botao back_pink_light_cms color_white fonte">Fechar</div>
            </div>
        </div>

        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>

                <!-- Botao p/ gerenciar níveis -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center"><a class="color_white" href="crud_niveis.php">Gerencie Níveis</a></div>
                
                <!-- Formulário Para Criar Usuários -->
                <form method="post" action="../bd/salvarUsuario.php" name="frmusuarios" >
                    <table class="frm_usuarios center fonte back_green_dark_cms color_white">
                        <tr>
                            <td colspan="3" class="txt_center back_pink_cms">
                                <h2>  Crie Usuários </h2>
                            </td>
                        </tr>
                            <td  class="frm_usuarios_img back_green_light_cms" rowspan="10">
                                <div class="icon_user div_usuarios_img back"></div>
                            </td>
                            <td colspan="2">
                                <a href="#ver" class="back btn_usuarios_ver botao">
                                    <img src="../imgs/icon_eye.png" alt="imagem" title="ver usuários">
                                </a>
                            </td>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> Nome: </p>
                            </td>
                            <td> <input onkeypress="return validarEntrada(event, 'string');" value="<?=@$nomeUsuario?>" name="txtnome" placeholder="Digite seu nome" class="fonte" type="text" maxlength="100" required size="41"> </td>
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
                            <td> <input id="celular" onkeypress="return  mascaraFone(this, event);" value="<?=@$celular?>" name="txtcelular" placeholder="Digite seu celular" class="fonte" type="text" maxlength="15" required size="41"> </td>
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
                            <td> <input id="rg" onkeypress="return mascaraRg(this, event);" value="<?=@$rg?>" name="txtrg" placeholder="00.000.000-0" class="fonte" type="text" maxlength="12" required size="41"> </td>
                        </tr>
                        <tr>
                            <td class="frm_usuarios_name txt_center">
                                <p> CPF: </p>
                            </td>
                            <td> <input id="cpf" onkeypress="return mascaraCpf(this, event);" value="<?=@$cpf?>" name="txtcpf" placeholder="000.000.000-00" class="fonte" type="text" maxlength="14" required size="41"> </td>
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
                            <td> 
                                <input id="senha" name="txtsenha" placeholder="Digite seu senha" class="fonte float" type="password" maxlength="20" required size="33"> 
                                <a class="botao float" onclick="mostrarSenha()">
                                    <img id="icon_senha" alt="imagem" src="../imgs/icon_eye_off.png">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="txt_center" colspan="2">
                                <input class="botao back_green_cms color_white fonte btn_users" type="submit" value="<?=$botaoUsuario?>" name="btncreateuser">
                            </td>
                        </tr>
                    </table>
                </form>

                <!-- EXIBIR USUÁRIOS -->
                <table id="ver" class="center fonte txt_center contatos_table">
                    <tr class="contatos_linha">
                        <td colspan="5"><h1> Usuários </h1></td>
                    </tr>
                    <tr class="contatos_linha back_pink_cms color_white">
                        <td>
                            <p> Nome:</p>
                        </td>
                        <td>
                            <p> Celular:</p>
                        </td>
                        <td>
                            <p> Usuário:</p>
                        </td>
                        <td>
                            <p> Nível:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select tblusuarios.*, tblniveis.descricao from tblusuarios inner join tblniveis on tblniveis.codigo = tblusuarios.codenivel";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsUsuarios = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha back_green_cms color_white">
                        <td>
                            <p> <?=$rsUsuarios['nome']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['celular']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['login']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['descricao']?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="crud_usuarios.php?modo=editar&codigo=<?=$rsUsuarios['codigo']?>&form=usuario" class="contatos_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>
                            <!-- ICONE LUPA -->
                            <a href="#" class="contatos_icon float botao visualizar" onclick="verDados(<?=$rsUsuarios['codigo']?>);" >
                                <img src="../imgs/icon_ver.png" alt="imagem">
                            </a>
                            <!-- ICONE EXCLUIR -->
                            <a class="contatos_icon float botao"
                                <?php
                                    if($rsUsuarios['nome'] == $_SESSION['nomeUsuario'])
                                    {
                                ?>
                                    onclick = "return alert('Você não pode excluir seu próprio usuário')"
                                <?php
                                    } else {
                                ?>
                                    onclick="return confirm('Deseja excluir esse usuário?');" href="../bd/deletar.php?modo=excluir&codigo=<?=$rsUsuarios['codigo']?>&page=admusuarios"
                                <?php
                                    } 
                                ?>
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>
                            
                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="contatos_icon float botao" 
                                <?php
                                    if($rsUsuarios['nome'] == $_SESSION['nomeUsuario'])
                                    {
                                ?>
                                    onclick = "return alert('Você não pode desativar seu próprio usuário')"
                                <?php
                                    } else {
                                ?>
                                    href="../bd/on_off.php?status=<?=$rsUsuarios['status']?>&codigo=<?=$rsUsuarios['codigo']?>&form=usuarios"
                                <?php
                                    } 
                                ?>    
                            >
                                <?php if($rsUsuarios['status'] == 1) { ?>
                                    <img src="../imgs/icon_on.png" alt="imagem"> 
                                <?php } else { ?>
                                    <img src="../imgs/icon_off.png" alt="imagem">
                                <?php } ?>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>