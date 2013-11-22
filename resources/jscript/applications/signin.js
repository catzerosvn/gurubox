$(function(){
    
    $("#txtUsername").bind('keypress', function(e) {
        if(e.keyCode==13){
            doSignin()
        }
    });
    
    $("#txtPassword").bind('keypress', function(e) {
        if(e.keyCode==13){
            doSignin()
        }
    });
        
});

function doSignin(){
    var formdata = $('#form_data').serialize();
     
    $.ajax({
        type: "POST",
        url: httpURL + "signin/actionSignin",
        data: "is_ajax=" + Math.random()+"&"+formdata,
        beforeSend: function() {            
            $("#div_error_login").html(loading_small);
        },
        success: function(data) {
            if(data == "TRUE"){
                location.href= httpURL + "home";
            }else{                  
                $("#div_error_login").html("<div style=\"border: 1px;background-color: #FFB5C5;border-radius: 50px;height: 20px;width:250px;padding-left: 10px;\"><font style=\"font-family: Arial,Tahoma;font-size: 13px; color: red;\">Incorrect username or password.</font></div>");
            }
        }
    });    
}