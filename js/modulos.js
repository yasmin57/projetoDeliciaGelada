function validarEntrada (caracter, tipoAceito){
    
    if (window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which; 
    
    var tipo = tipoAceito;
    console.log(tipoAceito);
    
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

function mascaraFone(obj, caracter){
    
    if(validarEntrada(caracter, "numeric")==false)
        return false
    else{
        var input = obj.value;
        var id = obj.id;
        var resultado = input;

        if(input.length == 0)
            resultado = "(";
        else if(input.length == 4)
            resultado +=") ";
        else if(input.length == 10)
            resultado += "-";
        else if(input.length == 15)
            return false;

        document.getElementById(id).value = resultado; 
    }
}