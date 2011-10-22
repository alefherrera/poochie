
$(document).ready(function() {
    $("register input").keypress(function (e) {
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13))
            $("#submit").click();
    });
        
    $("#registerbox").submit(function(){
        var validate = true;
        if(!validateTextBox($("#user").val())){
            $("#user").css("background-color", "#FFB3B3");
            validate = false;
        }
        if(!validateTextBox($("#password").val())){
            $("#password").css("background-color", "#FFB3B3");
            validate = false;
        }
        if(!validateTextBox($("#passwordrpt").val())){
            $("#passwordrpt").css("background-color", "#FFB3B3");
            validate = false;
        }
        if(!validateMail($("#mail").val())){
            $("#mail").css("background-color", "#FFB3B3");
            validate = false;
        }
        return validate;
    });
    
    $("#user").keyup(function() {
        if($(this).val() == 0)
            return;
        if(validateTextBox($(this).val())){
            $(this).css("background-color", "#FFFFFF");
            return;
        }
        $(this).css("background-color", "#FFB3B3");
    });
    
    $("#password").keyup(function() {
        if($(this).val() == 0)
            return;
        if(validateTextBox($(this).val())){
            $(this).css("background-color", "#FFFFFF");
            return;
        }
        $(this).css("background-color", "#FFB3B3");
    });
    
    $("#passwordrpt").keyup(function() {
        if($(this).val() == 0)
            return;
        if(validateTextBox($(this).val())){
            $(this).css("background-color", "#FFFFFF");
            return;
        }
        $(this).css("background-color", "#FFB3B3");
    });
    
    $("#mail").keyup(function() {
        if($(this).val() == 0)
            return;
        if(validateMail($(this).val())){
            $(this).css("background-color", "#FFFFFF");
            return;
        }
        $(this).css("background-color", "#FFB3B3");
    });
});