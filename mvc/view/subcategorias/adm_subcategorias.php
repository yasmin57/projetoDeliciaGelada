<?php
    //Action do form quando a página é carregada
    $action = 'router.php?controller=subcategorias&modo=novo';
    
    if(isset($_GET['modo'])){
        if(strtoupper($_GET['modo']) == 'BUSCAR'){

            $descricao = $dadosSub->getDescricao();
            $codigo = $dadosSub->getCodigo();

            //Muda o modo p/ editar no action do form
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

                <!-- Formulário -->
                <form method="post"  action="<?=$action?>"  class="center back_green_dark_cms form_curiosidades color_white" name="frmcategorias" enctype="multipart/form-data">
                    <div id="card_curiosidades">
                        <!-- Nome -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Nome:</p>  </div>
                            <input value="<?=@$descricao?>" name="txtnome" placeholder="Digite o nome da subcategoria" class="fonte card_curiosidades_input" type="text" maxlength="50" required size="45">
                        </div>
                        <!-- BOTÃO -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" class="botao back_orange_cms color_white fonte btn_curiosidades center" type="submit" value="SALVAR" name="btncategorias">
                        </div>
                    </div>    
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="4"><h1> Subcategorias: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td colspan="3">
                            <p> Nome: </p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //Importe do arquivo e instancia da classe controller
                        require_once('controller/subController.php');
                        $subController = new SubcategoriaController();

                        //Metodo p/ listar dados
                        $dados = $subController->listaSubcategoria();

                        $cont = 0;
                        while($cont < count($dados)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td colspan="3" class="exibir_coluna">
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
                            <a onclick="return confirm('deseja excluir subcategoria?');"
                                href="router.php?controller=subcategorias&modo=excluir&
                                id=<?=$dados[$cont]->getCodigo()?>"
                                 class="exibir_icon float botao visualizar">
                                <img src="view/imgs/icon_excluir.png" alt="imagem">
                            </a>
                            <!-- ICONE STATUS -->
                            <a href="router.php?controller=subcategorias&modo=status&
                                status=<?=$dados[$cont]->getStatus()?>&id=<?=$dados[$cont]->getCodigo()?>" 
                            
                                class="exibir_icon float botao visualizar">
                                    <?php if($dados[$cont]->getStatus()){?>
                                        <img src="view/imgs/icon_on.png" alt="imagem" title="ativar ou desativar">
                                    <?php } 
                                          else { ?>
                                        <img src="view/imgs/icon_off.png" alt="imagem" title="ativar ou desativar">
                                    <?php } ?>
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