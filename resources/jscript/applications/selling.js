

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

function doAddProduct(){    
    doShowAllProduct();    
    
    $("#div_addProduct").dialog({
        modal: true,
        title: "เพิ่มสินค้าที่จะทำรายการขาย",
        width:600,
        height:$(window).height()-30
    });
}

function doSearchProduct(){
    $("#div_productList").empty();
    $("#div_productList").html("<BR><center>"+loading_2+"</center>");   
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmSearchProduct",
        data: "is_ajax=" + Math.random()+"&txt_key="+$("#txt_key").val(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_productList").empty();
            $("#div_productList").html(data);   
        }
    });       
}

function doShowAllProduct(){
    $("#div_productList").empty();
    $("#div_productList").html("<BR><center>"+loading_2+"</center>");   
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmSearchProduct",
        data: "is_ajax=" + Math.random(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_productList").empty();
            $("#div_productList").html(data);               
        }
    });       
}

function doAddProductStock(product_code,product_name){
    $("#div_stockAdd").empty();
    $("#div_stockAdd").html("<center>"+loading_2+"</center>"); 
    $("#div_stockAdd").dialog({
        modal: true,
        title: "เพิ่มสินค้าที่จะทำรายการขาย",
        width:300,
        height:150,
        title:product_name
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmProductSellingQty",
        data: "is_ajax=" + Math.random()+"&product_code="+product_code,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_stockAdd").empty();
            $("#div_stockAdd").html(data);
        }
    });       
}

function doActionAddProduct(){
    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
    var str = $('#txt_qty').val();
    if(!numberRegex.test(str)) {
        alert('กรุณากรอกตัวเลขเท่านั้น');
        return false;
    }
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmCheckStock",
        data: "is_ajax=" + Math.random()+"&txt_product_code="+$("#txt_product_code").val()+"&saleQty="+$("#txt_qty").val(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            if(data == "TRUE"){
                $("#div_loading_centerpage").dialog({
                    modal: true,
                    draggable:false,
                    resizable:false,
                    show:"fade",
                    disabled: true,
                    width:380
                });        
                $(".ui-dialog-titlebar").attr("style", "display: none;");
    
                $("#formAddProduct").submit();
            }else{
                alert(data);
                return false;
            }
        }
    });   
}

function doReturnMoney(){
    $("#txt_return").val($("#txt_money").val() - $("#txt_totalAll").val());
}

function doAddProductNonStock(product_code,product_name){
    $("#div_stockAdd").empty();
    $("#div_stockAdd").html("<center>"+loading_2+"</center>"); 
    $("#div_stockAdd").dialog({
        modal: true,
        title: "เพิ่มสินค้าที่จะทำรายการขาย",
        width:350,
        height:200,
        title:product_name
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmProductSellingNonStock",
        data: "is_ajax=" + Math.random()+"&product_code="+product_code,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_stockAdd").empty();
            $("#div_stockAdd").html(data);
        }
    });       
}

function doActionAddProductRoom(){
    if($("#dateStart").val() == ""){
        alert("กรุณากำหนดเวลาเริ่ม");
        return false;
    }
    if($("#dateEnd").val() == ""){
        alert("กรุณากำหนดเวลาสิ้นสุด");
        return false;
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
    
    $("#formAddProductRoom").submit();
}

function doAddProductMember(product_code,product_name){
    $("#div_stockAdd").empty();
    $("#div_stockAdd").html("<center>"+loading_2+"</center>"); 
    $("#div_stockAdd").dialog({
        modal: true,
        width:600,
        height:600,
        title:product_name        
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmProductSellingMember",
        data: "is_ajax=" + Math.random()+"&product_code="+product_code,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_stockAdd").empty();
            $("#div_stockAdd").html(data);
        }
    });    
}

function doSaveSelling(){
    var dataCheckCart;
    
    if($("#txt_memberNameSelling").val() == ""){
        alert("กรุณาเลือก Member ที่ทำรายการซื้อสินค้า");
        return false;
    }
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/checkProductInCart",
        data: "is_ajax=" + Math.random(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            if(data == "TRUE"){
                $("#div_loading_centerpage").dialog({
                    modal: true,
                    draggable:false,
                    resizable:false,
                    show:"fade",
                    width:380
                });        
                $(".ui-dialog-titlebar").attr("style", "display: none;");
    
                $.ajax({
                    type: "POST",
                    url: httpURL + "selling/frmSaveSelling",
                    data: "is_ajax=" + Math.random(),
                    beforeSend: function() {  
            
                    },
                    success: function(data) {
                        $("#div_showBill").empty();
                        
                        $("#div_showBill").dialog({
                            modal: true,
                            draggable:false,
                            resizable:false,
                            show:"fade",
                            closeOnEscape: false,
                            width:850,
                            height:$(window).height()-20,
                            close: function() {
                                location.href= httpURL + "selling/frmSellingProduct";
                            }
                        });        
                        
                        $("#div_showBill").html(data);
                        $("#div_loading_centerpage").dialog("close");
                    }
                });  
            }else{
                alert("กรุณาเพิ่มสินค้าที่ต้องการทำรายการซื้อ");
                return false;
            }
        }
    });   
}

