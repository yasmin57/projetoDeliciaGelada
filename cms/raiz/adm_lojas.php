<?php
    //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
    require_once("../../bd/conexao.php");

    //CHAMADA DA FUNÇÃO QUE CONECTA COM O BD
    $conexao = conexaoMysql();

    //INICIA O RECURSO DE VARIÁVEL DE SESSÃO
    if(!isset($_SESSION)){
        session_start();
    }

    //VAR P/ O VALUE DO BOTÃO
    $botao = "CRIAR";

    //VERIFICA SE EXISTE A VAR MODO
    if(isset($_GET['modo'])){
        //VERIFICA SE MODO É IGUAL EDITAR
        if($_GET['modo'] == "editar"){
            //RESGATA O CÓDIGO
            $codigo = $_GET['codigo'];

            //SCRIPT P/ O BD
            $sql = "select * from tbllojas where codigo =".$codigo;

            //MANDA O SCRIPT P/ O BD
            $select = mysqli_query($conexao, $sql);

            //TRANSFORMA OS DADOS EM ARRAY
            $rsLojas = mysqli_fetch_array($select);

            //RESGATA CADA DADO E GUARDA EM VARIÁVEIS
            $cidade = $rsLojas['cidadeestado'];
            $local = $rsLojas['local'];
            $endereco = $rsLojas['endereco'];
            $numero = $rsLojas['numero'];
            $telefone = $rsLojas['telefone'];
            $celular = $rsLojas['celular'];
            $horario = $rsLojas['horario'];
            $foto = $rsLojas['foto'];

            //MUDA O VALOR DO BOTÃO
            $botao = "EDITAR";

            //CRIA VAR DE SESSÕES COM O CÓDIGO E O NOME DA FOTO A SER APAGADA
            $_SESSION['codigoLoja'] = $codigo;
            $_SESSION['fotoLoja'] = $foto;

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
        <script src="../../js/modulos.js"></script>

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
                    url:"modalLojas.php",
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
                <h1 class="txt_center">Administração das Lojas </h1>

                <!-- Botao p/ gerenciar o topo da página -->
                <div class="menu_mensagem fonte botao btn_adm_usuarios back_green_cms txt_center">
                    <a class="color_white" href="adm_topoLoja.php"> Gerencie o Topo da Página </a>
                </div>

                <form action="../bd/salvarLojas.php" method="post"class="color_white center back_green_dark_cms form_curiosidades"
                 enctype = "multipart/form-data" name="frmlojas"
                 >
                    <!-- Mostrar Imagem -->
                    <div id="img_curiosidades" class="back back_green_light_cms">
                        <?php
                            if(isset($_GET['modo'])){
                        ?>
                            <img src="../../imgs/<?=$foto?>" alt="imagem">
                        <?php
                            } else {
                        ?>
                            <img src="../imgs/icon_image.png" alt="imagem">
                        <?php
                            }
                        ?>
                    </div>

                    <!-- Restante do formulário -->
                    <div id="card_curiosidades">
                        <!-- Cidade e estado -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Cidade - UF:</p>  </div>
                            <input name="txtcidade" placeholder="Ex: Bauru - SP" value="<?=@$cidade?>"
                            class="fonte card_curiosidades_input" type="text" maxlength="100" required size="45">
                        </div>
                        <!-- Local -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Local:</p>  </div>
                            <input name="txtlocal" placeholder="Ex: Shopping XXX" value="<?=@$local?>" 
                            class="fonte card_curiosidades_input" type="text" maxlength="150" required size="45">
                        </div>
                        <!-- Endereço -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Endereço:</p>  </div>
                            <input name="txtendereco" placeholder="Ex: Rua Alameda XXX" value="<?=@$endereco?>"
                            class="fonte card_curiosidades_input" type="text" maxlength="3000" required size="45">
                        </div>
                        <!-- Número -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Número:</p>  </div>
                            <input name="txtnumero" placeholder="Ex: 000"  value="<?=@$numero?>"
                            class="fonte card_curiosidades_input" type="text" maxlength="5" required size="45">
                        </div>
                        <!-- Telefone -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Telefone:</p>  </div>
                            <input name="txttelefone" placeholder="Ex: (000) 1111-2222" value="<?=@$telefone?>" 
                             class="fonte card_curiosidades_input" type="text" maxlength="15" required size="45"
                             id="tel" onkeypress="return  mascaraFone(this, event);">
                        </div>
                        <!-- Celular -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Celular:</p>  </div>
                            <input name="txtcelular" placeholder="Ex: (000) 1111-2222"  value="<?=@$celular?>"
                             class="fonte card_curiosidades_input" type="text" maxlength="15" required size="45"
                             id="cel" onkeypress="return  mascaraFone(this, event);">
                        </div>
                         <!-- Horário de funcionamento -->
                         <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p> Horário:</p>  </div>
                            <input name="txthorario" placeholder="Ex: Segunda à Sábado das 10h às 22h." value="<?=@$horario?>"
                            class="fonte card_curiosidades_input" type="text" maxlength="3000" required size="45">
                        </div>
                        <!-- Foto -->
                        <div class="card_curiosidades">
                            <div class="card_curiosidades_name"> <p>Foto:</p>  </div>
                             <input <?php if(!isset($_GET['modo'])){ ?> required <?php } ?> class="card_curiosidades_file fonte" type="file" name="flefoto" 
                            accept="image/jpeg, image/png, image/jpg">
                        </div>
                        <!-- Botão -->
                        <div class="card_curiosidades">
                            <input style="margin-top: 15px" 
                            class="botao back_green_cms color_white fonte btn_curiosidades center" 
                            type="submit" value="<?=$botao?>" name="btnlojas">
                        </div>
                    </div>
                </form>

                <!-- EXIBIR DADOS -->
                <table id="ver" class="center fonte txt_center exibir_table">
                    <tr class="exibir_linha">
                        <td colspan="5"><h1> Lojas Existentes: </h1></td>
                    </tr>
                    <tr class="exibir_linha back_pink_cms color_white">
                        <td>
                            <p> Foto: </p>
                        </td>
                        <td>
                            <p> Cidade - UF:</p>
                        </td>
                        <td>
                            <p> Local: </p>
                        </td>
                        <td>
                            <p> Telefone:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tbllojas";

                        //MANDA O SCRIPT P/ O BD
                        $select = mysqli_query($conexao, $sql);

                        //TRANSFORMA EM ARRAY E EXIBE 
                        while($rsLojas = mysqli_fetch_array($select)){
                    ?>
                        <tr class="exibir_linha back_green_cms color_white">
                        <td>
                            <img src="../../imgs/<?=$rsLojas['foto']?>" alt="imagem" class="img_cadastro"> 
                        </td>
                        <td>
                            <p> <?=$rsLojas['cidadeestado']?> </p>
                        </td>
                        <td>
                            <p> <?=$rsLojas['local']?> </p>
                        </td>
                        <td>
                            <p> <?=$rsLojas['telefone']?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_lojas.php?modo=editar&codigo=<?=$rsLojas['codigo']?>" class="exibir_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png" alt="imagem">
                            </a>

                            <!-- ICONE EXCLUIR -->
                            <a class="exibir_icon float botao visualizar"
                                onclick="return confirm('Deseja excluir esse registro?');" href="../bd/deletarLojas.php?modo=excluir&codigo=<?=$rsLojas['codigo']?>&nomeFoto=<?=$rsLojas['foto']?>"
                             >
                                <img src="../imgs/icon_excluir.png" alt="imagem">
                            </a>

                            <!-- ICONE LUPA -->
                            <a href="#" class="exibir_icon float botao visualizar" onclick="verDados(<?=$rsLojas['codigo']?>);" >
                                <img src="../imgs/icon_ver.png" alt="imagem">
                            </a>
                            
                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="exibir_icon float botao" 
                                href="../bd/on_offLojas.php?status=<?=$rsLojas['status']?>&codigo=<?=$rsLojas['codigo']?>"  
                            >
                                <?php if($rsLojas['status'] == 1) { ?>
                                    <img src="../imgs/icon_on.png" alt="imagem"> 
                                <?php } else { ?>
                                    <img src="../imgs/icon_off.png" alt="imagem">
                                <?php } ?>
                            </a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </section>
        </div>

        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</htm>