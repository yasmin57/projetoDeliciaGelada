<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //VARIAVEL QUE FICA NO VALUE DO BOTÃO
    $botao = "CRIAR";

    //VARIAVEL P/ O SELECT DAS CORES e SEPARADOR DE SESSÃO
    $codecor = 0;
    $codeimg = 0;

    //ATIVA O RECURSO DE VARIAVEL DE SESSÃO
    if(!isset($_SESSION)){
        session_start();
    }


    //VERIFICA SE EXISTE A VARIAVEL MODO NA URL
    if(isset($_GET['modo'])){
        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE EDITAR
        if($_GET['modo'] == 'editar')
        {
        
            $codigo = $_GET['codigo'];

            //VARIAVEL DE SESSÃO COM O CODIGO
            $_SESSION['codigoFaixa'] = $codigo;

            //SCRIPT P/ RESGATAR OS DADOS
            $sql = "select tblcuriosidades.*, tblseparasessao.nome from tblcuriosidades 
                    inner join tblseparasessao on tblseparasessao.codigo = tblcuriosidades.codeimg  where tblcuriosidades.codigo=".$codigo;

            //MANDA O SCRIPT P/ O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM UM ARRAY
            $rsCuriosidades = mysqli_fetch_array($select);

            //RESGATA OS DADOS E GUARDA-OS SEPARADAMENTE EM VARIÁVEIS
            $titulo = $rsCuriosidades['titulo'];
            $texto = $rsCuriosidades['texto'];
            $codecor = $rsCuriosidades['codecor'];
            $foto = $rsCuriosidades['foto'];
            $codeimg = $rsCuriosidades['codeimg'];
            $nomeImg = $rsCuriosidades['nome'];

            //VARIAVEL DE SESSÃO P/ GUARDAR NOME DA FOTO E APAGAR NO CASO DO USUÁRIO EDITA-LA
            $_SESSION['nomeFoto'] = $foto;

            //MUDA O VALUE DO BOTÃO
            $botao = "EDITAR";
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
        <script src="../js/jquery.js"></script>

        <?php if (isset($_SESSION['erroUpload'])){
                     echo($_SESSION['erroUpload']);
                     unset($_SESSION['erroUpload']);
                }
        ?>
        <!-- SCRIPT P/ ABRIR A MODAL -->
        <script>
            $(document).ready(function(){
                //abre a modal
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });
                
                $('#fechar_modal').click(function(){
                    $('#container').fadeOut(1000);
                })
            });
            
            function verDados(idItem)
            {
                $.ajax({
                    type:"POST",
                    url:"modalCuriosidades.php",
                    data: {modo:'visualizar', codigo:idItem}, 
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                })
            }
        </script>
    </head>
    <body>
        <!-- MODAL -->
        <div id="container">
            <div id="modal">
                <div id="modalDados"></div>
                <div id="fechar_modal" class="botao back_pink_light_cms color_white fonte">Fechar</div>
            </div>
        </div>

        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
                
        <!-- CONTEÚDO -->
        <div id="curiosidades">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração das Curiosidades </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_topoCuriosidades.php"> Gerencie o Topo da Página </a>
                </div>

                <h1 class="txt_center"> Crie Sessões</h1>
                <!-- Formulário Para Criar Páginas -->
                <form method="post"  action="../bd/salvarCuriosidade.php"  class="color_white center back_green_dark_cms form_curiosidades" name="frmcuriosidades" enctype="multipart/form-data">
                    <!-- Mostrar Imagem -->
                    <div id="img_curiosidades" class="back back_green_light_cms">
                        <?php if(isset($_GET['modo'])) {?>
                            <img src="../../imgs/<?=$foto?>" alt="imagem"/>
                        <?php } else{?>
                            <img src="../imgs/icon_image.png" alt="imagem">
                        <?php }?>
                    </div>

                    <!-- Restante do formulário -->
                    <div id="card_curiosidades">
                        <!-- TITULO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Título:</p>  </div>
                            <input value="<?=@$titulo?>" name="txttitulo" placeholder="Digite o titulo da curiosidade" class="fonte card_curiosidades_input" type="text" maxlength="150" required size="45">
                        </div>
                            <!-- TEXTO -->
                        <div class="card_curiosidades_big">
                            <div class="card_curiosidades_name"> <p>Texto:</p>  </div>
                            <textarea class="card_curiosidades_input fonte" maxlength="3000" name="txttexto" required ><?=@$texto?></textarea>
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
                                                    <input required checked name="rdocolor" value="<?=$rsColors['codigo']?>" type="radio" class="radio">
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
                                                <input required name="rdocolor" value="<?=$rsColors['codigo']?>" type="radio" class="radio">
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
                            <input required class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg">
                        </div>
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Separador de Sessões:</p>  </div>
                            <select name="slcseparasessao" class="fonte card_curiosidades_input">
                                    <?php 
                                        if(isset($_GET['modo'])){
                                            if($_GET['modo'] == 'editar'){
                                    ?>
                                            <option value="<?=$codeimg?>"> <?=$nomeImg?></option> 
                                    <?php 
                                            }
                                        }
                                    ?>
                                    <?php 
                                        $sql = "select * from tblseparasessao where codigo <>".$codeimg;

                                        $select = mysqli_query($conexao, $sql);

                                        while($rsSepara = mysqli_fetch_array($select)){
                                    ?>
                                            <option value="<?=$rsSepara['codigo']?>"> <?=$rsSepara['nome']?></option>
                                    <?php }?>
                            </select>
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
                        <td colspan="6"><h1> Sessões Existentes: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Faixa: </p>
                        </td>
                        <td>
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
                        $sql = "select tblcuriosidades.*, tblcolors.classe_css from tblcuriosidades inner join tblcolors on tblcolors.codigo = tblcuriosidades.codecor";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);

                        $faixa = 1;
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsCuriosidades = mysqli_fetch_array($select)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td>
                            <p> <?=$faixa?> </p>
                        </td>
                        <td>
                        <img src="../../imgs/<?=$rsCuriosidades['foto']?>" alt="imagem" class="img_cadastro">
                        </td>
                        <td colspan="2">
                            <p> <?=$rsCuriosidades['titulo']?></p>
                        </td>
                        <td>
                            <div class="color <?=$rsCuriosidades['classe_css']?> center"></div>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_curiosidades.php?modo=editar&codigo=<?=$rsCuriosidades['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao"
                                onclick="return confirm('Deseja excluir esse usuário?');" href="../bd/deletarCuriosidade.php?modo=excluir&codigo=<?=$rsCuriosidades['codigo']?>&nomeFoto=<?=$rsCuriosidades['foto']?>"
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>

                            <!-- ICONE LUPA -->
                            <a href="#" class="exibir_icon float botao visualizar" onclick="verDados(<?=$rsCuriosidades['codigo']?>);" >
                                <img src="../imgs/icon_ver.png" alt="imagem">
                            </a>
                            
                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                href="../bd/on_offCuriosidades.php?status=<?=$rsCuriosidades['status']?>&codigo=<?=$rsCuriosidades['codigo']?>"  
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
                        $faixa = $faixa +1;
                         } ?>
                </table>

            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>

    </body>
</html>