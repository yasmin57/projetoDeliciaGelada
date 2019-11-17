<?php

    //VAR QUE FICA NO VALUE DO BOTÃO
    $botao = "SALVAR";

    //IMPORTA O ARQUIVO DE CONEXÃO
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO DE CONEXÃO
    $conexao = conexaoMysql();
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>CMS | Delicia Gelada</title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/conteudo.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.form.js"></script>
        <script>
           $(document).ready(function(){
                //Function p/ fazer o upload e o preview da imagem
                $('#fileFoto').live('change', function(){
                    $('#formFoto').ajaxForm({
                        target: '#img_curiosidades_topo' //Call Back do upload.php
                    }).submit();
                });
            });
        </script>
    </head>
    <body>

        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
                
        <!-- CONTEÚDO -->
        <div id="curiosidades">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Lojas </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_lojas.php"> Gerencie as Lojas </a>
                </div>

                <div style="min-height: 200px; width: 650px;" class="back_green_dark_cms center">
                        <!-- Formulário da foto  -->
                        <form action="../bd/uploadTopoLoja.php" enctype = "multipart/form-data" name="frmtopolojas"
                            method="post"class="color_white" id="formFoto">

                            <div id="card_lojas_topo" class="back_green_dark_cms center">
                                <!-- Exibir foto -->
                                <div id="img_curiosidades_topo" class="back back_green_light_cms center">
                                    <img src="../imgs/icon_image.png" alt="imagem">
                                </div>

                            
                                <!-- Selecionar foto -->
                                <div class="card_curiosidades">
                                    <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                    <input class="card_curiosidades_file fonte" type="file" name="flefoto" 
                                    accept="image/jpeg, image/png, image/jpg" id="fileFoto">
                                </div>
                            </div>
                    </form>
                    <!-- FORM DO BOTÃO -->
                    <form action="../bd/salvarTopoLoja.php" name="frmbtnloja"
                        method="post" class="color_white">

                        <div id="card_lojas_topo" class="back_green_dark_cms center">
                            <!-- Botão -->
                            <div class="card_curiosidades">
                                <input style="margin-top: 15px" 
                                class="botao back_green_cms color_white fonte btn_curiosidades center" 
                                type="submit" value="<?=$botao?>" name="btnlojas">
                            </div>
                        </div>

                    </form>
                </div>
                
                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="3"><h1> Fotos: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Código: </p>
                        </td>
                        <td>
                            <p> Foto: </p>
                        </td>
                        <td>
                            <p> Opções: </p>
                        </td>
                    </tr>
                    <?php
                        //SCRIPT
                        $sql = "select * from tbltopolojas";

                        //MANDA P/ O BD
                        $select = mysqli_query($conexao, $sql);

                        //LAÇO ENQUANTO EXISTIR CONTEÚDO NO ARRAY DE DADOS
                        while($rsLojas = mysqli_fetch_array($select)){
                    ?>
                        <tr class="exibir_linha back_green_cms color_white">
                            <td>
                                <p> <?=$rsLojas['codigo']?> </p>
                            </td>
                            <td>
                                <img src="../../imgs/<?=$rsLojas['foto']?>" class="img_cadastro_topo"> 
                            </td>
                            <td>
                                <!-- ICONE EXCLUIR -->
                                <a class="exibir_icon float botao visualizar"
                                    <?php if($rsLojas['status'] == 1) {
                                    ?>
                                        onclick="alert('Você não pode apagar essa sessão enquanto ela estiver ativa!');"
                                    <?php } else { ?>
                                        onclick="return confirm('Deseja excluir esse registro?');" href="../bd/deletarTopoLojas.php?modo=excluir&codigo=<?=$rsLojas['codigo']?>&nomeFoto=<?=$rsLojas['foto']?>"
                                    <?php } ?>
                                >
                                    <img src="../imgs/icon_excluir.png" alt="imagem">
                                </a>

                                <!-- ICONE ATIVO/DESATIVO -->
                                <a class="exibir_icon float botao" 
                                    <?php if($rsLojas['status'] == 1) {
                                    ?>
                                        onclick="alert('Você não pode desativar essa sessão! Clique apenas na que deseja ativar.');"
                                    <?php } else { ?>
                                    href="../bd/on_offTopoLojas.php?status=<?=$rsLojas['status']?>&codigo=<?=$rsLojas['codigo']?>"  
                                    <?php } ?>
                                >
                                    <?php if($rsLojas['status'] == 1) { ?>
                                        <img src="../imgs/icon_on.png" alt="imagem"> 
                                    <?php } else { ?>
                                        <img src="../imgs/icon_off.png" alt="imagem">
                                    <?php } ?>
                                </a>
                            </td>
                        </tr>
                    <?php     
                        }
                    ?>
                </table>
            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</htm>