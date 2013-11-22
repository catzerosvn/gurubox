

function doAddNewGroupStaff(){
    if($("#txt_groupname").val() == ""){
        alert("กรุณากรอกชื่อกลุ่ม");
        $("#txt_groupname").focus();
        return false;
    }
    
    var formData = $("#form_GroupStaff").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionAddGroupStaff",
        data: "is_ajax=" + Math.random()+"&"+formData,
        beforeSend: function() {            
            $("#div_grouplist").empty();
            $("#div_grouplist").html("<BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_grouplist").empty();
            $("#div_grouplist").html(data);
        }
    });   
}

function doSelectEditGroupStaff(id,groupName){
    $("#txt_groupid").val(id);
    $("#txt_groupname").val(groupName);
}

function doEditGroupStaff(){
    if($("#txt_groupid").val() == ""){
        alert("กรุณาเลือกกลุ่ม");
        return false;
    }
    
    if($("#txt_groupname").val() == ""){
        alert("กรุณากรอกชื่อกลุ่ม");
        $("#txt_groupname").focus();
        return false;
    }
    
    var formData = $("#form_GroupStaff").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionEditGroupStaff",
        data: "is_ajax=" + Math.random()+"&"+formData,
        beforeSend: function() {            
            $("#div_grouplist").empty();
            $("#div_grouplist").html("<BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_grouplist").empty();
            $("#div_grouplist").html(data);
            
            $("#txt_groupid").val("");
            $("#txt_groupname").val("");
        }
    });   
}

function doSlelctDeleteGroupStaff(id){
    $("#div_confirmDelete").dialog({
        modal: true,
        buttons: { 
            "ยืนยัน":function(){
                doDeleteGroupStaff(id);
            },
            " ปิด ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doDeleteGroupStaff(id){
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionDeleteGroupStaff",
        data: "is_ajax=" + Math.random()+"&id="+id,
        beforeSend: function() {            
            $("#div_grouplist").empty();
            $("#div_grouplist").html("<BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_grouplist").empty();
            $("#div_grouplist").html(data);
            
            $("#txt_groupid").val("");
            $("#txt_groupname").val("");
            
            $("#div_confirmDelete").dialog("close");
        }
    });   
}

function checkEmpCode(){
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmCheckEmpCode",
        data: "is_ajax=" + Math.random()+"&EmpCode="+$("#txt_empCode").val(),
        beforeSend: function() {  
            $("#div_EmpCode").empty();
            $("#div_EmpCode").html(loading_small);            
        },
        success: function(data) {
            $("#div_EmpCode").empty();            
            if(data == "duplicate"){
                $("#div_EmpCode").html("<<< รหัสพนักงานซ้ำ");
                $("#txt_checker_empCode").val("ERROR");
            }else if(data == "OK"){
                $("#txt_checker_empCode").val("");
            }
        }
    });       
}

function checkEmpIdCard(){
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmCheckEmpIdCard",
        data: "is_ajax=" + Math.random()+"&EmpIdCard="+$("#txt_empIDcard").val(),
        beforeSend: function() {  
            $("#div_EmpIdCard").empty();
            $("#div_EmpIdCard").html(loading_small);            
        },
        success: function(data) {
            $("#div_EmpIdCard").empty();            
            if(data == "duplicate"){
                $("#div_EmpIdCard").html("<<< รหัสบัตรประชาชนซ้ำ");
                $("#txt_checker_empIDcard").val("ERROR");
            }else if(data == "OK"){
                $("#txt_checker_empIDcard").val("");
            }
        }
    });   
}

function checkEmpUser(){
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmCheckEmpUser",
        data: "is_ajax=" + Math.random()+"&EmpUser="+$("#txt_user").val(),
        beforeSend: function() {  
            $("#div_EmpUser").empty();
            $("#div_EmpUser").html(loading_small);            
        },
        success: function(data) {
            $("#div_EmpUser").empty();            
            if(data == "duplicate"){
                $("#div_EmpUser").html("<<< Username ถูกใช้ไปแล้ว");
                $("#txt_checker_EmpUser").val("ERROR");
            }else if(data == "OK"){
                $("#txt_checker_EmpUser").val("");
            }
        }
    });   
}

