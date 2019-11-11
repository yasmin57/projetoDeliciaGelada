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
        <?php require_once("header.php"); ?>
        
        <!-- CONTEUDO -->
        <div id="curiosidades">
            <!-- topo da pag -->
            <div id="curiosidades_img_top" class="back" >
            </div>
            
            <div id="curiosidades_titulo_main" class="fonte back_goiaba"> Curiosidades </div>
            
            <?php
                $sql="select tblcuriosidades.*, tblcolors.classe_css from tblcuriosidades inner join tblcolors on tblcolors.codigo = tblcuriosidades.codecor";

                $select = mysqli_query($conexao, $sql);

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
                    <?php
                    if($rsCuriosidades){            
                    ?>
                    <div class="back curiosidades_imgs_fundo img_abacate" >
                    <div class="mascara_preta"></div>
            <?php
                    }
                }
            ?>
            
            <div class="back curiosidades_imgs_fundo img_abacate" >
                <div class="mascara_preta"></div>

            <!-- faixa 01 - sistema digestivo -->
            <!-- <div class="back_goiaba curiosidades_faixa">
                <div class="conteudo center back_goiaba">
                    <table class="curiosidades_table">
                        <tr>
                            <td class="curiosidades_img">
                                <img alt="imagem" title="imagem" src="../imgs/curiosidadeimg2.jpg">
                            </td>
                            <td class="curiosidades_texto fonte">
                                <h1> Nossos sucos atuam em prol dos sistemas digestivo e imunológico: </h1>
                                <p> Fonte de fibras alimentares e vitamina C e A, o suco delícia gelada é responsável por fazer com que o nosso sistema digestivo funcione de maneira correta. Além disso, as substâncias antioxidantes fortalecem o nosso sistema imunológico, prevenindo o desenvolvimento de gripes e resfriados </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <!--  1º imagem que separa  -->
            <!-- <div class="back curiosidades_imgs_fundo img_abacate" >
                <div class="mascara_preta"></div>
            </div> -->
            
            <!-- faixa 02 - enxaqueca  -->
            <!-- <div class="back_green curiosidades_faixa">
                <div class="conteudo center back_green">
                    <table class="curiosidades_table">
                        <tr>
                            <td class="curiosidades_img">
                                <img alt="imagem" title="imagem" src="../imgs/curiosidadeimg4.jpg">
                            </td>
                            <td class="curiosidades_texto fonte">
                                <h1> Nossos sucos aliviam os sintomas da enxaqueca: </h1>
                                <p> Para quem sofre com a incômoda enxaqueca, o suco delícia gelada pode auxiliar na diminuição dos sintomas, já que os ingredientes são naturais e são fonte de nutrientes como ômega 3 e magnésio possuem propriedades anti-inflamatórias e são calmantes. Para esses casos, dê preferência para a linhaça e o espinafre que são ricos nessa substância.</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <!-- 2º imagem que separa  -->
            <!-- <div class="back curiosidades_imgs_fundo img_laranja" >
                <div class="mascara_preta"></div>
            </div> -->
            
            <!-- faixa 03 - bem-estar -->
            <!-- <div class="back_goiaba curiosidades_faixa">
                <div class="conteudo center back_goiaba">
                    <table class="curiosidades_table">
                        <tr>
                            <td class="curiosidades_img">
                                <img alt="imagem" title="imagem" src="../imgs/curiosidadeimg6.jpg">
                            </td>
                            <td class="curiosidades_texto fonte">
                                <h1> Nossos produtos proporcionam bem-estar: </h1>
                                <p> Com o organismo limpo, livre de toxinas, a absorção de nutrientes é muito melhor, beneficiando o organismo: "Por ser essencialmente natural e conter diversos nutrientes em sua constituição, o suco delícia gelada tem efeitos claros no aumento da sensação de bem-estar, atuando, inclusive, na melhoria da qualidade do sono", analisa a Dra. Daniella Chein.</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <!-- 3º imagem que separa  -->
            <!-- <div class="back curiosidades_imgs_fundo img_limao" >
                <div class="mascara_preta"></div>
            </div> -->
            
            <!-- faixa 04 - diversos sabores  -->
            <!-- <div class="back_green curiosidades_faixa">
                <div class="conteudo center back_green">
                    <table class="curiosidades_table">
                        <tr>
                            <td class="curiosidades_img">
                                <img alt="imagem" title="imagem" src="../imgs/curiosidadeimg8.jpg">
                            </td>
                            <td class="curiosidades_texto fonte">
                                <h1> Possuímos diversos sabores:</h1>
                                <p> Uma das principais vantagens do suco delícia gelada é que ele possui uma diversidade muito grande de combinações. O suco amarelo com abacaxi ou maracujá, o suco vermelho com baterrada e laranja, limão ou cenoura, e para o suco rosa, melancia, e  gengibre, hortelã e outras hortaliças de sua preferência.</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div> -->
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>