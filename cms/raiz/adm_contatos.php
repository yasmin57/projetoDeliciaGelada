<?php
    //Chama o arquivo que conecta com o banco
    require_once("../../bd/conexao.php");

    //Chama a função que conecta com o banco
    $conexao = conexaoMysql();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS | Delicia Gelada
        </title>
        <meta charset="utf-8"/>
        <link type="text/css" href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- CABEÇALHO E MENU -->
        <?php require_once("header.php"); ?>
        
        <div id="contatos">
            <section class="conteudo center fonte">
                <h1> Administração de fale conosco </h1>
                <table id="contatos_table" class="center">
                    <tr class="contatos_linha">
                        <td class="contatos_coluna  back_green color_white"><p>Nome</p></td>
                        <td class="contatos_coluna  back_green color_white"><p>Telefone</p></td>
                        <td class="contatos_coluna  back_green color_white"><p>Celular</p></td>
                        <td class="contatos_coluna  back_green color_white"><p>Email</p></td>
                        <td class="contatos_coluna  back_green color_white"><p>Sexo</p></td>
                        <td class="contatos_coluna  back_green color_white"><p>Profissão</p></td>
                        <td class="contatos_coluna  back_green color_white"><p> Opções </p></td>
                    </tr>
                    <?php 
                        // Script para vizualizar dados
                        $sql = "select * from tblcontatos";
                        //Conecta com o banco e manda o script
                        $select = mysqli_query($conexao, $sql);
                    
                        // laço que repete enquanto o banco tiver conteúdo
                        while($rsContatos = mysqli_fetch_array($select)){
                    ?>
                    <tr class="contatos_linha">
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['nome'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['telefone'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['celular'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['email'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['sexo'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> <?=$rsContatos['profissao'] ?> </td>
                        <td class="contatos_coluna color_white back_pink_light"> 
                            <a class="contatos_icon float botao" href="../bd/deletar.php?modo=excluir&codigo=<?=$rsContatos['id']?>"><img src="../imgs/icon_excluir.png"></a>
                            <a class="contatos_icon float botao"><img src="../imgs/icon_ver.png"></a>
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