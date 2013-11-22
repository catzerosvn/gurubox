

$(function(){  
    $('#txt_pic').change(function() {
        if ($(this).val()) {
            var pattern = "png|jpe?g|gif";
            if ($(this).val().match(new RegExp(".(" + pattern + ")$")) == null) {
                alert( 'อัพโหลดได้เฉพาะไฟล์ gif jpg jpeg png');
                $('#txt_pic').val("");
            }
        }
    });
}); 

function checkMemberIdCard(){
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmCheckMemberIdCard",
        data: "is_ajax=" + Math.random()+"&MemberIdCard="+$("#txt_memberIDcard").val(),
        beforeSend: function() {  
            $("#div_memberIdCard").empty();
            $("#div_memberIdCard").html(loading_small);            
        },
        success: function(data) {
            $("#div_memberIdCard").empty();            
            if(data == "TRUE"){
                $("#txt_checker_memberIDcard").val("");
            }else{
                $("#div_memberIdCard").html("<<< รหัสบัตรประชาชนซ้ำ");
                $("#txt_checker_memberIDcard").val("ERROR");                
            }
        }
    });   
}

function checkEmail(){
    var emailFilter=/^.+@.+\..{2,3}$/;
    
    $("#div_Email").empty();
    $("#div_Email").html(loading_small); 
    
    if (!(emailFilter.test($("#txt_mail").val()))) {
        $("#div_Email").html("<<< Email ไม่ถูกต้อง");
        $("#txt_checker_memberEmail").val("ERROR");     
    }else{
        $("#txt_checker_memberEmail").val("");
        $("#div_Email").empty();
    }
}

function checkOtherCareer(){
    if($("#txt_career").val() == "OTHER"){
        $("#div_addCareer").show();
    }else{
        $("#div_addCareer").hide();
    }
}

function checkMemberUser(){
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmCheckMemberUser",
        data: "is_ajax=" + Math.random()+"&MemberUser="+$("#txt_user").val(),
        beforeSend: function() {  
            $("#div_MemberUser").empty();
            $("#div_MemberUser").html(loading_small);            
        },
        success: function(data) {
            $("#div_MemberUser").empty();            
            if(data == "TRUE"){
                $("#txt_checker_MemberUser").val("");
            }else{
                $("#div_MemberUser").html("<<< Username ถูกใช้ไปแล้ว");
                $("#txt_checker_MemberUser").val("ERROR");                
            }
        }
    });   
}

function doAddNewMember(){
    if($("#txt_prefix").val() == "0"){
        alert("กรุณาเลือกคำนำหน้าชื่อ");
        $("#txt_prefix").focus();
        return false;
    }    
    if($("#txt_memberName").val() == ""){
        alert("กรุณากรอกชื่อ");
        $("#txt_memberName").focus();
        return false;
    }
    if($("#txt_memberLastname").val() == ""){
        alert("กรุณากรอกนามสกุล");
        $("#txt_memberLastname").focus();
        return false;
    }
    if($("#txt_memberIDcard").val() == ""){
        alert("กรุณากรอกรหัสบัตรประชาชน");
        $("#txt_memberIDcard").focus();
        return false;
    }
    if($("#txt_Tel").val() == ""){
        alert("กรุณากรอกเบอร์โทรศัพท์");
        $("#txt_Tel").focus();
        return false;
    }
    if($("#txt_mail").val() == ""){
        alert("กรุณากรอก E-mail");
        $("#txt_mail").focus();
        return false;
    }
    if($("#txt_career").val() == "0"){
        alert("กรุณาเลือกอาชีพ");
        $("#txt_career").focus();
        return false;
    }    
    if($("#txt_career").val() == "OTHER"){
        if($("#txt_addCareer").val() == ""){
            alert("กรุณากรอกอาชีพ");
            $("#txt_addCareer").focus();
            return false;
        }        
    }    
    if($("#txt_user").val() == ""){
        alert("กรุณากรอก Username");
        $("#txt_user").focus();
        return false;
    }        
    
    checkMemberIdCard()
    checkEmail()
    checkOtherCareer()
    
    if($("#txt_checker_memberIDcard").val() != ""){
        return false;
    }
    if($("#txt_checker_memberEmail").val() != ""){
        return false;
    }
    if($("#txt_checker_MemberUser").val() != ""){
        return false;
    }
    
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"blind",
        disabled: true,
        width:380
    });
        
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $("#form_member").submit();
}

function doResetAddNewMember(){
    $("#div_addCareer").hide();
}

function doEditMember(member_id){
    $("#div_editMember").empty();
    
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmEditMemberLoadData",
        data: "is_ajax=" + Math.random()+"&member_id="+member_id,
        beforeSend: function() {
            $("#div_editMember").html("<BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_editMember").empty();
            $("#div_editMember").html(data);
            
            $("#div_editMember").dialog({
                title: "แก้ไขข้อมูล : "+$("#hid_name").val(),
                width:550,
                height:680,
                modal: true,
                buttons: { 
                    "บันทึก":function(){
                        doActionEditMember("'"+$("#txt_memberID").val()+"'");
                    },
                    " ปิด ": function() {
                        $(this).dialog("close");
                    }
                }
            });            
        }
    });   
}