function doAddNewStaff(){
    checkEmpCode();
    checkEmpIdCard();
    checkEmpUser();
    
    if($("#txt_empCode").val() == ""){
        alert("กรุณากรอกรหัสพนักงาน");
        $("#txt_empCode").focus();
        return false;
    }
    
    if($("#txt_empName").val() == ""){
        alert("กรุณากรอกชื่อพนักงาน");
        $("#txt_empName").focus();
        return false;
    }
    
    if($("#txt_empLastname").val() == ""){
        alert("กรุณากรอกนามสกุลพนักงาน");
        $("#txt_empLastname").focus();
        return false;
    }
    
    if($("#txt_empIDcard").val() == ""){
        alert("กรุณากรอกรหัสบัตรประชาชน");
        $("#txt_empIDcard").focus();
        return false;
    }
    
    if($("#txt_Tel").val() == ""){
        alert("กรุณากรอกเบอร์โทรศัพท์");
        $("#txt_Tel").focus();
        return false;
    }
    
    if($("#txt_user").val() == ""){
        alert("กรุณากรอก Username");
        $("#txt_user").focus();
        return false;
    }
    
    if($("#txt_group").val() == "0"){
        alert("กรุณาเลือกกลุ่ม");
        $("#txt_group").focus();
        return false;
    }
    
    if($("#txt_checker_empCode").val() == "ERROR"){
        $("#txt_checker_empCode").focus();
        return false;
    }
    
    if($("#txt_checker_EmpUser").val() == "ERROR"){
        $("#txt_checker_EmpUser").focus();
        return false;
    }
    
    var form_data = $("#form_Staff").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActiocAddNewStaff",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_loading").empty();
            $("#div_loading").html(loading_bar);
        },
        success: function(data) {
            if(data == "TRUE"){
                alert("บันทึกข้อมูลสำเร็จ");
                location.href= httpURL + "staff/frmEditStaff";
            }else{
                alert("บันทึกข้อมูลไม่สำเร็จ ลองทำรายการใหม่");
                $("#div_loading").empty();
            }
        }
    });   
}

function doEditStaff(staff_id){
    $("#div_editStaff").empty();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmEditStaffLoadData",
        data: "is_ajax=" + Math.random()+"&staff_id="+staff_id,
        beforeSend: function() {
            $("#div_editStaff").html("<BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_editStaff").empty();
            $("#div_editStaff").html(data);
            
            $("#div_editStaff").dialog({
                title: "แก้ไขข้อมูล : "+$("#hid_name").val(),
                width:550,
                height:480,
                modal: true,
                buttons: { 
                    "บันทึก":function(){
                        doActionEditStaff("'"+$("#txt_staffID").val()+"'");
                    },
                    " ปิด ": function() {
                        $(this).dialog("close");
                    }
                }
            });
        }
    });   
}

function doActionEditStaff(){
    if($("#txt_empCode").val() != $("#txt_empCode_test").val()){
        checkEmpCode();
    }
    if($("#txt_user_test").val() != $("#txt_user").val()){
        checkEmpUser();
    }
    
    
    if($("#txt_empCode").val() == ""){
        alert("กรุณากรอกรหัสพนักงาน");
        $("#txt_empCode").focus();
        return false;
    }
    
    if($("#txt_empName").val() == ""){
        alert("กรุณากรอกชื่อพนักงาน");
        $("#txt_empName").focus();
        return false;
    }
    
    if($("#txt_empLastname").val() == ""){
        alert("กรุณากรอกนามสกุลพนักงาน");
        $("#txt_empLastname").focus();
        return false;
    }
    
    if($("#txt_empIDcard").val() == ""){
        alert("กรุณากรอกรหัสบัตรประชาชน");
        $("#txt_empIDcard").focus();
        return false;
    }
    
    if($("#txt_Tel").val() == ""){
        alert("กรุณากรอกเบอร์โทรศัพท์");
        $("#txt_Tel").focus();
        return false;
    }
    
    if($("#txt_user").val() == ""){
        alert("กรุณากรอก Username");
        $("#txt_user").focus();
        return false;
    }
    
    if($("#txt_group").val() == "0"){
        alert("กรุณาเลือกกลุ่ม");
        $("#txt_group").focus();
        return false;
    }
    
    if($("#txt_checker_empCode").val() == "ERROR"){
        $("#txt_checker_empCode").focus();
        return false;
    }
    
    if($("#txt_checker_EmpUser").val() == "ERROR"){
        $("#txt_checker_EmpUser").focus();
        return false;
    }
    
    var form_data = $("#form_Staff_Edit").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionEditStaff",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_loading_top").empty();
            $("#div_loading_top").html("<center>"+loading_bar+"</center>");
        },
        success: function(data) {
            if(data == "TRUE"){
                alert("บันทึกข้อมูลสำเร็จ");
                location.href= httpURL + "staff/frmEditStaff";
            }else{
                alert("บันทึกข้อมูลไม่สำเร็จ ลองทำรายการใหม่");
                $("#div_loading_top").empty();
            }
        }
    });   
}