function doPrintBill(){
    var printContents = document.getElementById("print_area").innerHTML;
                
    var printWin = window.open();
    printWin.document.open();
    printWin.document.write(printContents);
    printWin.document.close();
    printWin.print();         
    printWin.close();
}

function checkOtherCareer(){
    if($("#txt_career").val() == "OTHER"){
        $("#div_addCareer").show();
    }else{
        $("#div_addCareer").hide();
    }
}

function doProductMember(){
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
    if($("#dateStart").val() == ""){
        alert("กรุณากำหนดวันเริ่มต้น Member");
        $("#dateStart").focus();
        return false;
    }
    if($("#dateEnd").val() == ""){
        alert("กรุณากำหนดวันสิ้นสุด Member");
        $("#dateEnd").focus();
        return false;
    }
    
    
    if($("[name=\"txt_locker\"]:checked").val() == "FREE"){
        if($("#txt_lockerSelectFree").val() == ""){
            alert("กรุณาเลือก Locker");
            $("#txt_lockerSelectFree").focus();
            return false;
        }
    }
    if($("[name=\"txt_locker\"]:checked").val() == "SALE"){
        if($("#txt_lockerSelectSale").val() == ""){
            alert("กรุณาเลือก Locker");
            $("#txt_lockerSelectSale").focus();
            return false;
        }
        if($("#txt_locker_price").val() == ""){
            alert("กรุณากรอกราคา Locker");
            $("#txt_locker_price").focus();
            return false;
        }
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
    
    $("#formAddProductMember").submit();
}

function doSelectLocker(type){    
    if(type == "NO"){
        $("#div_lockerFree").hide();
        $("#div_lockerSale").hide();
        $("#div_locekerPrice").hide();
    } else if(type == "FREE"){
        $("#div_lockerSale").hide();
        $("#div_lockerFree").show();
        $("#div_locekerPrice").hide();
    } else if(type == "SALE"){
        $("#div_lockerFree").hide();
        $("#div_lockerSale").show();
        $("#div_locekerPrice").show();
    }
}

function doResetSellingMember(){
    $("#div_lockerFree").hide();
    $("#div_lockerSale").hide();
}

function doSelectLokerNumber(){
    $("#div_locker").empty();  
    $("#div_locker").html("<BR><BR><BR><center>"+loading_2+"</center>"); 
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmGetLocker",
        data: "is_ajax=" + Math.random(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_locker").empty();  
            $("#div_locker").html(data);
        }
    });    
    
    $("#div_locker").dialog({
        width:500,
        height:500        
    });
}

function doActionSelectLocker(product_code){
    if($("[name=\"txt_locker\"]:checked").val() == "FREE"){
        $("#txt_lockerSelectFree").val(product_code);
        $("#div_locker").dialog("close");
    }
    if($("[name=\"txt_locker\"]:checked").val() == "SALE"){
        $("#txt_lockerSelectSale").val(product_code);
        $("#div_locker").dialog("close");
    }    
}

function doAddReserver(product_code,product_name){
    $("#div_stockAdd").empty();
    $("#div_stockAdd").html("<center>"+loading_2+"</center>"); 
    $("#div_stockAdd").dialog({
        modal: true,
        title: "",
        width:350,
        height:200,
        title:product_name
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmProductSellingReserve",
        data: "is_ajax=" + Math.random()+"&product_code="+product_code,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_stockAdd").empty();
            $("#div_stockAdd").html(data);
        }
    });       
}

function doActionAddProductReserve(){
    if($("#dateStart").val() == ""){
        alert("กรุณากำหนดเวลาเริ่ม");
        return false;
    }
    if($("#dateEnd").val() == ""){
        alert("กรุณากำหนดเวลาสิ้นสุด");
        return false;
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
    
    $("#formAddProductReserve").submit();
}

function doReserveRoom(day,month,year){
    $("#div_reserveRoom").empty();
    $("#div_reserveRoom").html("<BR><BR><BR><center>"+loading_2+"</center>");
    $("#div_reserveRoom").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",        
        width:700,
        height: $(window).height()-20
    });   
    
    var room = $("#txt_selectOnlyRoom").val();
            
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmReserveRoomData",
        data: "is_ajax=" + Math.random()+"&day="+day+"&month="+month+"&year="+year+"&room="+room,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_reserveRoom").empty();
            $("#div_reserveRoom").html(data);
        }
    });            
}

