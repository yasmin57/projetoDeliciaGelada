<?php
    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btnvalores']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO COM O BD
        require_once("../../bd/conexao.php");
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();

        //ATIVA O RECURSO DE VARIAVEL DE SESSÃO
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['erroUpload'] = "";
            
        //RESGATA DADOS ENVIADOS PELO FORMULÁRIO
        $id = $_POST['slttitulo'];
        $texto = strtoupper($_POST['txttexto']);

        if($id == 1){
            $titulo = 'Missão';
        }
        elseif($id == 2){
            $titulo = 'Visão';
        }
        else{
            $titulo = 'Valores';
        }
        
        //VERIFICA SE O MODO EDITAR E SE NÃO HÁ UMA NOVA FOTO A SER UPADA
        if($_POST['btnvalores'] == 'EDITAR' && $_FILES['flefoto']['name'] == ""){
            //SCRIPT P/ ATT TDS OS CAMPOS EXCETO O DA FOTO
            $sql = "update tblvalores set id=".$id.", titulo='".$titulo."',
                        texto='".$texto."' where codigo =".$_SESSION['code'];
            //VERIFICA SE A CONEXÃO FOI BEM SUCEDIDA 
            if(mysqli_query($conexao, $sql)){  
                //RETORNA P/ A PAG DO FORMULÁRIO
                header('location:../raiz/adm_sobreValores.php');
            }
            else{
                echo($sql);
            }
        }
        elseif($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> "")
        {
            //GUARDA O TAMANHO DO ARQUIVO SELECIONADO
            $arquivo_size = $_FILES['flefoto']['size'];

            //CONVERTE O TAMANHA EM KBYTE E PEGA SOMENTE A PARTE INTEIRA
            $tamanho_arquivo = round($arquivo_size/1024);

            //GUARDA AS EXTENSÕES PERMITIDAS
            $arquivo_permitidos = array("image/jpeg", "image/jpg", "image/png");

            //GUARDA A EXTENSÃO DO ARQUIVO SELECIONADO
            $ext_arquivo = $_FILES['flefoto']['type'];



            //VERIFICA SE A EXTENSÃO DO ARQUIVO SELECIONADO É PERMITIDA
            if(in_array($ext_arquivo, $arquivo_permitidos))
            {
                //VERIFICA SE O TAMANHO DO ARQUIVO É MENOR OU IGUAL AO PERMITIDO (2MB)
                if($tamanho_arquivo <= 2000)
                {
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

                    //VERIFICA SE MOVEU P/ O NOVO LOCAL 
                    if(move_uploaded_file($arquivo_temp, $diretorio.$foto))
                    {

                        //VERIFICA SE O SCRIPT É P/ CRIAR OU ATUALIZAR
                        if($_POST['btnvalores'] == 'CRIAR'){
                            $sql = "insert into tblvalores (id, titulo, texto, icone)
                            values(".$id.", '".$titulo."', '".$texto."', '".$foto."')"; 
                        }
                        elseif($_POST['btnvalores'] == 'EDITAR'){
                            $sql = "update tblvalores set id=".$id.", titulo='".$titulo."',
                            texto='".$texto."', icone='".$foto."' where codigo =".$_SESSION['code'];
                        }
                        
                        
                        //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
                        if(mysqli_query($conexao, $sql)){  
                            //APAGA FOTO ANTIGA CASO O USUÁRIO EDITE-A e APAGA A VAR DE SESSÃO COM O NOME DA FOTO
                            if(isset($_SESSION['imgAntiga'])){
                                unlink('../../imgs/'.$_SESSION['imgAntiga']);
                                unset($_SESSION['imgAntiga']);
                            }
                            //RETORNA A PAG DO FORMULÁRIO
                            header('location:../raiz/adm_sobreValores.php');
                        }   
                        else{
                            $_SESSION['erroUpload'] = "Erro ao executar o script: ".$sql;
                            header('location:../raiz/adm_sobreValores.php');
                        }  
                    } 
                    else{
                        $_SESSION['erroUpload'] = "<script> 
                            alert('Não foi possível enviar o arquivo para o servidor');
                            </script>";
                        header('location:../raiz/adm_sobreValores.php');
                    }
                }
                else
                {
                    $_SESSION['erroUpload'] = "<script> 
                            alert('tamanho de arquivo não pode ser maior do que 2Mb');
                            </script>";
                    header('location:../raiz/adm_sobreValores.php');
                }
            }
            else
            {
                $_SESSION['erroUpload'] = "<script> 
                        alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                        </script>";
                header('location:../raiz/adm_sobreValores.php');
            }
        }
        else
        {
            $_SESSION['erroUpload'] = "<script> alert('Arquivo não seleciopnado conforme o 
                                                         tamanho ou o tipo');
                                        </script>"; 
            header('location:../raiz/adm_sobreValores.php');
        }      
    }

?>