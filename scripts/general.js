
/*
 * Chequea si hay caracteres especiales
 */
function validateChar(texto) {

    var input = texto;
    var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";

    //Check for special characters
    for (var i = 0; i < input.length; i++) {
        if (iChars.indexOf(input.charAt(i)) != -1) {
            return false;
        }
    }
    return true;
}

function validateMail(texto){
var status = false;     
var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (texto.search(emailRegEx) == -1 || texto.length == 0 ) {
     }
     else {
          status = true;
     }
     return status;
}

function validateTextBox(texto)
{
    if($.trim(texto).length == 0 || !validateChar(texto))
        return false;
    return true;
}

