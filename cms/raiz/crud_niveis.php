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
    $botaoNivel = "CRIAR";
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

//****************** PARA EDITAR NÍVEIS ******************/
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
                //verifica se a variavel form é do nivel
                if($_GET['form'] == 'nivel')
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
        <script src="../js/jquery.js"></script>

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
                <div id="fechar_modal" class="botao back_pink_light color_white fonte">Fechar</div>
            </div>
        </div>

        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>

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
                                <a href="#ver" class="back btn_usuarios_ver botao">
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

                <!-- EXIBINDO NÍVEIS -->
                <table id="ver" class="center fonte txt_center contatos_table">
                    <tr class="contatos_linha">
                        <td colspan="5"><h1> Níveis </h1></td>
                    </tr>
                    <tr class="contatos_linha back_pink color_white">
                        <td>
                            <p> Nome:</p>
                        </td>
                        <td>
                            <p> Adm Conteúdo:</p>
                        </td>
                        <td>
                            <p> Adm Fale Conosco:</p>
                        </td>
                        <td>
                            <p> Adm Usuários:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblniveis";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsNiveis = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha back_green color_white">
                        <td>
                            <p> <?=$rsNiveis['descricao']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_conteudo']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_cliente']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_usuarios']?></p>
                        </td>
                        <td>
                            <a href="adm_usuarios.php?modo=editar&codigo=<?=$rsNiveis['codigo']?>&form=nivel" class="contatos_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png">
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