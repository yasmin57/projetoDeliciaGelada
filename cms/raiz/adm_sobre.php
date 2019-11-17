<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //VARIAVEL QUE FICA NO VALUE DO BOTÃO
    $botao = "CRIAR";

    //VARIAVEL P/ O SELECT DAS CORES e SEPARADOR DE SESSÃO
    $codecor = 0;
    $codemodo = 0;

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
            $sql = "select tblsobre.*, tblmodo.descricao from tblsobre inner join tblmodo on tblmodo.codigo = tblsobre.modo where tblsobre.codigo =".$codigo;

            //MANDA O SCRIPT P/ O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM UM ARRAY
            $rsSobre = mysqli_fetch_array($select);

            //RESGATA OS DADOS E GUARDA-OS SEPARADAMENTE EM VARIÁVEIS
            $titulo = $rsSobre['titulo'];
            $texto = $rsSobre['texto'];
            $codemodo = $rsSobre['modo'];
            $desc_modo = $rsSobre['descricao'];
            $foto = $rsSobre['foto'];

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
                    url:"modalSobre.php",
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
                <h1 class="txt_center">Administração Sobre a Empresa </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_sobreDestaque.php"> Gerencie o Texto Destaque </a>
                </div>

                <h1 class="txt_center"> Crie Sessões</h1>

                <!-- Formulário Para Criar Páginas -->
                <form method="post"  action="../bd/salvarSobre.php"  class="color_white center back_green_dark_cms form_curiosidades" name="frmsobre" enctype="multipart/form-data">
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
                            <input value="<?=@$titulo?>" name="txttitulo" placeholder="Digite o titulo do texto" class="fonte card_curiosidades_input" type="text" maxlength="100" required size="45">
                        </div>
                            <!-- TEXTO -->
                        <div class="card_curiosidades_big">
                            <div class="card_curiosidades_name"> <p>Texto:</p>  </div>
                            <textarea class="card_curiosidades_input fonte" maxlength="3000" name="txttexto" required ><?=@$texto?></textarea>
                        </div>
                        <!-- MODO -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Modo:</p>  </div>
                            <select name="sltmodo" class="fonte card_curiosidades_input">
                                    <?php 
                                        if(isset($_GET['modo'])){
                                            if($_GET['modo'] == 'editar'){
                                    ?>
                                            <option value="<?=$codemodo?>"> <p><?=$desc_modo?></p></option>
                                    <?php  
                                            } 
                                        }
                                    ?>
                                    <?php 
                                        $sql = "select * from tblmodo where codigo <>".$codemodo; 

                                        $slt = mysqli_query($conexao, $sql);

                                        while($rsModo = mysqli_fetch_array($slt)){ ?>
                                            <option value="<?=$rsModo['codigo']?>"> <p><?=$rsModo['descricao']?></p></option>
                                    <?php
                                        } ?>
                            </select>        
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
                            <input style="margin-top: 15px" class="botao back_green_cms color_white fonte btn_curiosidades center" type="submit" value="<?=$botao?>" name="btnsobre">
                        </div>
                    </div>    
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="4"><h1> Sessões Existentes: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Modo: </p>
                        </td>
                        <td>
                            <p> Foto: </p>
                        </td>
                        <td>
                            <p> Título:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblsobre";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsSobre = mysqli_fetch_array($select)){
                    ?>
                    <tr class="exibir_linha back_green_cms color_white">
                        <td>
                            <p> <?=$rsSobre['modo']?> </p>
                        </td>
                        <td>
                        <img src="../../imgs/<?=$rsSobre['foto']?>" alt="imagem" 
                            class="img_cadastro"
                        >
                        </td>
                        <td>
                            <p> <?=$rsSobre['titulo']?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_sobre.php?modo=editar&codigo=<?=$rsSobre['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao"
                                onclick="return confirm('Deseja excluir essa sessão?');" href="../bd/deletarSobre.php?modo=excluir&codigo=<?=$rsSobre['codigo']?>&foto=<?=$rsSobre['foto']?>"
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>
                            
                            <!-- ICONE LUPA -->
                            <a href="#" class="exibir_icon float botao visualizar" onclick="verDados(<?=$rsSobre['codigo']?>);" >
                                <img src="../imgs/icon_ver.png" alt="imagem">
                            </a>

                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                href="../bd/on_offSobre.php?status=<?=$rsSobre['status']?>&codigo=<?=$rsSobre['codigo']?>"  
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