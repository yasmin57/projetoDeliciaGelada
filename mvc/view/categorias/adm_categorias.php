<?php
    $action = '../../router.php?controller=categorias&modo=novo';
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO -->
        <?php require_once("../header.php"); ?>
        
        <div id="categorias">
        <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Categorias </h1>

                <!-- Botao p/ gerenciar os produtos -->
                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="../produtos/adm_produtos.php"> Gerencie os Produtos </a>
                </div>
                <!-- Botao p/ gerenciar as subcategorias -->
                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="../subcategorias/adm_subcategorias.php"> Gerencie as Sub-Categorias </a>
                </div>

                <!-- Formulário Para Criar Páginas -->
                <form style="clear:both" method="post"  action="<?=$action?>"  class="center back_green_dark_cms form_curiosidades color_white" name="frmcategorias" enctype="multipart/form-data">
                    <!-- Restante do formulário -->
                    <div id="card_curiosidades">
                        <!-- TITULO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Nome:</p>  </div>
                            <input value="<?=@$titulo?>" name="txtnome" placeholder="Digite o nome da categoria" class="fonte card_curiosidades_input_topo" type="text" maxlength="50" required size="45">
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
                        <td colspan="4"><h1> Categorias: </h1></td>
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
                        //Importe do arquivo controller
                        require_once('../../controller/categoriaController.php');

                        //Instancia da classe controller
                        $categoriaController = new CategoriaController();

                        //Método que faz o select no bd
                        $dados = $categoriaController->listaCategoria();

                        $cont = 0;

                        while($cont < count($dados)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td colspan="3" style="width: 700px; padding: 30px;">
                            <p> <?=$dados[$cont]->getNome();?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>
                            <!-- ICONE EXCLUIR -->
                            <a href="../../router.php?controller=categorias&modo=excluir&
                                id=<?=$dados[$cont]->getCodigo()?>"
                                 class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>
                            <!-- ICONE STATUS -->
                            <a href="" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_on.png" alt="imagem">
                            </a>
                        </td>
                    <tr>
                    <?php 
                            $cont++;        
                        }
                    ?>
                </table>
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("../footer.php"); ?>
    </body>
</html>