function doActionReserveRoom(){
    if($("#txt_room").val() == "0"){
        alert("กรุณาเลือกห้อง");
        return false;
    }
    if($("#txt_pricerate").val() == "0"){
        alert("กรุณาเลือกระยะเวลา");
        return false;
    }
    if($("#dateStart").val() == ""){
        alert("กรุณาเลือกเวลาเริ่ม");
        return false;
    }
    if($("#dateEnd").val() == ""){
        alert("กรุณาเลือกเวลาสิ้นสุด");
        return false;
    }
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/checkRoom",
        data: "is_ajax=" + Math.random()+"&"+$("#formReserveRoom").serialize(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            if(data == "TRUE"){
                $("#div_loading_centerpage").dialog({
                    modal: true,
                    draggable:false,
                    resizable:false,
                    show:"fade",
                    disabled: true,
                    width:380
                });        
                $(".ui-dialog-titlebar").attr("style", "display: none;");
                
                $("#formReserveRoom").submit();
            }else{
                alert("ไม่สามารถจองห้องได้");
            }
        }
    });   
}

function doGetPriceRate(){    
    $("#div_pricerate").empty();
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmGetPriceRate",
        data: "is_ajax=" + Math.random()+"&product_code="+$("#txt_room").val(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_pricerate").html(data);
        }
    });   
}

function doSellingRoom(services_id){
    $("#div_loading_centerpage").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        width:380
    });        
    $(".ui-dialog-titlebar").attr("style", "display: none;");
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmSellingRoom",
        data: "is_ajax=" + Math.random()+"&services_id="+services_id,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_showBill").empty();
                        
            $("#div_showBill").dialog({
                modal: true,
                draggable:false,
                resizable:false,
                show:"fade",
                closeOnEscape: false,
                width:850,
                height:$(window).height()-20,
                close: function() {
                    location.href= httpURL + "selling/frmReserveRoom";
                }
            });        
                        
            $("#div_showBill").html(data);
            $("#div_loading_centerpage").dialog("close");
        }
    });   
}

function doCancleRoom(services_id){
    $("#div_cancleReserve").dialog({
        modal: true,
        buttons: { 
            "        ยืนยัน        ":function(){
                $.ajax({
                    type: "POST",
                    url: httpURL + "selling/frmActionCancleReserveRoom",
                    data: "is_ajax=" + Math.random()+"&services_id="+services_id,
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
                        location.href= httpURL + "selling/frmReserveRoom";
                    }
                });                   
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doViewBill(billing_code){
    $("#div_showBill").empty();
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmShowBillDetail",
        data: "is_ajax=" + Math.random()+"&billing_code="+billing_code,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_showBill").empty();
                        
            $("#div_showBill").dialog({
                modal: true,
                draggable:false,
                resizable:false,
                show:"fade",
                closeOnEscape: false,
                width:850,
                height:$(window).height()-20
            });        
                        
            $("#div_showBill").html(data);
        }
    });   
}

function doCancleBill(billing_code){
    $("#div_cancleBill").dialog({
        modal: true,
        title: billing_code,
        buttons: { 
            "        ยืนยัน        ":function(){
                $.ajax({
                    type: "POST",
                    url: httpURL + "selling/frmActionCancleBill",
                    data: "is_ajax=" + Math.random()+"&billing_code="+billing_code,
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
                        location.href= httpURL + "selling/frmCancleSelling";
                    }
                });                   
            },
            "   ยกเลิก   ": function() {
                $(this).dialog("close");
            }
        }
    });
}

function doSelectMember(){
    $("#div_selectMember").empty();
    $("#div_selectMember").html("<BR><BR><BR><center>"+loading_2+"</center>");
    $("#div_selectMember").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        closeOnEscape: false,
        width:600,
        height:$(window).height()-60
    });   
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmSelectMember",
        data: "is_ajax=" + Math.random(),
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_selectMember").html(data);
        }
    }); 
}

function doSearchMember(){
    $("#div_searchMember").empty();
    $("#div_searchMember").html("<BR><BR><BR><center>"+loading_2+"</center>");
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmSearchMember",
        data: "is_ajax=" + Math.random()+"&"+$("#formSearchMember").serialize(),
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_searchMember").html(data);
        }
    }); 
}

function doActionSelectMember(member_id,member_name){
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmActionSelectMember",
        data: "is_ajax=" + Math.random()+"&member_id="+member_id+"&member_name="+member_name,
        beforeSend: function() {  
                        
        },
        success: function(data) {
            location.href= httpURL + "selling/frmListProductInCart";
        }
    }); 
    
//    $("#txt_member_id_select").val(member_id);
//    $("#txt_memberNameSelling").val(member_name);
//    
//    $("#div_selectMember").dialog("close");
}

function doSearchBill(){
    $("#div_billdata").empty();
    $("#div_billdata").html("<BR><BR><center>"+loading_2+"</center>");
    
    $.ajax({
        type: "POST",
        url: httpURL + "selling/frmGetBill",
        data: "is_ajax=" + Math.random()+"&"+$("#formData").serialize(),
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_billdata").html(data);
        }
    }); 
}

