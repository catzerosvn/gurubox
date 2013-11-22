


function doGetReportDaily(){
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
            
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmGetReportIncomeDaily",
        data: "is_ajax=" + Math.random()+"&txt_date="+$("#txt_date").val(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_showData").html(data);
            $("#div_loading_centerpage").dialog("close");
        }
    });            
}

function doGetReportMonth(){
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
            
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmGetReportIncomeMonth",
        data: "is_ajax=" + Math.random()+"&"+$("#formData").serialize(),
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_showData").html(data);
            $("#div_loading_centerpage").dialog("close");
        }
    });  
}

function doPrintDiv(){
    var printContents = document.getElementById("div_print").innerHTML;
                
    var printWin = window.open();
    printWin.document.open();
    printWin.document.write(printContents);
    printWin.document.close();
    printWin.print();         
    printWin.close();
}

function doExportExcel(){
    $("#txt_data2xls").val("");
    $("#txt_data2xls").val($("#div_print").html());
    
    if($("#txt_data2xls").val() == ""){
        $("#txt_data2xls").val($("#div_print").html());
    }
    
    $("#formExportXls").submit();
}

function doViewReportMonthProduct(product_code,price){
    $("#div_dataproduct").empty();
    $("#div_dataproduct").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        width:790,
        height:$(window).height()-100
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmGetReportIncomeMonthViewProduct",
        data: "is_ajax=" + Math.random()+"&product_code="+product_code+"&txt_month="+$("#txt_month").val()+"&txt_year="+$("#txt_year").val()+"&price="+price,
        beforeSend: function() {  
            
        },
        success: function(data) {
            $("#div_dataproduct").html(data);
            
        }
    });  
}

function doReportSalespeople(){
    $("#div_report").empty();
    $("#div_report").html("<BR><BR><center>"+loading_2+"</center>");
    
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmActionSalesPeople",
        data: "is_ajax=" + Math.random()+"&"+$("#formData").serialize(),
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_report").html(data);
        }
    }); 
}

function doReportSalespeopleDetail(empID){
    $("#div_showDetailEmp").empty();
    $("#div_showDetailEmp").html("<BR><BR><center>"+loading_2+"</center>");
    
    $("#div_showDetailEmp").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        width:750,
        height:$(window).height()-100
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmActionSalesPeopleDetail",
        data: "is_ajax=" + Math.random()+"&empID="+empID+"&"+$("#formData").serialize(),
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_showDetailEmp").empty();
            $("#div_showDetailEmp").html(data);
        }
    }); 
}

function doReportSalespeopleDetailSub(billCode){
    $("#div_showDetailEmpSub").empty();
    $("#div_showDetailEmpSub").html("<BR><BR><center>"+loading_2+"</center>");
    
    $("#div_showDetailEmpSub").dialog({
        modal: true,
        draggable:false,
        resizable:false,
        show:"fade",
        width:600,
        height:$(window).height()-100
    });
    
    $.ajax({
        type: "POST",
        url: httpURL + "report/frmActionSalesPeopleDetailSub",
        data: "is_ajax=" + Math.random()+"&billCode="+billCode,
        beforeSend: function() {  
                        
        },
        success: function(data) {
            $("#div_showDetailEmpSub").empty();
            $("#div_showDetailEmpSub").html(data);
        }
    }); 
}