function checkEditEmpCode(){
    if($("#txt_empCode").val() != $("#txt_empCode_test").val()){
        $.ajax({
            type: "POST",
            url: httpURL + "staff/frmCheckEmpCode",
            data: "is_ajax=" + Math.random()+"&EmpCode="+$("#txt_empCode").val(),
            beforeSend: function() {  
                $("#div_EmpCode").empty();
                $("#div_EmpCode").html(loading_small);            
            },
            success: function(data) {
                $("#div_EmpCode").empty();            
                if(data == "duplicate"){
                    $("#div_EmpCode").html("<<< รหัสพนักงานซ้ำ");
                    $("#txt_checker_empCode").val("ERROR");
                }else if(data == "OK"){
                    $("#txt_checker_empCode").val("");
                }
            }
        });  
    }else{
        $("#txt_checker_empCode").val("");
    }   
}

function checkEditEmpUser(){
    if($("#txt_user_test").val() != $("#txt_user").val()){
        $.ajax({
            type: "POST",
            url: httpURL + "staff/frmCheckEmpUser",
            data: "is_ajax=" + Math.random()+"&EmpUser="+$("#txt_user").val(),
            beforeSend: function() {  
                $("#div_EmpUser").empty();
                $("#div_EmpUser").html(loading_small);            
            },
            success: function(data) {
                $("#div_EmpUser").empty();            
                if(data == "duplicate"){
                    $("#div_EmpUser").html("<<< Username ถูกใช้ไปแล้ว");
                    $("#txt_checker_EmpUser").val("ERROR");
                }else if(data == "OK"){
                    $("#txt_checker_EmpUser").val("");
                }
            }
        });   
    }else{
        $("#txt_checker_empCode").val("");
    }    
}

function doDeleteStaff(staffCode){
    $("#div_deleteStaff").dialog({            
        modal: true,
        buttons: { 
            "ยืนยัน":function(){
                doActionDeleteStaff(staffCode);
            },
            " ยกเลิก ": function() {
                $(this).dialog("close");
            }
        }    
    });
}

function doActionDeleteStaff(staffCode){
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionDeleteStaff",
        data: "is_ajax=" + Math.random()+"&staffCode="+staffCode,
        beforeSend: function() {  
            $("#div_loading_delete").empty();
            $("#div_loading_delete").html(loading_bar);            
        },
        success: function(data) {
            $("#div_loading_delete").empty();            
            if(data == "TRUE"){
                alert("ลบข้อมูลสำเร็จ");
                location.href= httpURL + "staff/frmEditStaff";
            }else{
                alert("ไม่สามารถลบข้อมูลพนักงานได้ กรุณาลองใหม่อีกครั้ง");
            }
        }
    });   
}

function doSerachStaff(){
    var form_data = $("#form_Staff").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmSearchStaff",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_showData").empty();
            $("#div_showData").html("<BR><BR><BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_showData").empty();
            $("#div_showData").html(data);
        }
    });   
}

function doChangePageStaff(){
    var form_data = $("#form_Staff").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmChangePageStaff",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {  
            $("#div_dataTable").empty();
            $("#div_dataTable").html("<BR><BR><BR><center>"+loading_2+"</center>");
        },
        success: function(data) {
            $("#div_dataTable").empty();
            $("#div_dataTable").html(data);
        }
    });   
}

function checkOldPassword(){
    if($("#txt_oldPass").val() != ""){
        $.ajax({
            type: "POST",
            url: httpURL + "staff/frmCheckOldPass",
            data: "is_ajax=" + Math.random()+"&oldPass="+$("#txt_oldPass").val(),
            beforeSend: function() {  
                $("#div_checkOldPass").empty();
                $("#div_checkOldPass").html(loading_small);            
            },
            success: function(data) {
                $("#div_checkOldPass").empty();            
                if(data == "TRUE"){
                    $("#txt_check_oldPass").val("");                    
                }else{
                    $("#div_checkOldPass").html("รหัสผ่านปัจจุบันของท่านไม่ถูกต้อง");
                    $("#txt_check_oldPass").val("ERROR");
                }
            }
        });   
    }else{
        $("#div_checkOldPass").val("");
        $("#txt_check_oldPass").val(""); 
    }    
}

