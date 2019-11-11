//Validação dos caracteres
function validarEntrada (caracter, tipoAceito){
    
    if (window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which; 
    
    var tipo = tipoAceito;
    console.log(tipoAceito);
    
    //verifica o tipo aceito
    if(tipo == "string"){
       //valida apenas a digitação de letras
        if(asc >= 48 && asc <= 57)
            return false; 
    }
    else if (tipo == "numeric"){
        //valida apenas a digitação de números
        if(asc < 48 || asc > 57)
            return false; 
    }
    
}

//Mascara RG
function mascaraRg(objeto, caracter){

    //valida entrada
    if(validarEntrada(caracter, 'numeric')==false)
        return false
    else
    {
        //variaveis
        var input = objeto.value;
        var id = objeto.id;
        var resultado = input;
    
        //Acrescenta . conforme a quantidade de caracteres no value da input
        if(input.length == 2)
            resultado += ".";
        else if(input.length == 6)
            resultado +=".";
        else if(input.length == 10)
            resultado +="-";
    
        document.getElementById(id).value = resultado;
    }

}

//Mascara CPF
function mascaraCpf(objeto, caracter){

    //valida entrada
    if(validarEntrada(caracter, 'numeric')==false)
        return false;
    else
    {
        //variaveis
        var input = objeto.value;
        var id = objeto.id;
        var resultado = input;

        //Acrescenta . conforme a quantidade de caracteres no value da input
        if(input.length == 3)
            resultado += ".";
        else if(input.length == 7)
            resultado += ".";
        else if(input.length == 11)
            resultado += "-";

        document.getElementById(id).value = resultado;
    }
        
}

//Mostrar senha
function mostrarSenha() {
    //pega a input e a img
    var input = document.getElementById("senha");
    var img = document.getElementById("icon_senha");

    //verifica o tipo da input
    if(input.type == "password"){
        input.type = "text";
        img.src = "../imgs/icon_eye_on.png";
    }
    else{
        input.type = "password";
        img.src = "../imgs/icon_eye_off.png";
    }
}

//Mostra as permissões ativadas e desativadas
// function mostrarPermissao(valor){

//     var bola = document.getElementById("bola");

//     if(valor == 1)
//     {

//     }
// }