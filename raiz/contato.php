<?php 
    if(isset($_GET['btnenviar'])){
        if($_GET['txtmensagem']=="")
            $erro = "digite uma mensagem";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Entre em Contato | Delicia Gelada
        </title>
       <link href="../css/style.css" type="text/css" rel="stylesheet">
       <link href="../css/contato.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
       <script src="../js/modulos.js"></script>
    </head>
    <body>
       <!-- CABEÇALHO -->
        <?php require_once("header.php"); ?>
        
        <!-- CONTEÚDO -->
        <div id="contato">
            
            <!-- Topo da page - Vamos Conversar? -->
            <div id="vamos_conversar" class="back_yellow">
                <div class="conteudo center back_yellow">
                    <div id="marca_page" class="back_pink center"></div>
                    <table>
                        <tr>
                            <td id="img_arvore" class="back">
                            </td>
                            <td id="texto_vamos_conversar" class="fonte">
                                <h1> Vamos conversar? </h1>
                                <div class="back_orange"> 
                                    <p>
                                        Assim como as plantas precisam de sol, nós precisamos da sua opinião para continuar sempre crescendo.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <!--  Design (Sobre oq vc quer falar? + gmail) + Formulário -->
            <div id="entreem_contato" class="back_green">
                <div class="conteudo center back_green">
                    <table>
                        <tr>
                            <!--  Parte esquerda -->
                            <td id="design" class="fonte">
                                <h2> Sobre o que você quer falar? </h2>
                                <h4> Chega mais, a gente adora conversar.</h4>
                                <h3 class="float"> SADG </h3> 
                                <p class="float">Serviço de Atendimento Delicia Gelada </p>
                                <div class="float back" id="icon_gmail"></div> <p class="float"> sagd@zanlorenzi.com.br </p>
                            </td>
                            <!--  Parte direita (formulário) -->
                            <td id="formulario" class="fonte">
                                <p> Preencha o formulário abaixo para enviar um e-mail direto para a nossa caixa de entrada. </p>
                                <form method="get" name="frmcontato" action="../bd/inserir.php">
                                    <table>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">Nome*:</td>
                                            <td>  <input class="input" onkeypress="return validarEntrada(event, 'string');" type="text" maxlength="100" name="txtnome" size="45" required > </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td  class="texto_frm">Telefone:</td>
                                            <td>  <input class="input" onkeypress="return mascaraFone(this, event);" type="text" maxlength="15" name="txttelefone" size="45" id="tel"> </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">Celular*:</td>
                                            <td>  <input class="input" onkeypress="return mascaraFone(this, event);" type="text" maxlength="15" name="txtcelular" size="45" id="cel" required > </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">email*:</td>
                                            <td>  <input class="input" type="email" maxlength="100" name="txtemail" size="45" required> </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">home page:</td>
                                            <td>  <input class="input" type="text" maxlength="2048" name="txthomepage" size="45" placeholder="digite o link da sua pagina home"> </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">facebook:</td>
                                            <td>  <input class="input" type="text" maxlength="2048" name="txtfacebook" size="45" placeholder="digite o link do seu facebook"> </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">tipo: </td>
                                            <td>  <select id="select" class="input" name="slcmsg">
                                                <!-- Mudar p/ radio -->
                                                    <option class="fonte" value="" selected> Selecione o tipo de mensagem </option>
                                                    <option class="fonte" value="sugestao"> Sugestão </option>
                                                    <option class="fonte" value="critica"> Crítica </option>
                                                  </select> 
                                            </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">Mensagem*:</td>
                                            <td> <textarea class="sexo fonte" maxlength="4000" name="txtmensagem" required cols="53" rows="5"></textarea> </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">sexo*:</td>
                                            <td> <input class="sexo" type="radio"  name="rdosexo" size="45" value="M" required> Masculino 
                                                <input class="sexo" type="radio"  name="rdosexo" size="45" value="F" required>
                                                Feminino 
                                            </td>
                                        </tr>
                                        <tr class="itens_frm fonte">
                                            <td class="texto_frm">profissão*:</td>
                                            <td>  <input class="input" type="text" onkeypress="return validarEntrada(event, 'string');" maxlength="100" name="txtprofissao" size="45" required> </td>
                                        </tr>
                                        <tr class="itens_frm">
                                            <td colspan="2"> <input type="submit" value="ENVIAR" name="btnenviar" class="btn_enviar botao fonte back_yellow"></td>
                                        </tr>
                                    </table>
                                </form>
                                <p> Os itens com * são obrigatórios </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- RODAPÉ  -->
       <?php require_once("footer.php"); ?>
    </body>
</html>