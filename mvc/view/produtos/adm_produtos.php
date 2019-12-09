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
                //Function p/ fazer o upload e o preview da imagem
                $('#fileFoto').live('change', function(){
                    $('#formFoto').ajaxForm({
                        target: '#img_curiosidades' //Call Back do upload.php
                    }).submit();
                });

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

                <table class="center back_green_dark_cms">
                    <tr>
                        <td rowspan="3">
                            <!-- Mostrar Imagem -->
                            <div id="img_curiosidades" class="back back_green_light_cms">
                                <?php if(isset($_GET['modo'])) {?>
                                    <img src="../imgs/<?=$foto?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                        </td>
                        <td>
                            <!-- Form da foto -->
                            <form method="post"  action="router.php?controller=produtos&modo=foto"  class="fonte center back_green_dark_cms form_produtos color_white" name="frmfoto" id="formFoto" enctype="multipart/form-data">
                                <!-- FOTO -->
                                <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                        <input <?php if(!isset($_GET['modo'])){?>required<?php }?> class="card_curiosidades_file fonte" id="fileFoto" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Form das categorias -->
                            <form method="post"  action="router.php?controller=subcategorias&modo=buscarporcategoria"  class="fonte center back_green_dark_cms form_produtos color_white" name="frmcategorias" id="formCategorias">
                                <!-- CATEGORIA -->
                                <div class="card_curiosidades">
                                    <div class="card_curiosidades_name"> <p>Categoria:</p>  </div>
                                    <select name="sltcategorias" id="sltCategorias" class="fonte card_curiosidades_input">
                                        <option value="">Selecione</option>
                                        <?php 
                                            //Importe do arquivo 
                                            require_once('controller/categoriaController.php');

                                            //instancia
                                            $categorias = new CategoriaController();

                                            if(isset($_GET['modo'])){
                                                    ?>
                                                    <option value="<?=$codeCategoria?>">
                                                        <?=$nomeCategoria?>
                                                    </option> 
                                        <?php 
                                                //Método que faz o select
                                                $select = $categorias->listaCategoria($codeCategoria);
                                            }
                                            else{
                                                //Método que faz o select
                                                $select = $categorias->listaCategoria(0);
                                            }
                                            
                                            //Contador
                                            $cont = 0;

                                            //Laço
                                            while($cont < count($select)){
                                        ?>
                                            <option value="<?=$select[$cont]->getCodigo()?>">
                                                <?=$select[$cont]->getNome()?>
                                            </option>    
                                        <?php
                                            $cont++;
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Formulário Para Criar Produtos -->
                            <form method="post"  action="<?=$action?>"  class="fonte center back_green_dark_cms form_produtos color_white" name="frmprodutos" enctype="multipart/form-data">
                                <!-- Restante do formulário -->
                                <div id="card_curiosidades">
                                    <!-- SUBCATEGORIAS -->
                                    <div class="card_curiosidades_big">
                                        <div class="card_curiosidades_name"> <p>Subcategorias:</p>  </div>
                                        
                                        <div class="colors back" id="sub">
                                            <h1 style="margin-top: 55px"> Selecione uma categoria </h1>
                                        </div>
                                        
                                    </div>
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
                                    <!-- DESTAQUE -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Destaque:</p>  </div>
                                        <input  name="chkdestaque" value="1" type="checkbox" class="radio">
                                    </div>
                                    <!-- TEXTO DESTAQUE -->
                                    <div class="card_curiosidades_big">
                                        <div class="card_curiosidades_name"> <p>Texto Dest.:</p>  </div>
                                        <textarea class="card_curiosidades_texto fonte" maxlength="400" name="txttexto" ><?=@$texto?></textarea>
                                    </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                            <div class="card_curiosidades_name"> <p>Foto Dest.:</p>  </div>
                                            <input class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
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