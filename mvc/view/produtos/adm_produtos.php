<?php
    $action = 'router.php?controller=produtos&modo=novo';

    if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="view/css/style.css" rel="stylesheet">
        <script src="view/js/jquery.js"></script>
        <script src="view/js/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                

                $('#sltCategorias').live('change', function(){
                    $('#formCategorias').ajaxForm({
                        target: '#sub'
                    }).submit();
                });
            });
        </script>
    </head>
    <body>
        <!-- CABEÇALHO -->
        <?php require_once("view/header.php"); ?>
        
        <div id="categorias">
            <section class="conteudo center fonte txt_center"> 
                <h1 class="txt_center">Administração dos Produtos </h1>

                <table id="tblprodutos" class="center back_green_dark_cms">
                    <tr>
                        <td>
                            <!-- Mostrar Imagem -->
                            <div id="img_curiosidades" class="back back_green_light_cms">
                                <?php if(isset($_GET['modo'])) {?>
                                    <img src="../../imgs/<?=$foto?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                            <!-- Mostrar Imagem -->
                            <div id="img_curiosidades" class="back back_green_light_cms">
                                <?php if(isset($_GET['modo'])) {?>
                                    <img src="../../imgs/<?=$foto?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                            <!-- Mostrar Imagem -->
                            <div id="img_curiosidades" class="back back_green_light_cms">
                                <?php if(isset($_GET['modo'])) {?>
                                    <img src="../imgs/<?=$foto?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                        </td>
                        <!-- FORM PRINCIPAL -->
                        <td>
                            <form method="post"  action="<?=$action?>"  class="fonte center back_green_dark_cms form_produtos color_white" name="frmprodutos" enctype="multipart/form-data">
                                <div id="card_curiosidades">
                                    <!-- NOME -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Nome:</p>  </div>
                                        <input value="<?=@$nome?>" name="txtnome" placeholder="Digite o nome do produto" class="fonte card_curiosidades_input" type="text" maxlength="50" required size="45">
                                    </div>
                                    <!-- DESCRICAO -->
                                    <div class="card_curiosidades_big">
                                        <div class="card_curiosidades_name"> <p>Descricao:</p>  </div>
                                        <textarea class="card_curiosidades_texto fonte" maxlength="400" name="txtdescricao" required ><?=@$texto?></textarea>
                                    </div>
                                    <!-- PRECO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Preço:</p>  </div>
                                        <input value="<?=@$nome?>" name="txtpreco" placeholder="Digite o preço do produto" class="fonte card_curiosidades_input" type="text" maxlength="10" required size="45">
                                    </div>
                                    <!-- DESCONTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Desconto:</p>  </div>
                                        <input value="<?=@$nome?>" name="txtdesconto" placeholder="Digite o percentual de deconto. Ex: 10" class="fonte card_curiosidades_input" type="text" maxlength="2" required size="45">
                                    </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                        <input <?php if(!isset($_GET['modo'])){?>required<?php }?> class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <div class="card_curiosidades">
                                    </div>
                                    <!-- DESTAQUE -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Destaque:</p>  </div>
                                        <input id="destaque" name="chkdestaque" value="1" type="checkbox" class="radio">
                                    </div>
                                    <!-- DESCRICAO -->
                                        <div class="card_curiosidades_big">
                                            <div class="card_curiosidades_name"> <p>Descricao:</p>  </div>
                                            <textarea class="card_curiosidades_texto fonte" maxlength="400" name="txttextodesc" required ><?=@$texto?></textarea>
                                        </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                        <input <?php if(!isset($_GET["modo"])){?>required<?php }?> class="card_curiosidades_file fonte" type="file" name="flefotodesc" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto de fundo:</p>  </div>
                                        <input <?php if(!isset($_GET["modo"])){?>required<?php }?> class="card_curiosidades_file fonte" id="fileFoto" type="file" name="flebackdesc" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <div class="card_curiosidades">
                                    </div>
                                    <div class="card_curiosidades">
                                        <input style="margin-top: 15px" class="botao back_orange_cms color_white fonte btn_curiosidades center" type="submit" value="SALVAR" name="btnprodutos">
                                    </div>
                                </div>
                            </form>
                        </td> 
                    </tr>
                </table>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("view/footer.php"); ?>
    </body>
</html>