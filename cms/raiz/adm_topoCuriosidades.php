<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //VARIAVEL QUE FICA NO VALUE DO BOTÃO
    $botao = "CRIAR";

    //VARIAVEL P/ O SELECT DAS CORES e SEPARADOR DE SESSÃO
    $codecor = 0;

    //INICIA O RECURSO DA VARIAVEL DE SESSÃO
    if(!isset($_SESSION)){
        session_start();
    }

    //VERIFICA SE A VARIVEL MODO EXISTE
    if(isset($_GET['modo'])){
         //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE EDITAR
        if($_GET['modo'] == 'editar')
        {
            //RESGATA O CÓDIGO
            $codigo = $_GET['codigo'];

            //SCRIPT P/ O SELECT
            $sql = "select * from tbltopocuriosidades where codigo=".$codigo;

            //MANDA P/ O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA EM ARRAY
            $rsCuriosidades = mysqli_fetch_array($select);

            //RESGATA OS DADOS E GUARDA EM VARIAVEIS
            $titulo = $rsCuriosidades['titulo'];
            $foto = $rsCuriosidades['foto'];
            $codecor = $rsCuriosidades['codecor'];

            //MODIFICA O VALUE DO BOTÃO
            $botao = "EDITAR";

            //CRIA AS VARIÁVEIS DE SESSÃO DO CÓDIGO E DO NOME DA FOTO
            $_SESSION['codigoTopo'] = $codigo;
            $_SESSION['nomeImg'] = $foto;

        }
    }

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>CMS | Delicia Gelada</title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <link type="text/css" href="../css/conteudo.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
                
        <!-- CONTEÚDO -->
        <div id="curiosidades">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Curiosidades </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center"><a class="color_white" href="adm_curiosidades.php"> Gerencie as Sessões da Página </a></div>

                <!-- Formulário p/ o topo da página -->
                <h1 class="txt_center"> Topo da página</h1>
                <form method="post" action="../bd/topoCuriosidade.php" class="center back_green_dark_cms form_curiosidades color_white" name="frmtopocuriosidades" enctype="multipart/form-data">
                    <!-- Mostrar Imagem -->
                    <div id="img_curiosidades_topo" class="back back_green_light_cms">
                        <?php if(isset($_GET['modo'])) {?>
                            <img src="../../imgs/<?=$foto?>" alt="imagem"/>
                        <?php } else{?>
                            <img src="../imgs/icon_image.png" alt="imagem">
                        <?php }?>
                    </div>

                    <div id="card_curiosidades_topo fonte">
                        <!-- TITULO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Título:</p>  </div>
                            <input value="<?=@$titulo?>" name="txttitulo" placeholder="Digite o titulo que aparecerá no topo da página" class="fonte card_curiosidades_input_topo" type="text" maxlength="150" required size="45">
                        </div>
                        <!-- CORES  -->
                        <div class="card_curiosidades_big">
                            <div class="card_curiosidades_name"> <p>Cor da faixa:</p>  </div>
                            <div class="colors">
                                <?php
                                    //VERIFICA SE EXISTE A VARIAVEL MODO NA URL
                                    if(isset($_GET['modo'])){
                                        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE EDITAR
                                        if($_GET['modo'] == 'editar')
                                        {
                                            $sql = "select * from tblcolors where codigo =".$codecor;
                                            $select = mysqli_query($conexao, $sql);
                                            $rsColors = mysqli_fetch_array($select); 
                                ?>
                                            <div class="color_container">
                                                <div class="color <?=$rsColors['classe_css']?>">
                                                    <input checked name="rdocolor" value="<?=$rsColors['codigo']?>" type="radio" class="radio">
                                                </div>
                                                <div class="title_color"> <p> <?=$rsColors['nome']?> </p></div>
                                            </div>  
                                <?php
                                        }
                                    }
                                ?>

                                <?php
                                    //SCRIPT P/ O BD
                                    $sql = "select * from tblcolors where codigo <>".$codecor;
                                    //MANDA P/ O BD
                                    $select = mysqli_query($conexao, $sql);
                                    //LAÇO P/ EXIBIR AS CORES 
                                    while($rsColors = mysqli_fetch_array($select))
                                    {
                                ?>
                                        <div class="color_container">
                                            <div class="color <?=$rsColors['classe_css']?>">
                                                <input name="rdocolor" value="<?=$rsColors['codigo']?>" type="radio" class="radio">
                                            </div>
                                            <div class="title_color"> <p> <?=$rsColors['nome']?> </p></div>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- FOTO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                            <input class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                        </div>
                        <!-- BOTÃO -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" class="botao back_green_cms color_white fonte btn_curiosidades center" type="submit" value="<?=$botao?>" name="btncuriosidades">
                        </div>
                    </div>
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="5"><h1> Modifique:</h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td colspan="2">
                            <p> Foto: </p>
                        </td>
                        <td colspan="2">
                            <p> Título:</p>
                        </td>
                        <td>
                            <p> Cor:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select tbltopocuriosidades.*, tblcolors.classe_css from tbltopocuriosidades inner join tblcolors on tblcolors.codigo = tbltopocuriosidades.codecor";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);

                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsCuriosidades = mysqli_fetch_array($select)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td colspan="2">
                             <img src="../../imgs/<?=$rsCuriosidades['foto']?>" alt="imagem" class="img_cadastro_topo">
                        </td>
                        <td colspan="2">
                            <p> <?=$rsCuriosidades['titulo']?></p>
                        </td>
                        <td>
                            <div class="color <?=$rsCuriosidades['classe_css']?>" ></div>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_topoCuriosidades.php?modo=editar&codigo=<?=$rsCuriosidades['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao"
                                <?php
                                    if($rsCuriosidades['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode excluir essa sessão enquanto ela estiver ativada!');"
                                <?php
                                    } else {
                                ?>
                                    onclick="return confirm('Deseja excluir essa sessão?');" href="../bd/deletarTopoCuriosidade.php?modo=excluir&codigo=<?=$rsCuriosidades['codigo']?>&nomeFoto=<?=$rsCuriosidades['foto']?>"
                                <?php
                                    }
                                ?>
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>
                            
                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                <?php
                                    if($rsCuriosidades['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode manter desativada essa sessão! Clique na sessão que deseja ativar');"
                                <?php
                                    } else {
                                ?>
                                    href="../bd/on_offTopoCuriosidades.php?status=<?=$rsCuriosidades['status']?>&codigo=<?=$rsCuriosidades['codigo']?>"  
                                <?php
                                    }
                                ?>
                            >
                                <?php if($rsCuriosidades['status'] == 1) { ?>
                                    <img src="../imgs/icon_on.png" alt="imagem"> 
                                <?php } else { ?>
                                    <img src="../imgs/icon_off.png" alt="imagem">
                                <?php } ?>
                            </a>
                        </td>
                    </tr>
                    <?php
                        
                         } ?>
                </table>
            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>

    </body>
</html>