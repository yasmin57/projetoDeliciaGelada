<?php
    //verifica se existe a variavel modo existe
    if(isset($_POST['modo']))
    {
        //Verifica se a variavel modo tem a ação de vizualizar
        if(strtoupper($_POST['modo']) ==  'VISUALIZAR')
        {
            //Recebe o id do registro enviado pelo Ajax
            $codigo = $_POST['codigo'];
            //importe do arquivo de conexão
            require_once('../../bd/conexao.php');
            //chamada p/ a função que conecta com o banco
            $conexao = conexaoMysql();
            //script p/ buscar no bd
            $sql = "select * from tblcontatos where id=".$codigo;
            //executa o script no bd
            $select = mysqli_query($conexao, $sql);
            //verifica se existem dados e converte em array
            if($rsVer = mysqli_fetch_array($select))
            {
                //Atribui a variaveis os dados do BD
                $nome = $rsVer['nome'];
                $telefone = $rsVer['telefone'];
                $celular = $rsVer['celular'];
                $email = $rsVer['email'];
                $homepage = $rsVer['homepage'];
                $tipo = $rsVer['tipo'];
                $facebook = $rsVer['facebook'];
                $sexo = $rsVer['sexo'];
                $mensagem = $rsVer['mensagem'];
                $profissao = $rsVer['profissao'];
                
            }     
        }
    }        
?>

<!-- Html da modal -->
    <table id="table_modal">
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>Nome:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$nome?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>telefone:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$telefone?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>celular:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$celular?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>email:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$email?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>homepage:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$homepage?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>facebook:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$facebook?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>tipo:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$tipo?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>mensagem:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$mensagem?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>sexo:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$sexo?></p></td>
        </tr>
        <tr>
            <td class="contatos_coluna fonte back_green color_white"><p>profissão:</p></td>
            <td class="contatos_coluna fonte color_white back_pink_light"><p><?=$profissao?></p></td>
        </tr>
    </table>
