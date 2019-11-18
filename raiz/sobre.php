<?php
    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Sobre | Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/sobre.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
        
        <!-- CONTEUDO -->
        <div id="sobre">
            <!--  Sobre nós   -->
            <div id="sobre_nos" class="back_pink">
               <div class="conteudo center back_pink">
                    <table id="table_sobre_nos" class="center">
                        <tr>
                            <td id="titulo_sobre_nos">
                                Sobre - nós
                            </td>
                            <td class="fonte textos">
                                <?php 
                                    $sql = "select * from tblsobredestaque where status = 1";
                                    $select = mysqli_query($conexao, $sql);
                                    $rsSobre = mysqli_fetch_array($select);
                                    $texto = $rsSobre['texto'];
                                ?>
                                <p><?=$texto?></p>
                            </td>
                        </tr>
                    </table>
               </div>
            </div>
            <!-- Titulo : Entenda a diferença  -->
            <div id="entenda_diferenca" class="back_orange">
                 <div class="conteudo center back_orange">
                     <section id="titulo_entenda_diferenca" class="center">
                         <h2> Entenda a diferença de Delícia gelada para outros produtos </h2>
                     </section>
                 </div>
            </div>
            <?php
                $sql = "select * from tblsobre where status = 1";

                $select = mysqli_query($conexao, $sql);

                while($rsSobre = mysqli_fetch_array($select)){
                    
                    if($rsSobre['modo'] == 1){
            ?>
                    <div id="oque_fazemos" class="back_goiaba">
                        <div class="conteudo center back_goiaba">
                            <table id="table_oque_fazemos" class="center">
                                <tr>
                                    <td id="img_oque_fazemos" style="background-image: url('../imgs/<?=$rsSobre['foto']?>')" class="back">
                                    </td>
                                    <td class="fonte textos">
                                        <h2> <?=$rsSobre['titulo']?></h2>
                                        <p>
                                            <?=$rsSobre['texto']?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
            <?php   } 
                    else 
                    { 
            ?>
                        <div id="como_fazemos" class="back_green">
                            <div class="conteudo center back_green">
                                <table id="table_como_fazemos" class="center">
                                    <tr id="linha_img_como_fazemos">
                                        <td id="img_como_fazemos" style="background-image: url('../imgs/<?=$rsSobre['foto']?>')"  class="back">
                                        </td>
                                    </tr>
                                    <tr id="linha_txt_como_fazemos">
                                        <td class="textos fonte center">
                                            <h2><?=$rsSobre['titulo']?></h2>
                                            <p> <?=$rsSobre['texto']?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
            <?php   } ?>
            <?php
                }
            ?>
            <!-- missão, visão e valores-->
            <div id="valores" class="back_orange">
                
                <div class="conteudo center back_orange">
                    <h2 class="fonte"> Quais são os nossos valores?</h2>

                    <?php 
                        $sql = "select * from tblvalores where status = 1 order by id";
                        $select = mysqli_query($conexao, $sql);

                        while($rsSobre = mysqli_fetch_array($select)){
                    ?>
                        <div class="sobre_valores float">
                            <h1> <?=$rsSobre['titulo']?> </h1>
                            <div class="icones_valores center">
                                <img alt="imagem" src="../imgs/<?=$rsSobre['icone']?>">
                            </div>
                            <div class="fonte center textos_valores">
                                <p>
                                   <?=$rsSobre['texto']?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- missão -->
                    
                    <!-- visão -->
                    <!-- <div class="sobre_valores float">
                        <h1> Visão </h1>
                        <div class="center icones_valores">
                            <img alt="imagem" src="../imgs/icon_vision.png">
                        </div>
                        <div class="fonte center textos_valores">
                            <p>
                                TORNAR-SE A MARCA DE SUCOS NATURAIS MAIS CONSUMIDA NO MERCADO NACIONAL, OFERECENDO PRODUTOS DE ALTA QUALIDADE E DE SABOR INCOMPARÁVEL.
                            </p>
                        </div>
                    </div> -->
                    <!-- valores -->
                    <!-- <div class="sobre_valores float">
                        <h1> Valores </h1>
                        <div class="center icones_valores">
                            <img alt="imagem" src="../imgs/icon_value1.png">
                        </div>
                        <div class="fonte center textos_valores">
                            <p>
                                Proporcionar momentos alegres e saudáveis para todos com INTEGRIDADE, TRANSPARÊNCIA, COMPROMETIMENTO, INOVAÇÃO E QUALIDADE.
                            </p>
                        </div>
                    </div> -->
                </div>
                
            </div>
        </div>
        
            
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>