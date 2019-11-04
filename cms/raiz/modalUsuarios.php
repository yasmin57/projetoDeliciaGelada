<?php
    //verifica se existe a variavel modo existe
    if(isset($_POST['modo']))
    {
        //Verifica se a variavel modo tem a ação de vizualizar
        if(strtoupper($_POST['modo']) == 'VISUALIZAR')
        {
            //Recebe o id do registro enviado pelo Ajax
            $codigo = $_POST['codigo'];
            //importe do arquivo de conexão
            require_once('../../bd/conexao.php');
            //chamada p/ a função que conecta com o banco
            $conexao = conexaoMysql();
            //script p/ buscar no bd
            $sql = "select tblusuarios.*, tblniveis.descricao
                    from tblusuarios inner join tblniveis
                    on tblniveis.codigo = tblusuarios.codenivel
                    where tblusuarios.codigo =".$codigo;
            //executa o script no bd
            $select = mysqli_query($conexao, $sql);
            //verifica se existem dados e converte em array
            if($rsVerUsers = mysqli_fetch_array($select))
            {
                $nome = $rsVerUsers['nome'];
                $email = $rsVerUsers['email'];
                $celular = $rsVerUsers['celular'];
                $login = $rsVerUsers['login'];
                $rg = $rsVerUsers['rg'];
                $cpf = $rsVerUsers['cpf'];
                $nivel = $rsVerUsers['descricao'];
                
            }
            
        }
    }
?>

<table id="table_modal">
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> Nome: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$nome?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> Email: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$email?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> Celular: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$celular?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> Usuário: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$login?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> RG: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$rg?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> CPF: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$cpf?></p></td>
    </tr>
    <tr>
        <td class="contatos_coluna fonte back_green color_white"> <p> Nível: </p></td>
        <td class="contatos_coluna fonte back_green color_white"> <p><?=$nivel?></p></td>
    </tr>
</table>