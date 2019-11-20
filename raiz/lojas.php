<?php
    //IMPORTE DO ARQUIVO DE CONEXÃO COM O BD
    require_once('../bd/conexao.php');
    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Nossas Lojas | Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/lojas.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
        
        <!-- CONTEUDO -->
        <div id="lojas_main">
            <!--     topo da pag       -->
            <?php 
                //SCRIPT
                $sql = "select * from tbltopolojas where status = 1";

                //MANDA P/ O BD
                $select = mysqli_query($conexao, $sql);

                //TRANSFORMA EM ARRAY 
                $rsTopoPage  = mysqli_fetch_array($select);

                //GUARDA EM UMA VARIAVEL O NOME DA FOTO
                $foto = $rsTopoPage['foto'];
            ?>
            <div class="lojas_faixa back_green_limao_light">
                <div class="conteudo center back back_green_limao_light" id="back_map" 
                    style="background-image: url('../imgs/<?=$foto?>')">
            
                </div>
            </div>

            <div id="lojas_faixa_titulo">
                 <div class="conteudo center">
                     <section id="lojas_titulo" class="center">
                         <h1> Onde estamos? </h1>
                     </section>
                 </div>
            </div>
            <!--   Loja 01        -->
            <?php
                //SCRIPT P/ FAZER O SELECT
                $sql = "select * from tbllojas where status = 1";

                //MANDA P/ O BD
                $select = mysqli_query($conexao, $sql);

                //CONTADOR
                $cont = 1;

                //LAÇO QUE REPETE ENQUANTO ARRAY TIVER DADOS
                while($rsLojas = mysqli_fetch_array($select)){
                    //VERIFICA SE O CONTADOR É PAR OU IMPAR E MUDA A COR
                    if($cont % 2 == 0){
                        $classe_cor = "back_green_limao";
                    }
                    else{
                        $classe_cor = "back_goiaba";
                    }
            ?>
            <div class="<?=$classe_cor?> lojas_faixa">
                <div class="conteudo center <?=$classe_cor?>">
                    <table class="lojas_table">
                        <tr>
                            <td class="lojas_img back">
                                <img title="imagem" alt="imagem" src="../imgs/<?=$rsLojas['foto']?>">
                            </td>
                            <td class="textos fonte">
                                <h2> <?=$rsLojas['cidadeestado']?> </h2>
                                <p> <?=$rsLojas['local']?> </p>
                                <p> <?=$rsLojas['endereco']?> </p>
                                <p> <?=$rsLojas['numero']?> </p>
                                <p> Telefone: <?=$rsLojas['telefone']?> </p>
                                <p> Whatsaap: <?=$rsLojas['celular']?></p>
                                <p> <?=$rsLojas['horario']?> </p>
                            </td>
                            <td class="lojas_botoes">
                                <div class="lojas_icon back"></div>
                                <div class="lojas_botao fonte back_green"><a> Ver no mapa </a></div>
                                <div class="lojas_botao fonte back_green"><a> Traçar rota </a></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php 
                    $cont = $cont + 1;
                } ?>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>