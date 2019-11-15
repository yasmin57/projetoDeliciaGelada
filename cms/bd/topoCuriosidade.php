<?php
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btncuriosidades']))
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
        $titulo = $_POST['txttitulo'];
        $cor = $_POST['rdocolor'];
        
        //VERIFICA SE O MODO EDITAR E SE NÃO HÁ UMA NOVA FOTO A SER UPADA
        if($_POST['btncuriosidades'] == 'EDITAR' && $_FILES['flefoto']['name'] == ""){
            //SCRIPT P/ ATT TDS OS CAMPOS EXCETO O DA FOTO
            $sql = "update tbltopocuriosidades set titulo='".$titulo."',
                    codecor=".$cor." where codigo =".$_SESSION['codigoTopo'];
            //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA 
            if(mysqli_query($conexao, $sql)){  
                //RETORNA P/ A PAG DO FORMULÁRIO
                header('location:../raiz/adm_curiosidades.php');
            }
            else{
                echo($sql);
            }
        }
        elseif($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> ""){
            //GUARDA O TAMANHO DO ARQUIVO SELECIONADO
            $arquivo_size = $_FILES['flefoto']['size'];

            //CONVERTE O TAMANHA EM KBYTE E PEGA SOMENTE A PARTE INTEIRA
            $tamanho_arquivo = round($arquivo_size/1024);

            //GUARDA AS EXTENSÕES PERMITIDAS
            $arquivos_permitidos = array("image/jpeg", "image/png", "image/jpg");
            
            //GUARDA A EXTENSÃO DO ARQUIVO SELECIONADO
            $ext_arquivo = $_FILES['flefoto']['type'];

            //VERIFICA SE A EXTENSÃO DO ARQUIVO SELECIONADO É PERMITIDA
            if(in_array($ext_arquivo, $arquivos_permitidos)){
                //VERIFICA SE O TAMANHO DO ARQUIVO É MENOR OU IGUAL AO PERMITIDO (2MB)
                if($tamanho_arquivo < 2000){
                    //PERMITE RETORNAR APENAS O NOME DO ARQUIVO
                    $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                    //PERMITE RETORNAR APENAS A EXTENÇÃO DO ARQUIVO
                    $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                    //CRIPTOGRAFIA DO NOME DO ARQUIVO DE ACORDO COM UMA ID ALEATÓRIA E A HORA QUE FOI SELECIONADA 
                    $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                    //GUARDA O NOVO NOME JUNTO COM A EXTENSÃO DO ARQUIVO
                    $foto = $nome_arquivo_cripty.".".$ext;

                    //PEGA O LUGAR QUE O ARQUIVO ESTÁ
                    $arquivo_temp = $_FILES['flefoto']['tmp_name'];

                    //GUARDA O CAMINHO QUE ELA DEVE FICAR
                    $diretorio = "../../imgs/";

                    if(move_uploaded_file($arquivo_temp, $diretorio.$foto)){
                        //VERIFICA SE O SCRIPT É P/ CRIAR OU ATUALIZAR
                        if($_POST['btncuriosidades'] == 'CRIAR'){
                            $sql = "insert into tbltopocuriosidades (titulo, foto, codecor)
                            values('".$titulo."', '".$foto."', ".$cor.")"; 
                        }
                        elseif($_POST['btncuriosidades'] == 'EDITAR'){
                            $sql = "update tbltopocuriosidades set titulo='".$titulo."', foto='".$foto."',
                            codecor=".$cor." where codigo=".$_SESSION['codigoTopo'];
                        }

                        //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
                        if(mysqli_query($conexao, $sql)){
                            //APAGA FOTO ANTIGA CASO O USUÁRIO EDITE-A e APAGA A VAR DE SESSÃO COM O NOME DA FOTO
                            if(isset($_SESSION['nomeImg'])){
                                unlink("../../imgs/".$_SESSION['nomeImg']);
                                unset($_SESSION['nomeImg']);
                            }
                            //RETORNA A PAG DO FORMULÁRIO
                            header('location:../raiz/adm_topoCuriosidades.php');
                        }
                        else{
                            echo($sql);
                        }
                    }
                }
                else{
                    echo("<script> 
                    alert('tamanho de arquivo não pode ser maior do que 2Mb');
                    </script>");
                }
            }
            else{
                echo("<script> 
                        alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                        </script>");
            }
            
        }
        else{
            echo("<script> 
                        alert('Arquivo não seleciopnado conforme o tamanho ou o tipo');
                    </script>"); 
        }

    }
?>