<?php
    $action = 'router.php?controller=produtos&modo=novo';

    if(!isset($_SESSION))
        session_start();

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'buscar'){
            $nome = $dados->getNome();
            $descricao = $dados->getDescricao();
            $preco = $dados->getPreco();
            $desconto = $dados->getDesconto();
            $foto = $dados->getFoto();
            $destaque = $dados->getDestaque();
            $code = $dados->getCodigo();

            if($destaque == 1){
                $destaque = "checked";
                $textodest = $dados->getTextoDest();
                $fotodest = $dados->getFotoDest();
                $backdest = $dados->getBackDest();

                //Variaveis de sessão com os nomes das fotos
                $_SESSION['fotodest'] = $fotodest;
                $_SESSION['backdest'] = $backdest;
            }

            //Variaveis de sessão com os nomes das fotos
            $_SESSION['foto'] = $foto;
            
            
            $action = 'router.php?controller=produtos&modo=editar&id='.$code;
        }
    }

    //Cor
    function mostrarDestaque($valor)
    {
        if($valor == 1)
        {
            return $color = 'style="background-color: #1dcf38;"';
        }
        else
        {
            return $color = 'style="background-color: #c91c1c;"';
        }
    }
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
        <?php
            if(isset($_SESSION['erroUp'])){
                echo($_SESSION['erroUp']);
            }
        ?>
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
                            <div class="img_curiosidades back back_green_light_cms">
                                <?php if(isset($_GET['modo'])) {?>
                                    <img src="../imgs/<?=$foto?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                            <!-- Mostrar Imagem -->
                            <div id="" class="img_curiosidades back back_green_light_cms">
                                <?php if(isset($fotodest)) {?>
                                    <img src="../imgs/<?=$fotodest?>" alt="imagem"/>
                                <?php } else{?>
                                    <img src="view/imgs/icon_image.png" alt="imagem">
                                <?php }?>
                            </div>
                            <!-- Mostrar Imagem -->
                            <div id="" class=" img_curiosidades back back_green_light_cms">
                                <?php if(isset($backdest)) {?>
                                    <img src="../imgs/<?=$backdest?>" alt="imagem"/>
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
                                        <textarea class="card_curiosidades_texto fonte" maxlength="400" name="txtdescricao" required ><?=@$descricao?></textarea>
                                    </div>
                                    <!-- PRECO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Preço:</p>  </div>
                                        <input value="<?=@$preco?>" name="txtpreco" placeholder="Digite o preço do produto" class="fonte card_curiosidades_input" type="text" maxlength="10" required size="45">
                                    </div>
                                    <!-- DESCONTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Desconto:</p>  </div>
                                        <input value="<?=@$desconto?>" name="txtdesconto" placeholder="Digite o percentual de deconto. Ex: 10" class="fonte card_curiosidades_input" type="text" maxlength="2" required size="45">
                                    </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                        <input id='upload' <?php if(!isset($_GET['modo'])){?>required<?php }?> class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <div class="card_curiosidades">
                                    </div>
                                    <!-- DESTAQUE -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Destaque:</p>  </div>
                                        <input <?=@$destaque?> id="destaque" name="chkdestaque" value="1" type="checkbox" class="radio">
                                    </div>
                                    <!-- DESCRICAO -->
                                        <div class="card_curiosidades_big">
                                            <div class="card_curiosidades_name"> <p>Descricao:</p>  </div>
                                            <textarea class="card_curiosidades_texto fonte" maxlength="400" name="txttextodesc"  ><?=@$textodest?></textarea>
                                        </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                                        <input class="card_curiosidades_file fonte" type="file" name="flefotodesc" accept="image/jpeg, image/png, image/jpg">
                                    </div>
                                    <!-- FOTO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Foto de fundo:</p>  </div>
                                        <input class="card_curiosidades_file fonte" id="fileFoto" type="file" name="flebackdesc" accept="image/jpeg, image/png, image/jpg">
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
                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="6"><h1> Produtos: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Foto: </p>
                        </td>
                        <td>
                            <p> Nome:</p>
                        </td>
                        <td>
                            <p> Destaque:</p>
                        </td>
                        <td>
                            <p> Preco:</p>
                        </td>
                        <td>
                            <p> Desconto:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                <?php
                    //Importa o arquivo de controller
                    require_once('controller/produtoController.php');
                    //Instancia a classe
                    $produtoController = new ProdutoController();
                    //Guarda o retorno do método de listagem
                    $produto = $produtoController->listaProduto();

                    $cont = 0;

                    while($cont < count($produto)){
                ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td><img class="img_cadastro" src="../imgs/<?=$produto[$cont]->getFoto()?>" alt=""></td>
                        <td><p><?=$produto[$cont]->getNome()?></p></td>
                        <td>
                            <?php 
                                $style = mostrarDestaque($produto[$cont]->getDestaque());
                            ?>
                                <div class="bola_destaque center" <?=$style?>>
                                </div>
                        </td>
                        <td><p><?=$produto[$cont]->getPreco()?></p></td>
                        <td><p><?=$produto[$cont]->getDesconto()?>%</p></td>
                        <!-- Icones -->
                        <td>
                            <!-- ICONE LAPIS -->
                            <a  href="router.php?controller=produtos&modo=buscar&
                                id=<?=$produto[$cont]->getCodigo()?>"
                                class="exibir_icon float botao visualizar">
                                <img src="view/imgs/icon_edit.png" alt="imagem">
                            </a>
                            <!-- ICONE EXCLUIR -->
                            <a  onclick="return confirm('deseja excluir esse produto?');"
                                href="router.php?controller=produtos&modo=excluir&
                                id=<?=$produto[$cont]->getCodigo()?>"
                                class="exibir_icon float botao visualizar">
                                <img src="view/imgs/icon_excluir.png" alt="imagem">
                            </a>
                            <!-- ICONE STATUS -->
                            <a  href="router.php?controller=produtos&modo=status&
                                id=<?=$produto[$cont]->getCodigo()?>&
                                status=<?=$produto[$cont]->getStatus()?>"
                            
                                class="exibir_icon float botao visualizar">
                                <?php if($produto[$cont]->getStatus()) {?> 
                                    <img src="view/imgs/icon_on.png" alt="imagem">
                                <?php } else { ?> 
                                    <img src="view/imgs/icon_off.png" alt="imagem">
                                <?php } ?> 
                            </a>
                            <!-- ICONE LUPA -->
                            <a href="#" class="exibir_icon float botao visualizar" onclick="verDados(<?=$rsCuriosidades['codigo']?>);" >
                                <img src="view/imgs/icon_ver.png" alt="imagem">
                            </a>
                        </td>
                    </tr>
                <?php 
                    $cont++;
                    } ?>
                </table>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("view/footer.php")?>

       <?php if(isset($_SESSION['erroUp'])){unset($_SESSION['erroUp']);} ?>
    </body>
</html>
