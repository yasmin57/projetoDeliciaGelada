<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU-->
        <?php require_once("header.php"); ?>
         
        <!-- CONTEÚDO -->
        <div id="usuarios">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>
                
                <table id="contatos_table" class="center fonte txt_center">
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
                        //IMPORTA O ARQUIVO DE CONEXÃO
                        require_once('../../bd/conexao.php');
        
                        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
                        $conexao = conexaoMysql();
                    
                        //SCRIPT P/ MANDAR P/ O BANCO
                        $sql = "select * from tblniveis";
                    
                        //EXECUTA O SCRIPT NO BANCO
                        $select = mysqli_query($conexao, $sql);
                    
                        //LAÇO P/ EXIBIR ENQUANTO HAVER CONTEÚDO
                        while($rsNiveis = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha back_green color_white">
                        <td>
                            <p> <?=$rsNiveis['nome']?></p>
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