function checkConfirmPassword(){
    $("#div_checkConfirmPass").empty();
    $("#div_checkConfirmPass").html(loading_small);   
    if($("#txt_newPass").val() == $("#txt_newPassConfirm").val()){
        $("#div_checkConfirmPass").empty();
        $("#txt_check_confirmPass").val("");
    }else{
        $("#div_checkConfirmPass").html("ยืนยันรหัสผ่านใหม่ไม่ถูกต้อง");
        $("#txt_check_confirmPass").val("ERROR");        
    }
}

function doChangePassword(){
    if($("#txt_oldPass").val() == ""){
        alert("กรุณากรอกรหัสผ่านปัจจุบัน");
        $("#txt_oldPass").focus();
        return false;
    }
    
    if($("#txt_newPass").val() == ""){
        alert("กรุณากรอกรหัสผ่านใหม่");
        $("#txt_newPass").focus();
        return false;
    }
    
    if($("#txt_newPassConfirm").val() == ""){
        alert("กรุณากรอกยืนยันรหัสผ่าน");
        $("#txt_newPassConfirm").focus();
        return false;
    }
    
    checkOldPassword()
    checkConfirmPassword()
    
    if($("#txt_check_oldPass").val() != ""){
        return false;
    }else if($("#txt_check_confirmPass").val() != ""){
        return false;
    }
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmActionChangePasswordStaff",
        data: "is_ajax=" + Math.random()+"&newPass="+$("#txt_newPass").val(),
        beforeSend: function() {  
            $("#div_loading").dialog({
                modal: true,
                draggable:false,
                resizable:false,
                show:"blind",
                disabled: true,
                width:380
            });
        
            $(".ui-dialog-titlebar").attr("style", "display: none;");
        },
        success: function(data) {
            if(data == "TRUE"){
                location.href= httpURL + "";
            }else{
                $("#div_loading").dialog("close");
                alert("ไม่สามารถแก้ไขรหัสผ่านได้ กรุณาลองใหม่อีกครั้ง");
            }            
        }
    });   
}

function doSelectGroup(){
    if($("#txt_group").val() != "0"){
        $.ajax({
            type: "POST",
            url: httpURL + "staff/frmGetMenuList",
            data: "is_ajax=" + Math.random()+"&txt_group="+$("#txt_group").val(),
            beforeSend: function() {  
                $("#div_listmenu").empty();
            },
            success: function(data) {
                $("#div_listmenu").html(data);
            }
        });   
    }else{
        $("#div_listmenu").empty();
    }
}

function doCheckAll(){
    $(".checkbox1").prop('checked', true);
}

function doUnCheckAll(){
    $(".checkbox1").prop('checked', false);
}

function doChangePassUser(empID,user,fullname){
    $("#div_changePass").empty();
    $("#div_changePass").html("<BR><BR><center>"+loading_2+"</center>");
    
    $("#div_changePass").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        width:350,
        height:300
    });
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $.ajax({
        type: "POST",
        url: httpURL + "staff/frmChangePasswordUserAjax",
        data: "is_ajax=" + Math.random()+"&empID="+empID+"&user="+user+"&fullname="+fullname,
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_changePass").empty();
            $("#div_changePass").html(data);
        }
    }); 
}

function doActionChangePassUser(empID){
    if($("#txt_pass").val() == ""){
        alert("กรุณากรอก New Password");
        return false;
    }else{
        $("#div_loading").dialog({
            modal: true,
            draggable:false,
            resizable:false,
            show:"blind",
            disabled: true,
            width:380
        });
        
        $(".ui-dialog-titlebar").attr("style", "display: none;");
        
        $.ajax({
            type: "POST",
            url: httpURL + "staff/frmActionChangePassUser",
            data: "is_ajax=" + Math.random()+"&empID="+empID+"&newpass="+$("#txt_pass").val(),
            beforeSend: function() {  
                        
            },
            success: function(data) {
                location.href= httpURL + "staff/frmChangePasswordUser";
            }
        }); 
    }
}