<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //VARIAVEL QUE FICA NO VALUE DO BOTÃO
    $botao = "CRIAR";

    //VARIAVEL P/ O SELECT DAS CORES e SEPARADOR DE SESSÃO
    $id = 0;

    //ATIVA O RECURSO DE VARIAVEL DE SESSÃO
    if(!isset($_SESSION)){
        session_start();
    }


    //VERIFICA SE EXISTE A VARIAVEL MODO NA URL
    if(isset($_GET['modo'])){
        //VERIFICA SE A VAR MODO TEM A FUNÇÃO DE EDITAR
        if($_GET['modo'] == 'editar'){
        
            //RESGATA O CODIGO VIA GET
            $codigo = $_GET['codigo'];


            //SCRIPT P/ RESGATAR OS DADOS
            $sql = "select * from tblvalores where codigo=".$codigo;

            //MANDA O SCRIPT P/ O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM UM ARRAY
            $rsSobre = mysqli_fetch_array($select);

            //RESGATA OS DADOS E GUARDA-OS SEPARADAMENTE EM VARIÁVEIS
            $titulo = $rsSobre['titulo'];
            $texto = $rsSobre['texto'];
            $id = $rsSobre['id'];
            $foto = $rsSobre['icone'];

            //VARIAVEL DE SESSÃO COM O CODIGO 
            $_SESSION['code'] = $codigo;

            //VARIAVEL DE SESSÃO P/ GUARDAR NOME DA FOTO E APAGAR NO CASO DO USUÁRIO EDITA-LA
            $_SESSION['imgAntiga'] = $foto;
            
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

        <?php if (isset($_SESSION['erroUpload'])){
                     echo($_SESSION['erroUpload']);
                     unset($_SESSION['erroUpload']);
                }
        ?>
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
                <h1 class="txt_center">Administração Sobre a Empresa </h1>

                <!-- Botao p/ gerenciar outras partes -->
                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_sobreDestaque.php"> Gerencie o Texto Destaque </a>
                </div>

                <div class="menu_mensagem fonte botao float btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_sobre.php"> Gerencie os Outros Textos </a>
                </div>

                <h1 style="clear:both" class="txt_center"> Valores </h1>

                <!-- Formulário Para Criar Páginas -->
                <form method="post"  action="../bd/salvarValores.php"  class="color_white center back_green_dark_cms form_curiosidades" name="frmvalores" enctype="multipart/form-data">
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
                            <div class="card_curiosidades_name"> <p>Titulo:</p>  </div>
                            <select name="slttitulo" class="fonte card_curiosidades_input">
                                   <?php
                                        if(isset($_GET['modo'])){
                                    ?>
                                        <option value="<?=$id?>"><p><?=$titulo?></p></option>
                                    <?php
                                        }
                                        if($id <> 1){
                                    ?>
                                        <option value="1"><p>Missão</p></option>
                                    <?php        
                                        } if($id <> 2){
                                    ?>
                                        <option value="2"><p>Visão</p></option>
                                    <?php        
                                        } if($id <> 3){
                                    ?>
                                        <option value="3"><p>Valores</p></option>
                                    <?php        
                                        }
                                    ?>
                            </select>        
                        </div>
                            <!-- TEXTO -->
                        <div class="card_curiosidades_big">
                            <div class="card_curiosidades_name"> <p>Texto:</p>  </div>
                            <textarea class="card_curiosidades_input fonte" maxlength="250" name="txttexto" required ><?=@$texto?></textarea>
                        </div>
                        <!-- FOTO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                            <input class="card_curiosidades_file fonte" type="file" name="flefoto" accept="image/jpeg, image/png, image/jpg"
                                    <?php if (!isset($_GET['modo'])){?> required <?php }?>
                            >
                        </div>
                        <!-- BOTÃO -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" class="botao back_green_cms color_white fonte btn_curiosidades center" type="submit" value="<?=$botao?>" name="btnvalores">
                        </div>
                    </div>    
                </form>

                
                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="2">
                            <h1> Textos Existentes: </h1>
                        </td>
                        <td colspan="2">
                            <form name="frmfiltro" method="post" id="frmfiltro">
                                Filtro: <select name="slcfiltro" class="fonte">
                                            <option selected value="0"> Todos</option>        
                                            <option selected value="1"> Missão</option>
                                            <option  value="2">Visão</option>
                                            <option value="3">Valores</option>
                                        </select>
                                <input type="submit" value="filtrar" class="back_green_cms fonte color_white botao" id="btnfiltrar" name="btnfiltrar">
                            </form>
                        </td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Titulo: </p>
                        </td>
                        <td>
                            <p> Foto: </p>
                        </td>
                        <td>
                            <p> Texto:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblvalores order by id";

                        //verifica a ação do botão de filtrar
                        if(isset($_POST['btnfiltrar'])){
                            //resgata o filtro
                            $filtro = $_POST['slcfiltro'];
                            
                            if($filtro != 0){
                               $sql = "select * from tblvalores where id= ".$filtro; 
                            } 
                        }
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsSobre = mysqli_fetch_array($select)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td>
                            <p> <?=$rsSobre['titulo']?> </p>
                        </td>
                        <td>
                        <img src="../../imgs/<?=$rsSobre['icone']?>" alt="imagem" 
                            class="img_cadastro"
                        >
                        </td>
                        <td style="width: 700px; padding: 12px;">
                            <p> <?=$rsSobre['texto']?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_sobreValores.php?modo=editar&codigo=<?=$rsSobre['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao"
                                <?php
                                    if($rsSobre['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode excluir essa sessão enquanto ela estiver ativada!');"
                                <?php
                                    } else {
                                ?>
                                    onclick="return confirm('Deseja excluir essa registro?');" href="../bd/deletarSobreValores.php?modo=excluir&codigo=<?=$rsSobre['codigo']?>&icone=<?=$rsSobre['icone']?>"
                                <?php
                                    }
                                ?>
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>

                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                <?php
                                    if($rsSobre['status'] == 1){
                                ?>
                                    onclick = "alert('Você não pode manter desativada essa sessão! Clique na sessão que deseja ativar');"
                                <?php
                                    } else {
                                ?>
                                    href="../bd/on_offSobreValores.php?id=<?=$rsSobre['id']?>&codigo=<?=$rsSobre['codigo']?>"  
                                <?php
                                    }
                                ?>
                            >
                                <?php if($rsSobre['status'] == 1) { ?>
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