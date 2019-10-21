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
        <div id="usuarios_container">
            <section class="conteudo center fonte">
                <h1 class="txt_center">Administração de Usuários </h1>
                
                <form method="post" action="" name="frmniveis" class="fonte">
                    <h2> Criar Nível </h2>
                    <div class="itens_frm_users">
                        <span>Nome: </span>
                        <input name="txtnome" class="fonte" type="text" maxlength="100" required size="30">
                    </div>
                    <h3> Permissões:</h3>
                    <div class="itens_frm_users">
                        <input class="checkbox_nivel" type="checkbox" value="1" name="permissao1"> <span>Administração de Conteúdo</span>
                    </div>
                    <div class="itens_frm_users">
                        <input class="checkbox_nivel" type="checkbox" value="1" name="permissao2"> <span>Administração Fale Conosco</span>
                    </div>
                    <div class="itens_frm_users">
                        <input class="checkbox_nivel" type="checkbox" value="1" name="permissao3"> <span>Administração Usuários</span>
                    </div>
                    <div class="itens_frm_users">
                        <input class="botao back_green btn_users color_white fonte" type="submit" value="Criar" name="btnnivel">
                    </div>
                </form>                
                
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>