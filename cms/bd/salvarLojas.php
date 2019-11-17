<?php
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btnlojas']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
        require_once("../../bd/conexao.php");
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();

        //ATIVA O RECURSO DE VARIAVEL DE SESSÃO
        if(!isset($_SESSION)){
            session_start();
        }

        //RESGATA DADOS ENVIADOS PELO FORMULÁRIO
        $cidade = $_POST['txtcidade'];
        $local = $_POST['txtlocal'];
        $endereco = $_POST['txtendereco'];
        $numero = $_POST['txtnumero'];
        $telefone = $_POST['txttelefone'];
        $celular = $_POST['txtcelular'];
        $horario = $_POST['txthorario'];

        if($_POST['btnlojas'] == "EDITAR" && $_FILES['flefoto']['name'] == ""){
            //SCRIPT P/ ATT
            $sql = "update tbllojas set cidadeestado='".$cidade."', local='".$local."',
                        endereco='".$endereco."', numero=".$numero.", telefone='".$telefone."',
                        celular='".$celular."', horario='".$horario."' where codigo=".$_SESSION['codigoLoja'];
            //MANDA P/ O BD
            $update = mysqli_query($conexao, $sql);

            //VERIFICA SE ATT E RETORNA P/ A PAGE DO FORM
            if($update){
                header('location:../raiz/adm_lojas.php');
            }
            else{
                echo($sql);
            }
        }
        elseif($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> ""){
            //GUARDA O TAMANHO DO ARQUIVO SELECIONADO
            $size_foto = $_FILES['flefoto']['size'];

            //CONVERTE O TAMANHA EM KBYTE E PEGA SOMENTE A PARTE INTEIRA
            $tamanho_foto = round($size_foto/1024);
            
            //GUARDA AS EXTENSÕES PERMITIDAS
            $ext_permitidas = array('image/png', 'image/jpeg', 'image.jpg');

            //GUARDA A EXTENSÃO DO ARQUIVO
            $ext_foto = $_FILES['flefoto']['type'];

            //VERIFICA SE A EXTENSÃO DO ARQUIVO SELECIONADO É PERMITIDA
            if(in_array($ext_foto, $ext_permitidas))
            {
                //VERIFICA SE O TAMANHO DA FOTO É MENOR DO QUE O PERMITIDO (2MB)
                if($tamanho_foto <= 2000)
                {
                    //GUARDA O NOME DA FOTO
                    $nome_foto = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                    //GUARDA A EXTENSÃO DA FOTO
                    $type_foto = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                    //ENCRIPTOGRAFA O NOME COM UMA ID ALEATÓRIO E A HORA QUE EXECUTAR
                    $nome_cripty = md5(uniqid(time()).$nome_foto);

                    //GUARDA O NOVO NOME CONCATENADO COM A EXTENSÃO
                    $foto = $nome_cripty.".".$type_foto;

                    //PEGA O LUGAR QUE O ARQUIVO ESTÁ
                    $local_foto = $_FILES['flefoto']['tmp_name'];

                    //GUARDA O NOVO LOCAL DA FOTO
                    $novo_local = "../../imgs/";

                    //VERIFICA SE MOVEU A FOTO P/ O NOVO LOCAL (SERVIDOR)
                    if(move_uploaded_file($local_foto, $novo_local.$foto))
                    {
                        //VERIFICA SE A FUNÇÃO DO BOTÃO É INSERIR OU ATUALIZAR
                        if($_POST['btnlojas'] == "CRIAR"){
                            $sql = "insert into tbllojas (cidadeestado, local, endereco, numero, telefone, celular,
                                    horario, foto) values('".$cidade."', '".$local."', '".$endereco."', 
                                    ".$numero.", '".$telefone."', '".$celular."', '".$horario."','".$foto."')";
                        }
                        else{
                            $sql = "update tbllojas set cidadeestado='".$cidade."', local='".$local."',
                            endereco='".$endereco."', numero=".$numero.", telefone='".$telefone."',
                            celular='".$celular."', horario='".$horario."', foto='".$foto."' where codigo=".$_SESSION['codigoLoja'];
                        }
                        //MANDA O SCRIPT P/ O BD
                        $script = mysqli_query($conexao, $sql);

                        //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA E REDIRECIONA P/ A PAGE DO FORM
                        if($script){
                            //VERIFICA SE EXISTE A VARIAVEL COM O NOME DA FOTO ANTIGA E APAGA
                            if(isset($_SESSION['fotoLoja'])){
                                unlink('../../imgs/'.$_SESSION['fotoLoja']); //APAGA A FOTO
                                unset($_SESSION['fotoLoja']); // APAGA A VAR DE SESSÃO
                            } 
                            header('location:../raiz/adm_lojas.php');
                        }
                        else{
                            echo($sql);
                        }
                    }
                    else{
                        //erro ao mover
                    }
                }
                else{
                    //erro caso o tamanho seja mt grande
                }
            }
            else{
                //erro caso a extensão não seja permitida
            }
        }

    }

?>