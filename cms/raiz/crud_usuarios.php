<?php
    //IMPORTA O ARQUIVO DE CONEXÃO
    require_once('../../bd/conexao.php');
        
    //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
    $conexao = conexaoMysql();   
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>

        <!-- CODE JS - MODAL -->
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
                    url:"modalUsuarios.php",
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
                <div id="fechar_modal" class="botao back_pink_light color_white fonte">Fechar</div>
            </div>
        </div>

        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>

                <!-- EXIBIR USUÁRIOS -->
                <table  class="center fonte txt_center contatos_table">
                    <tr class="contatos_linha">
                        <td colspan="5"><h1> Usuários </h1></td>
                    </tr>
                    <tr class="contatos_linha back_pink color_white">
                        <td>
                            <p> Nome:</p>
                        </td>
                        <td>
                            <p> Celular:</p>
                        </td>
                        <td>
                            <p> Usuário:</p>
                        </td>
                        <td>
                            <p> Nível:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select tblusuarios.*, tblniveis.descricao from tblusuarios inner join tblniveis on tblniveis.codigo = tblusuarios.codenivel";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsUsuarios = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha back_green color_white">
                        <td>
                            <p> <?=$rsUsuarios['nome']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['celular']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['login']?></p>
                        </td>
                        <td>
                            <p> <?=$rsUsuarios['descricao']?></p>
                        </td>
                        <td>
                            <!-- ICONE LAPIS -->
                            <a href="adm_usuarios.php?modo=editar&codigo=<?=$rsUsuarios['codigo']?>&form=usuario" class="contatos_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png">
                            </a>
                            <!-- ICONE LUPA -->
                            <a href="#" class="contatos_icon float botao visualizar" onclick="verDados(<?=$rsUsuarios['codigo']?>);" >
                                <img src="../imgs/icon_ver.png">
                            </a>
                            <!-- ICONE EXCLUIR -->
                            <a class="contatos_icon float botao" onclick="return confirm('Deseja excluir esse usuário?');" href="../bd/deletar.php?modo=excluir&codigo=<?=$rsUsuarios['codigo']?>&page=admusuarios" >
                                <img src="../imgs/icon_excluir.png">
                            </a>
                            <!-- ICONE ATIVO/DESATIVO -->
                            <a class="contatos_icon float botao" href="adm.php?modo=editar&codigo=<?=$rsUsuarios['codigo']?>&form=usuario&status=<?=$rsUsuarios['status']?>">
                                <?php if($rsUsuarios['status'] == 1) { ?>
                                    <img src="../imgs/icon_on.png"> 
                                <?php } else { ?>
                                    <img src="../imgs/icon_off.png">
                                <?php } ?>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
                <!-- EXIBINDO NÍVEIS -->
                <table  class="center fonte txt_center contatos_table">
                    <tr class="contatos_linha">
                        <td colspan="5"><h1> Níveis </h1></td>
                    </tr>
                    <tr class="contatos_linha back_pink color_white">
                        <td>
                            <p> Nome:</p>
                        </td>
                        <td>
                            <p> Adm Conteúdo:</p>
                        </td>
                        <td>
                            <p> Adm Fale Conosco:</p>
                        </td>
                        <td>
                            <p> Adm Usuários:</p>
                        </td>
                        <td>
                            <p> Opções:</p>
                        </td>
                    </tr>
                    <?php 
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblniveis";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsNiveis = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha back_green color_white">
                        <td>
                            <p> <?=$rsNiveis['descricao']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_conteudo']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_cliente']?></p>
                        </td>
                        <td>
                            <p> <?=$rsNiveis['adm_usuarios']?></p>
                        </td>
                        <td>
                            <a href="adm_usuarios.php?modo=editar&codigo=<?=$rsNiveis['codigo']?>&form=nivel" class="contatos_icon float botao visualizar">
                                <img src="../imgs/icon_edit.png">
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>