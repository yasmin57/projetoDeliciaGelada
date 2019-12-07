<?php
    $action = 'router.php?controller=subcategorias&modo=novo';
    
    if(isset($_GET['modo'])){
        if(strtoupper($_GET['modo']) == 'BUSCAR'){
            $descricao = $dadosSub->getDescricao();
            $codeCategoria = $dadosSub->getCodigoCategoria();
            $nomeCategoria = $dadosSub->getNome();
            $codigo = $dadosSub->getCodigo();

            $action = 'router.php?controller=subcategorias&modo=editar&id='.$codigo;
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
    </head>
    <body>
        <!-- CABEÇALHO -->
        <?php require_once("view/header.php"); ?>
        
        <div id="categorias">
        <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Subcategorias </h1>

                <!-- Formulário Para Criar Páginas -->
                <form method="post"  action="<?=$action?>"  class="center back_green_dark_cms form_curiosidades color_white" name="frmcategorias" enctype="multipart/form-data">
                    <!-- Restante do formulário -->
                    <div id="card_curiosidades">
                        <!-- Categoria -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Categoria:</p>  </div>
                            <select name="sltcategorias" id="" class="fonte card_curiosidades_input">
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
                        <!-- Nome -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Nome:</p>  </div>
                            <input value="<?=@$descricao?>" name="txtnome" placeholder="Digite o nome da subcategoria" class="fonte card_curiosidades_input" type="text" maxlength="50" required size="45">
                        </div>
                        <!-- BOTÃO -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" class="botao back_green_cms color_white fonte btn_curiosidades center" type="submit" value="SALVAR" name="btncategorias">
                        </div>
                    </div>    
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="4"><h1> Subcategorias: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Categoria: </p>
                        </td>
                        <td colspan="2">
                            <p> Nome: </p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //Importe
                        require_once('controller/subController.php');

                        //Instancia
                        $subController = new SubcategoriaController();

                        //Metodo
                        $dados = $subController->listaSubcategoria();

                        //contador
                        $cont = 0;

                        //laço
                        while($cont < count($dados)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td>
                            <p> <?=$dados[$cont]->getNome()?>  </p>
                        </td>
                        <td colspan="2" class="exibir_coluna">
                            <p> <?=$dados[$cont]->getDescricao()?> </p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="router.php?controller=subcategorias&modo=buscar&
                                    id=<?=$dados[$cont]->getCodigo()?>" 
                               class="exibir_icon float botao visualizar">
                                <img src="view/imgs/icon_edit.png" alt="imagem">
                            </a>
                            <!-- ICONE EXCLUIR -->
                            <a href="router.php?controller=categorias&modo=excluir&
                                "
                                 class="exibir_icon float botao visualizar">
                                <img src="view/imgs/icon_excluir.png" alt="imagem">
                            </a>
                            <!-- ICONE STATUS -->
                            <a href="router.php?controller=categorias&modo=status&
                                " 
                            
                                class="exibir_icon float botao visualizar">
                                
                                    <img src="view/imgs/icon_on.png" alt="imagem">
                                
                                    <!-- <img src="view/imgs/icon_off.png" alt="imagem"> -->
                                
                            </a>
                        </td>
                    <tr>
                    <?php 
                        $cont++;
                        }?>
                    
                </table>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("view/footer.php"); ?>
    </body>
</html>