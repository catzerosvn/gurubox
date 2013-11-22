


function doAddNewProduct(){
    if($("#txt_productType").val() == "0"){
        alert("กรุณาเลือกประเภท Product");
        $("#txt_productType").focus();
        return false;
    }    
    if($("#txt_productName").val() == ""){
        alert("กรุณากรอกชื่อ Product");
        $("#txt_productName").focus();
        return false;
    }
    
    if($("#txt_productType").val() != "1"){
        if($("#txt_cost").val() == ""){
            alert("กรุณากรอกราคาทุน");
            $("#txt_cost").focus();
            return false;
        }
        if($("#txt_sale").val() == ""){
            alert("กรุณากรอกราคาทุน");
            $("#txt_sale").focus();
            return false;
        }
    }
    
    if($("#txt_productType").val() == "3"){
        if($("#txt_numday").val() == ""){
            alert("กรุณากรอกระยะเวลา");
            $("#txt_numday").focus();
            return false;
        }
    }
    
    
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        disabled: true,
        width:380
    });        
    $(".ui-dialog-titlebar").attr("style", "display: none;");    
    
    $("#formData").submit();
}

function doEditProduct(product_id){    
    $("#div_editProduct").empty();
    $("#div_editProduct").html(loading_small);
    
    $("#div_editProduct").dialog({
        width:500,
        height:410,
        modal: true,
        buttons: { 
            "   บันทึก   ":function(){
                doActionEditProduct("'"+$("#txt_productID").val()+"'");
            },
            "   ยกเลิก    ": function() {
                $(this).dialog("close");
            }
        }
    });   
    
    $.ajax({
        type: "POST",
        url: httpURL + "product/frmGetDataProduct",
        data: "is_ajax=" + Math.random()+"&product_id="+product_id,
        beforeSend: function() {  
                    
        },
        success: function(data) {
            $("#div_editProduct").html(data);
            
            $("#div_editProduct").dialog({
                title: "แก้ไขข้อมูล : "+$("#hid_name").val()
            });
        }
    });   
}

function doActionEditProduct(product_id){
    $("#div_editProduct").dialog("close");
    
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        disabled: true,
        width:380
    });        
    $(".ui-dialog-titlebar").attr("style", "display: none;");    
    
    $.ajax({
        type: "POST",
        url: httpURL + "product/frmActionEditProduct",
        data: "is_ajax=" + Math.random()+"&"+$("#form_product_Edit").serialize(),
        beforeSend: function() {  
                    
        },
        success: function(data) {
            location.href= httpURL + "product/frmEditProduct";
        }
    });   
}

function doSerachProduct(){
    $("#div_dataTable").empty();
    $("#div_dataTable").html("<BR><center>"+loading_2+"</center>");   
    
    var form_data = $("#formData").serialize();
    
    $.ajax({
        type: "POST",
        url: httpURL + "product/frmSearchProduct",
        data: "is_ajax=" + Math.random()+"&"+form_data,
        beforeSend: function() {
            
        },
        success: function(data) {
            $("#div_dataTable").empty();
            $("#div_dataTable").html(data);
        }
    });   
}

function doDeleteProduct(product_id){
    $("#div_deleteProduct").dialog({
        modal: true,
        buttons: { 
            "   ยืนยัน   ":function(){
                doActionDeleteProduct(product_id);
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doActionDeleteProduct(product_id){
    $("#div_deleteProduct").dialog("close");
    
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        disabled: true,
        width:380
    });        
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $.ajax({
        type: "POST",
        url: httpURL + "product/frmActionDeleteProduct",
        data: "is_ajax=" + Math.random()+"&product_id="+product_id,
        beforeSend: function() {  
            
        },
        success: function(data) {
            location.href= httpURL + "product/frmEditProduct";
        }
    });   
}

function doImportProduct(){
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        disabled: true,
        width:380
    });        
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $("#formData").submit(); 
}

function doShowDetailImportProduct(import_id){
    $("#div_showImportProduct").empty();
    $("#div_showImportProduct").html("<BR><center>"+loading_2+"</center>");
    
    $("#div_showImportProduct").dialog({
        modal: true,
        width:500,
        height:400,       
        buttons: { 
            "        ลบ        ":function(){
                doActionDeleteImportProduct(import_id);
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "product/frmLoadDataImportProduct",
        data: "is_ajax=" + Math.random()+"&import_id="+import_id,
        beforeSend: function() {
            
        },
        success: function(data) {
            $("#div_showImportProduct").empty();
            $("#div_showImportProduct").html(data);
        }
    });   
}

function doActionDeleteImportProduct(import_id){
    $("#div_deleteImportProduct").dialog({
        modal: true,
        buttons: { 
            "        ยืนยัน        ":function(){
                $.ajax({
                    type: "POST",
                    url: httpURL + "product/frmActionCancleImportProduct",
                    data: "is_ajax=" + Math.random()+"&import_id="+import_id,
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
                    },
                    success: function(data) {
                        location.href= httpURL + "product/frmCancleImportProduct";
                    }
                });                   
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doSelectTypeProduct(){
    if($("#txt_productType").val() == 1){
        $("#div_priceRoom").show();
        $("#div_cost_tr").hide();
        $("#div_sale_tr").hide();        
    }else{
        $("#div_priceRoom").hide();
        $("#div_cost_tr").show();
        $("#div_sale_tr").show();
    }
    
    if($("#txt_productType").val() == 3){
        $("#div_numday").show();
    }else{
        $("#div_numday").hide();
    }
    
}