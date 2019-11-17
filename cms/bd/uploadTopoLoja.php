<?php
    //VERIFICA SE ALGUMA FOTO FOI CARREGADA
    if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> "")
    {
        //GUARDA O TAMANHO DO ARQUIVO
        $arquivo_size = $_FILES['flefoto']['size'];

        //CONVERTE EM KBYTE E GUARDA SOMENTE A PARTE INTEIRA
        $tamanho_arq = round($arquivo_size/1024);

        //GUARDA AS EXTENSÕES PERMITIDAS
        $ext_permitidas = array("image/png", "image/jpg", "image/jpeg");

        //GUARDA A EXTENSÃO DO ARQUIVO
        $ext_arq = $_FILES['flefoto']['type'];

        //VERIFICA SE A EXTENSÃO DO ARQUIVO ESTÁ CORRETA
        if(in_array($ext_arq, $ext_permitidas))
        {
             //VERIFICA SE O TAMANHO NÃO ULTRAPASSOU O LIMITE 
            if($tamanho_arq <= 2000){
                //GUARDA SOMENTE O NOME DO ARQUIVO
                $nome = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);

                //GUARDA SOMENTE A EXTENSÃO DO ARQUIVO
                $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);

                //ENCRIPTOGRAFA O NOME
                $nome_cripty = md5(uniqid(time()).$nome);

                //GUARDA O NOME E A EXT
                $foto = $nome_cripty.".".$ext;

                //GUARDA O DIRETÓRIO TEMPORÁRIO
                $dir_anterior = $_FILES['flefoto']['tmp_name'];

                //GUARDA O DIRETÓRIO QUE DEVE FICAR
                $diretorio = "../../imgs/";

                //VERIFICA SE MOVEU
                if(move_uploaded_file($dir_anterior, $diretorio.$foto)){
                    session_start();
                    echo("<img src='../../imgs/".$foto."'>");
                    $_SESSION['preview'] = $foto;
                }
                else{
                    echo("<script> 
                            alert('Não foi possível enviar o arquivo para o servidor');
                            </script>");
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

?>