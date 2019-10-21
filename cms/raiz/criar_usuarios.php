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
                
                <form method="post" action="" name="frmusuarios" >
                    <div class="itens_frm_users">
                        <span>Nome: </span>
                        <input name="txtnome" class="fonte" type="text" maxlength="100" required>
                    </div>
                    <div class="itens_frm_users">
                        <span>Email: </span>
                        <input name="txtemail" class="fonte" type="email" maxlength="1000" required>
                    </div>
                    <div class="itens_frm_users">
                        <span>Registro: </span>
                        <input name="txtregistro" class="fonte" type="text" maxlength="100" required>
                    </div>
                    <div class="itens_frm_users"> <span>Nível: </span>
                        <select name="slcnivel" class="fonte">
                            <option value="1"> Nível Administrador </option>
                            <option value="2"> Nível Operador de Conteúdo </option>
                            <option value="3"> Relacionamento com o Cliente </option>
                        </select>  
                    </div>
                    <div class="itens_frm_users">
                        <span>Senha </span><input type="text" name="txtsenha" class="fonte" size="30" required>
                    </div>
                    <div class="itens_frm_users">
                        <input id="btn_create_user" class="botao back_green color_white fonte" type="submit" value="criar" name="btnuser">
                    </div>
                </form>                
                
            </section>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>