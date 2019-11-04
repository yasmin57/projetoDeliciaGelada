<header>
    <div class="conteudo center">
        <div id="header_logo" class="float"> 
            <div id="logo_img" class="float"></div>
            <div id="logo_string" class="float"> Delicia gelada</div>
        </div>
        <nav class="float">
            <ul id="menu">
                <li class="menu_itens float"> <a href="home.php"> Home </a></li>
                <li class="menu_itens float"> <a href="curiosidades.php"> Curiosidades</a></li>
                <li class="menu_itens float"> <a href="sobre.php"> sobre </a></li>
                <li class="menu_itens float"> <a href="promocoes.php"> promoções </a></li>
                <li class="menu_itens float"> <a href="lojas.php"> lojas </a></li>
                <li class="menu_itens float"> <a href="produto.php"> produto do mês </a></li>
                <li class="menu_itens float"> <a href="contato.php"> entre em contato </a></li>
            </ul>
        </nav>
        <form method="post" name="frmlogin" action="../bd/autenticacao.php" id="header_login" class="float">
            <div class="login_txt float">
                Usuário: <input type="text" maxlength="100" size="13" name="txt_user" required>
            </div>
            <div class="login_txt float">
                Senha: <input type="password" maxlength="20" size="13" name="txt_password" required>
            </div>
                <input type="submit" name="btnlogar" value="OK" id="header_botao" class="float back_orange">
        </form>
    </div>
</header>
