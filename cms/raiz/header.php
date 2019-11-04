<?php
    //INICIA A VARIAVEL DE SESSÃO
    if(!isset($_SESSION))
    {
        session_start();
    }

    //IMPORTE DO ARQUIVO DE CONEXAO
    require_once('../../bd/conexao.php');

    //CHAMADA DA FUNÇÃO
    $conexao = conexaoMysql();

    //SCRIPT P/ O BD
    $sql = "select * from tblniveis where tblniveis.codigo = ".$_SESSION['codenivel'];

    //MANDA O SCRIPT P/ O BD
    $select = mysqli_query($conexao, $sql);

    $rsLogin = mysqli_fetch_array($select);

?>
<header class="back_black">
    <div class="conteudo center back_black" id="header">
        <div id="header_title" class="fonte float color_white">
            <h1 class="float"> CMS </h1> 
            <p class="float">- Sistema de Gerenciamento do Site </p>
        </div>
        <div id="header_img" class="float back"></div>
    </div>
</header>
        <div id="menu" class="back_pink">
            <div class="conteudo center back_pink">
                <table>
                    <tr>
                        <td class="menu_itens">
                            <?php
                               if($rsLogin['adm_conteudo'] == 1){ 
                            ?>
                                <div class="menu_icon back" id="adm_conteudo"></div>
                                <div class="menu_option fonte botao"><a href="adm_conteudo.php">Adm. Conteúdo</a></div>
                            <?php } ?>
                        </td>
                        <td class="menu_itens">
                            <?php
                               if($rsLogin['adm_cliente'] == 1){ 
                            ?>
                                <div class="menu_icon back" id="adm_fale"></div>
                                <div class="menu_option fonte botao"><a href="adm_contatos.php">Adm. Fale Conosco</a></div>
                            <?php } ?>
                        </td>
                        <td class="menu_itens">
                            <?php
                               if($rsLogin['adm_usuarios'] == 1){ 
                            ?>
                                <div class="menu_icon back" id="adm_usuarios"></div>
                                <div class="menu_option fonte botao"><a href="adm_usuarios.php">Adm. Usuários</a></div>
                            <?php } ?>
                        </td>
                        <td class="menu_itens"></td>
                        <td class="menu_itens" colspan="2">
                            <div class="menu_mensagem fonte"><p> Bem Vindo, <?=$_SESSION['nomeUsuario']?></p></div>
                            <div class="menu_mensagem fonte botao logout back_green"><a href="../../raiz/home.php">logout</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>