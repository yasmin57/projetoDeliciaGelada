<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //VARIAVEL QUE FICA NO VALUE DO BOTÃO
    $botao = "CRIAR";

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){

            $code = $_GET['codigo'];

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['codigo'] = $code;

            $sql = "select * from tblsobredestaque where codigo =".$code;

            $select = mysqli_query($conexao, $sql);

            $rsSobre = mysqli_fetch_array($select);

            $texto = $rsSobre['texto'];

            $botao = "EDITAR";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>CMS | Delicia Gelada</title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/conteudo.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>

        <?php if (isset($_SESSION['erroUpload'])){
                     echo($_SESSION['erroUpload']);
                     unset($_SESSION['erroUpload']);
                }
        ?>
        <!-- SCRIPT P/ ABRIR A MODAL -->
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
                    url:"modalSobre.php",
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
        <div id="curiosidades">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração Sobre a Empresa </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_sobre.php"> Gerencie os outros textos </a>
                </div>

                <h1 class="txt_center"> Gerencie o Texto Destaque</h1>

                <!-- Formulário Para Criar Páginas -->
                <form method="post"  action="../bd/salvarSobreDestaque.php"  class="color_white center back_green_dark_cms form_curiosidades" name="frmsobre" enctype="multipart/form-data">
                    <!-- Restante do formulário -->
                    <div id="card_curiosidades">
                        <!-- TEXTO -->
                        <div class="card_curiosidades_big">
                            <div class="card_curiosidades_name"> <p>Texto:</p>  </div>
                            <textarea class="card_curiosidades_input fonte" maxlength="3000" name="txttexto" required ><?=@$texto?></textarea>
                        </div>
                        <!-- BOTÃO -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" class="botao back_green_cms color_white fonte btn_curiosidades center" type="submit" value="<?=$botao?>" name="btnsobredestaque">
                        </div>
                    </div>    
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="4"><h1> Sessões Existentes: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td colspan="3">
                            <p> Texto: </p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblsobredestaque";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsSobre = mysqli_fetch_array($select)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td colspan="3" style="width: 700px; padding: 30px;">
                            <p> <?=$rsSobre['texto']?> </p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_sobreDestaque.php?modo=editar&codigo=<?=$rsSobre['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao"
                                <?php
                                    if($rsSobre['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode excluir essa sessão enquanto ela estiver ativada!');"
                                <?php
                                    } else {
                                ?>
                                    onclick="return confirm('Deseja excluir essa sessão?');" href="../bd/deletarSobreDestaque.php?modo=excluir&codigo=<?=$rsSobre['codigo']?>"
                                <?php
                                    }
                                ?>
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>

                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                <?php
                                    if($rsSobre['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode manter desativada essa sessão! Clique na sessão que deseja ativar');"
                                <?php
                                    } else {
                                ?>
                                    href="../bd/on_offSobreDestaque.php?status=<?=$rsSobre['status']?>&codigo=<?=$rsSobre['codigo']?>"  
                                <?php
                                    }
                                ?>
                            >
                                <?php if($rsSobre['status'] == 1) { ?>
                                    <img src="../imgs/icon_on.png" alt="imagem"> 
                                <?php } else { ?>
                                    <img src="../imgs/icon_off.png" alt="imagem">
                                <?php } ?>
                            </a>
                        </td>
                    </tr>
                    <?php
                         } ?>
                </table>

            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>

    </body>
</html>