function doActionEditMember(member_id){
    if($("#txt_prefix").val() == "0"){
        alert("กรุณาเลือกคำนำหน้าชื่อ");
        $("#txt_prefix").focus();
        return false;
    }    
    if($("#txt_memberName").val() == ""){
        alert("กรุณากรอกชื่อ");
        $("#txt_memberName").focus();
        return false;
    }
    if($("#txt_memberLastname").val() == ""){
        alert("กรุณากรอกนามสกุล");
        $("#txt_memberLastname").focus();
        return false;
    }
    if($("#txt_Tel").val() == ""){
        alert("กรุณากรอกเบอร์โทรศัพท์");
        $("#txt_Tel").focus();
        return false;
    }
    if($("#txt_mail").val() == ""){
        alert("กรุณากรอก E-mail");
        $("#txt_mail").focus();
        return false;
    }
    if($("#txt_career").val() == "0"){
        alert("กรุณาเลือกอาชีพ");
        $("#txt_career").focus();
        return false;
    }    
    if($("#txt_career").val() == "OTHER"){
        if($("#txt_addCareer").val() == ""){
            alert("กรุณากรอกอาชีพ");
            $("#txt_addCareer").focus();
            return false;
        }        
    }    
    if($("#txt_user").val() == ""){
        alert("กรุณากรอก Username");
        $("#txt_user").focus();
        return false;
    }        
    
    checkEditMemberUser();
    checkEditEmail();
    
    if($("#txt_checker_memberEmail").val() != ""){
        return false;
    }
    if($("#txt_checker_memberUser").val() != ""){
        return false;
    }
    
    $("#div_editMember").dialog("close");
    
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        disabled: true,
        width:380
    });
        
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $("#form_member_Edit").submit();
}

function checkEditMemberUser(){
    return false;
    if($("#txt_user").val() != $("#txt_user_test").val()){
        $.ajax({
            type: "POST",
            url: httpURL + "members/frmCheckMemberUser",
            data: "is_ajax=" + Math.random()+"&MemberUser="+$("#txt_user").val(),
            beforeSend: function() {  
                $("#div_memberUser").empty();
                $("#div_memberUser").html(loading_small);            
            },
            success: function(data) {
                $("#div_memberUser").empty();            
                if(data == "TRUE"){
                    $("#txt_checker_memberUser").val("");
                }else{
                    $("#div_memberUser").html("<<< Username ถูกใช้ไปแล้ว");
                    $("#txt_checker_memberUser").val("ERROR");                
                }
            }
        });   
    }else{
        $("#txt_checker_memberUser").val("");
    }
    
}

function checkEditEmail(){
    if($("#txt_mail_hid").val() != $("#txt_mail").val()){
        var emailFilter=/^.+@.+\..{2,3}$/;
    
        $("#div_Email").empty();
        $("#div_Email").html(loading_small); 
    
        if (!(emailFilter.test($("#txt_mail").val()))) {
            $("#div_Email").html("<<< Email ไม่ถูกต้อง");
            $("#txt_checker_memberEmail").val("ERROR");     
        }else{
            $("#txt_checker_memberEmail").val("");
            $("#div_Email").empty();
        }
    }else{
        $("#txt_checker_memberEmail").val("");
        $("#div_Email").empty();
    }
}

function doClickTxtPic(){
    $("#txt_pic").click();
    $("#div_changepic2").show();
    $("#div_button_changepic").hide();
}

function doDeleteMember(member_id){
    $("#div_deleteMember").dialog({
        modal: true,
        buttons: { 
            "   ยืนยัน   ":function(){
                doActionDeleteMember(member_id);
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doActionDeleteMember(member_id){
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmActionDeleteMembers",
        data: "is_ajax=" + Math.random()+"&member_id="+member_id,
        beforeSend: function() {  
            $("#div_deleteMember").dialog("close");
    
            $("#div_loading_centerpage").dialog({
                modal: true,
                draggable:false,
                resizable:false,
                show:"fade",
                disabled: true,
                width:380
            });
        
            $(".ui-dialog-titlebar").attr("style", "display: none;");
        },
        success: function(data) {
            location.href= httpURL + "members/frmEditMember";
        }
    });   
}

function doSerachMember(){
    var form_data = $("#form_Member").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmSearchMember",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_loading_centerpage").dialog({
                modal: true,
                draggable:false,
                resizable:false,
                show:"fade",
                disabled: true,
                width:380
            });
        
            $(".ui-dialog-titlebar").attr("style", "display: none;");
            
            $("#div_showData").empty();
        },
        success: function(data) {
            $("#div_loading_centerpage").dialog("close");
            $("#div_showData").html(data);
        }
    });
}

function doChangePageMember(){
    var form_data = $("#form_Member").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "members/frmChangePageMember",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_dataTable").empty();
            $("#div_dataTable").html("<BR><BR><BR><center>"+loading_2+"</center>");          
        },
        success: function(data) {
            $("#div_dataTable").html(data);
        }
    });   
}