<?php
    require_once("header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Home | Delicia Gelada
        </title>
        <link href="../css/slide.css" type="text/css" rel="stylesheet">
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="../js/slide.js"></script>
        
    </head>
    <body>
        <!-- SLIDE  -->
        <div id="sec_slide" class="center">
            <figure>
               <span class="trs next"></span>
               <span class="trs prev"></span>

               <div id="slider">
                  <a href="#" class="trs"><img src="../imgs/slide1.png" alt="Melhore o seu comércio com os nossos produtos!" /></a>
                  <a href="#" class="trs"><img src="../imgs/slide2.png" alt="sucos que beneficiam a saúde" /></a>
                   <a href="#" class="trs"><img src="../imgs/slide3.png" alt="variedade de sabores: com frutas e vegetais" /></a>
                  <a href="#" class="trs"><img src="../imgs/slide4.png" alt="Com Propriedades naturais que ajudam a emagrecer " /></a>
                  <a href="#" class="trs"><img src="../imgs/slide5.png" alt="Aproveite o verão!" /></a>
               </div>

               <figcaption></figcaption>
            </figure>
        </div>
        <!--        -->
        <div id="home_main" class="center">
             <div id="caixa_redes_sociais">
               <div id="rede01" class="back"></div>
               <div id="rede02" class="back"></div>
               <div id="rede03" class="back"></div>
             </div>
             <nav id="home_nav" class="float">
                 <div class="home_nav_itens fonte">
                     item 01
                 </div>
                 <div class="home_nav_itens fonte">
                     item 02
                 </div>
             </nav>   
            <div id="home_conteudo" class="float">
               <div class="home_caixa_produtos">
                    <div class="home_produtos float back">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                    <div class="home_produtos float">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                    <div class="home_produtos float">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                </div>
                <div class="home_caixa_produtos">
                    <div class="home_produtos float back">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                    <div class="home_produtos float">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                    <div class="home_produtos float">
                        <div class="home_produtos_img center">
                        </div>
                        <div class="home_produtos_detalhes center">
                            <p class="fonte"> Nome: </p>
                            <p class="fonte"> Descrição: </p>
                            <p class="fonte"> Preço: </p>
                            <div class="home_btn_detalhes fonte"><a > Detalhes </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php
             require_once("footer.php");
         ?>
    </body>
</html>