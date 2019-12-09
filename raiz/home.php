<?php
    //INICIA A VARIÁVEL DE SESSÃO
    if(!isset($_SESSION))
    {
        session_start();
    }

    //IMPORTE DO ARQUIVO DE CONEXÃO COM O BD
    require_once('../bd/conexao.php');
    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Home | Delicia Gelada
        </title>
        <link href="../css/home.css" type="text/css" rel="stylesheet">
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
        <script src="../js/slide.js"></script>
        
    </head>
    <body>
        <?php
            require_once("header.php");
        ?>
        <!-- SLIDE  -->
        <div id="slider_container" class="center back_pink">
            <figure>
                <!-- setas -->
               <span class="transicao next back_pink back"></span>
               <span class="transicao prev back_pink back"></span>

               <div id="slider">
                  <a href="#" class="transicao"><img src="../imgs/slide1.png" alt="Melhore o seu comércio com os nossos produtos!" /></a>
                  <a href="#" class="transicao"><img src="../imgs/slide2.png" alt="sucos que beneficiam a saúde" /></a>
                   <a href="#" class="transicao"><img src="../imgs/slide3.png" alt="variedade de sabores: com frutas e vegetais" /></a>
                  <a href="#" class="transicao"><img src="../imgs/slide4.png" alt="Com Propriedades naturais que ajudam a emagrecer " /></a>
                  <a href="#" class="transicao"><img src="../imgs/slide5.png" alt="Aproveite o verão!" /></a>
               </div>
                
                <!-- legenda -->
               <figcaption class="back_pink"></figcaption>
            </figure>
        </div>
        
        <!--  CONTEÚDO  -->
        <div id="home">
            <div class="conteudo center">
                <!-- redes sociais -->
                 <div id="redes_sociais">
                   <div class="redes_sociais_icones">
                        <img alt="imagem" src="../imgs/icon_facebook.png">
                   </div>
                   <div class="redes_sociais_icones">
                       <img alt="imagem" src="../imgs/icon_instagram.png">
                   </div>
                   <div class="redes_sociais_icones">
                        <img alt="imagem" src="../imgs/icon_twitter.png">
                   </div>
                 </div>
                <!-- menu lateral -->
                 <nav id="home_nav" class="float back_pink">
                    <?php
                        //SCRIPT 
                        $sql = "select * from tblcategorias where status =1 order by codigo";
                        
                        //MANDA P/ O BD
                        $select = mysqli_query($conexao, $sql);
                        
                        while($rsCategorias = mysqli_fetch_array($select)){
                    ?>
                        <a href="">
                            <div class="home_nav_itens fonte back_goiaba">
                                <?=$rsCategorias['nome']?>
                                <!-- subcategorias -->
                                <ul class="home_nav_list">
                                     <?php
                                        $sql = "select * from tblsubcategorias where status =1
                                                and idcategoria=".$rsCategorias['codigo']." order by codigo";

                                        $select2 = mysqli_query($conexao, $sql);
                                     
                                        while($rsSub = mysqli_fetch_array($select2)){?> 
                                        <li class="home_nav_list_elements fonte back_goiaba">
                                            <a href=""><?=$rsSub['descricao']?></a>
                                        </li>
                                    <?php }?>  
                                </ul>
                            </div>
                        </a>
                    <?php
                        }
                    ?>
                 </nav>  
                <!-- produtos -->
                <div id="home_conteudo_main" class="float">
                   <?php 
                        if(isset($_SESSION['error'])){
                            echo('<p class="fonte" id="msgErro">'.$_SESSION['error'].'</p>');
                        }
                    ?>
                   <div class="home_produtos">
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="home_produtos">
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                        <div class="produtos float back">
                            <div class="produtos_img center">
                            </div>
                            <div class="produtos_detalhes center">
                                <p class="fonte"> Nome: </p>
                                <p class="fonte"> Descrição: </p>
                                <p class="fonte"> Preço: </p>
                                <div class="btn_detalhes fonte botao back_goiaba"><a > Detalhes </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php
             require_once("footer.php");

             //DESTRÓI A VARIÁVEL DE SESSÃO
            if(isset($_SESSION))
            {
                session_destroy();
            }
         ?>
    </body>                         
</html>