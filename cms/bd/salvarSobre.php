<?php
    //VERIFICA A AÇÃO DO BOTÃO
    if(isset($_POST['btnsobre'])){

        //IMPORTA O ARQUVIO DE CONEXÃO
        require_once("../../bd/conexao.php");

        //CONECTA COM O BANCO
        $conexao = conexaoMysql();

        //INICIA O RECURSO DE VARIAVEL DE SESSÃO
        if(!isset($_SESSION)){
            session_start();
        }

        //CRIA A VARIAVEL DE SESSÃO P/ ERROS
        $_SESSION['erroUpload'] = "";

        //RESGATA OS VALORES DO FORM
        $botao = $_POST['btnsobre'];
        $titulo = $_POST['txttitulo'];
        $texto = $_POST['txttexto'];
        $modo = $_POST['sltmodo'];

        //VERIFICA SE ESTÁ NO MODO EDITAR E SE A FOTO NÃO FOI EDITADA
        if($botao == "EDITAR" && $_FILES['flefoto']['type'] == ""){

            //SCRIPT P/ O BD
            $sql = "update tblsobre set titulo='".$titulo."', texto='".$texto."', 
                    modo=".$modo." where codigo =".$_SESSION['code'];

            //MANDA P/ O BD
            $update = mysqli_query($conexao, $sql);

            //VERIFICA SE DEU CERTO E REDIRECIONA P/ O FORM
            if($update){
                unset($_SESSION['imgAntiga']);
                header("location:../raiz/adm_sobre.php");
            }
            else{
                echo($sql);
            }
        }
        //VERIFICA SE A FOTO NÃO ESTÁ VAZIA
        elseif($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['name'] <> "")
        {
            //GUARDA O TAMANHO DO ARQUIVO
            $foto_size = $_FILES['flefoto']['size'];

            //CONVERTE O TAMANHO EM KBYTE
            $tamanho = round($foto_size/1024);

            //GUARDA AS EXTENSÕES PERMITIDAS
            $ext_permitidas = array("image/png", "image/jpg", "image/jpeg");

            //GUARDA A EXTENSÃO DO ARQUIVO
            $ext_foto = $_FILES['flefoto']['type'];

            //VERIFICA SE A EXTENSÃO DO ARQUIVO É PERMITIDA
            if(in_array($ext_foto, $ext_permitidas)){
                //VERIFICA SE O TAMANHO DO ARQUIVO É PERMITIDO
                if($tamanho <= 2000){
                    //GUARDA O NOME DO ARQUIVO
                    $nome = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                    //CRIPTOGRAFA O NOME DO ARQUIVO
                    $nome_cripty = md5(uniqid(time()).$nome);

                    //GUARDA A EXTENSÃO DO ARQUIVO
                    $extensao = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                    //GUARDA O NOVO NOME JUNTO COM A EXTENSÃO
                    $foto = $nome_cripty.".".$extensao;

                    //GUARDA O DIRETÓRIO TEMPORÁRIO DO ARQUIVO
                    $tmp = $_FILES['flefoto']['tmp_name'];

                    //GUARDA O NOVO DIRETÓRIO
                    $diretorio = "../../imgs/";

                    //MOVE O ARQUIVO
                    if(move_uploaded_file($tmp, $diretorio.$foto)){
                        //VERIFICA SE A AÇÃO É INSERIR OU EDITAR
                        if($_POST['btnsobre'] == "CRIAR"){
                            //SCRIPT P/ O BD
                            $sql = "insert into tblsobre (titulo, texto, foto, modo) 
                            values('".$titulo."', '".$texto."', '".$foto."', ".$modo.")";
                        }
                        elseif($_POST['btnsobre'] == "EDITAR"){
                            $sql = "update tblsobre set titulo='".$titulo."', texto='".$texto."', 
                                    foto='".$foto."', modo=".$modo." where codigo =".$_SESSION['code'];
                        }
                        //MANDA P/ O BD
                        $insert = mysqli_query($conexao, $sql);

                        //VERIFICA SE A CONEXAO FOI BEM SUCEDIDA
                        if($insert){
                            //VERIFICA SE EXISTE A VAR DE SESSÃO COM O NOME DA FOTO
                            if(isset($_SESSION['imgAntiga'])){
                                //APAGA A FOTO
                                unlink($diretorio.$_SESSION['imgAntiga']);
                                //APAGA A VARIAVEL 
                                unset($_SESSION['imgAntiga']);
                            }
                             //REDIRECIONA P/ O FORM
                            header("location:../raiz/adm_sobre.php");
                        }
                        else{
                            $_SESSION['erroUpload'] = "Erro ao executar o script: ".$sql;
                            header('location:../raiz/adm_curiosidades.php');
                        }
                    }
                    else{
                        $_SESSION['erroUpload'] = "<script> 
                            alert('Não foi possível enviar o arquivo para o servidor');
                            </script>";
                        header('location:../raiz/adm_curiosidades.php');
                    }
                }
                else
                {
                    $_SESSION['erroUpload'] = "<script> 
                            alert('tamanho de arquivo não pode ser maior do que 2Mb');
                            </script>";
                    header('location:../raiz/adm_curiosidades.php');
                }
            }
            else
            {
                $_SESSION['erroUpload'] = "<script> 
                        alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                        </script>";
                header('location:../raiz/adm_curiosidades.php');
            }
        }
        else
        {
            $_SESSION['erroUpload'] = "<script> alert('Arquivo não seleciopnado conforme o 
                                                         tamanho ou o tipo');
                                        </script>"; 
            header('location:../raiz/adm_curiosidades.php');
        }

    }
?>