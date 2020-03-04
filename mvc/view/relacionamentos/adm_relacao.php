<?php
    require_once('controller/produtoController.php');
    require_once('controller/categoriaController.php');
    require_once('controller/subController.php');

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
            $code = $dados->getCodigo();

            $textodest = $dados->getTextoDest();
            $fotodest = $dados->getFotoDest();
            $backdest = $dados->getBackDest();

            //Variaveis de sessão com os nomes das fotos
            $_SESSION['fotodest'] = $fotodest; 
            $_SESSION['backdest'] = $backdest;
            $_SESSION['foto'] = $foto;

            //Verifica se existem fotos salvas no bd
            if($fotodest <> '')
                $foto2 = 1;
            
            if($backdest <> '')
                $foto3 = 1;
            
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
        <script src="view/js/modulo.js"></script>
    </head>
    <body>
    
        <!-- CABEÇALHO -->
        <?php require_once("view/header.php"); ?>
        
        <div id="categorias">
            <section class="conteudo center fonte txt_center"> 
                <h1 class="txt_center">Administração dos Produtos </h1>

                <table id="tblprodutos" class="center back_green_dark_cms">
                    <tr>
                        <!-- FORM PRINCIPAL -->
                        <td>
                            <form method="post"  action="<?=$action?>"  class="fonte center back_green_dark_cms form_produtos color_white" name="frmrelacoes">
                                <div id="card_curiosidades">
                                    <!-- NOME DOS PRODUTOS -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Produto:</p>  </div>
                                        <select name="sltprodutos" class="select fonte">
                                            <?php
                                                $produtoController = new ProdutoController();

                                                $produtos = $produtoController->listaProduto();

                                                $cont = 0;

                                                while($cont < count($produtos)){
                                            ?>
                                                    <option value="<?=$produtos[$cont]->getCodigo()?>">
                                                        <?=$produtos[$cont]->getNome()?>
                                                    </option>
                                            <?php
                                                    $cont++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- DESCRICAO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name"> <p>Categoria:</p>  </div>
                                        <select name="sltcategorias" class="select fonte">
                                            <?php
                                                $categoriaController = new CategoriaController();

                                                $categorias = $categoriaController->listaCategoria(0);

                                                $cont = 0;

                                                var_dump($categorias[$cont]);

                                                while($cont < count($categorias)){
                                            ?>
                                                    <option value="<?=$categorias[$cont]->getCodigo()?>">
                                                        <?=$categorias[$cont]->getNome()?>
                                                    </option>
                                            <?php
                                                    $cont++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- PRECO -->
                                    <div class="card_curiosidades">
                                        <div class="card_curiosidades_name "> <p>Subcategoria:</p>  </div>
                                        <select name="sltcategorias" class="select fonte">
                                            <?php
                                                $subcategoriaController = new SubcategoriaController();

                                                $subcategorias = $subcategoriaController->listaSubcategoria();

                                                $cont = 0;

                                                while($cont < count($subcategorias)){
                                            ?>
                                                    <option value="<?=$subcategorias[$cont]->getCodigo()?>">
                                                        <?=$subcategorias[$cont]->getDescricao()?>
                                                    </option>
                                            <?php
                                                    $cont++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="card_curiosidades">
                                    </div>
                                    <div class="card_curiosidades">
                                        <input style="margin-top: 15px" class="botao back_orange_cms color_white fonte btn_curiosidades center" type="submit" value="SALVAR" name="btnrelacoes">
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
                                <a <?php
                                        if($produto[$cont]->getDestaque() == 1){
                                    ?>
                                        onclick="alert('Você não pode desativar esse recurso dessa maneira. Toque no produto que você deseja ativar o destaque.')"
                                    <?php        
                                        } else {
                                    ?>
                                        href="router.php?controller=produtos&modo=destaque&
                                        id=<?=$produto[$cont]->getCodigo()?>"
                                    <?php        
                                        }
                                    ?>>
                                    <div class="bola_destaque center" <?=$style?>></div>
                                </a>
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
                            <a href="#" class="exibir_icon float botao visualizar" onclick="verDados(<?=$produto[$cont]->getCodigo()?>);" >
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
