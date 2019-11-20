<?php
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Curiosidades | Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/curiosidades.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php");?>
        
        <!-- CONTEUDO -->
        <div id="curiosidades">
            <!-- topo da pag -->
            <?php
                //SCRIPT P/ FAZER O SELECT
                $sql = "select tbltopocuriosidades.*, tblcolors.classe_css from tbltopocuriosidades
                         inner join tblcolors on tblcolors.codigo = tbltopocuriosidades.codecor 
                        where tbltopocuriosidades.status <> 0";

                //MANDA O SCRIPT P/ O BD 
                $select = mysqli_query($conexao, $sql);

                //TRANSFORMA EM ARRAY
                while($rsTopoCuriosidades = mysqli_fetch_array($select)){
            ?>
                 <div id="curiosidades_img_top" style="background-image: url(../imgs/<?=$rsTopoCuriosidades['foto']?>)" class="back"></div>
            
                <div id="curiosidades_titulo_main" class="fonte <?=$rsTopoCuriosidades['classe_css']?>"> <?=$rsTopoCuriosidades['titulo']?> </div>
            
            <?php
                }
                //SCRIPT P/ FAZER O SELECT
                $sql="select tblcuriosidades.*, tblcolors.classe_css, tblseparasessao.background from tblcuriosidades inner join tblcolors on tblcolors.codigo = tblcuriosidades.codecor inner join tblseparasessao on tblseparasessao.codigo = tblcuriosidades.codeimg where tblcuriosidades.status <> 0";

                //MANDA O SCRIPT P/ O BD 
                $select = mysqli_query($conexao, $sql);

                //ENQUANTO TIVER CONTEÚDO MOSTRA O CONTEÚDO
                while($rsCuriosidades = mysqli_fetch_array($select)){
            ?>
                <div class="<?=$rsCuriosidades['classe_css']?> curiosidades_faixa">
                    <div class="conteudo center <?=$rsCuriosidades['classe_css']?>">
                        <table class="curiosidades_table">
                            <tr>
                                <td class="curiosidades_img">
                                    <img alt="imagem" title="imagem" src="../imgs/<?=$rsCuriosidades['foto']?>">
                                </td>
                                <td class="curiosidades_texto fonte">
                                    <h1> <?=$rsCuriosidades['titulo']?> </h1>
                                    <p> <?=$rsCuriosidades['texto']?> </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="back curiosidades_imgs_fundo" style="background-image: url(../imgs/<?=$rsCuriosidades['background']?>)"></div>
                <div class="mascara_preta"></div>
            <?php
                }
            ?>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>