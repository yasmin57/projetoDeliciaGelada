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
                
                <div class="botao btn_users back_green txt_center"><a href="criar_usuarios.php" class="color_white"> Criar Usuário </a></div>
                
                <div class="botao btn_users back_green txt_center"><a href="criar_niveis.php" class="color_white"> Criar Nível </a></div>
                
                <div id="card_container">
                    <h1>Usuários:</h1>
                    <div class="card_user">
                        <!-- Ícone -->
                        <div class="user_image float"></div>
                        <!-- Status (ativado ou desativado) -->
                        <div class="user_status float"></div>
                        <!-- Setor e Nível -->
                        <div class="user_detals">
                            <p> Nome: </p>
                            <p> Nível: </p>
                        </div>
                        <!-- Editar -->
                        <div class="user_edit botao back_green txt_center">
                            <a class="color_white ">Editar</a>
                        </div>
                    </div>

                    <div class="card_user">
                        <!-- Ícone -->
                        <div class="user_image float"></div>
                        <!-- Status (ativado ou desativado) -->
                        <div class="user_status float"></div>
                        <!-- Setor e Nível -->
                        <div class="user_detals">
                            <p> Nome: </p>
                            <p> Nível: </p>
                        </div>
                        <!-- Editar -->
                        <div class="user_edit botao back_green txt_center">
                            <a class="color_white ">Editar</a>
                        </div>
                    </div>
                    
                </div>
                                
                
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>