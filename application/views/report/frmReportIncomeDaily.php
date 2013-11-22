<script>
    $(function(){  
        $("#txt_date").datepicker({dateFormat : 'yy-mm-dd'});
    }); 
</script>
<form id="formData">
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftReport"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>รายงานประจำวัน</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 20px;" class="shadow">
                <div class="font13" style="margin-bottom: 20px;">                    
                    <div style="float: left;margin-top: 0px;margin-left: 0px;">
                        รายงานวันที่ &nbsp;<input type="texte" class="textbox" id="txt_date" name="txt_date" style="width: 100px;" readonly onchange="doGetReportDaily();">
                    </div>
                   <!--<input type="button" value="ค้นหา" class="button_backend1" style="margin-left: -5px;">-->
                    <div style="float: left;font-size: 13px;width: 70px;height: 20px;margin-left: 0px;" class="button-smalldiv" onclick="doGetReportDaily();">แสดง</div>
                    <div style="float: right;margin-right: 18px;">
                    <? echo getResourceImage("xls.png", "class=\"img-cursor\" onclick=\"doExportExcel();\"") ?>
                    &nbsp;&nbsp;
                    <? echo getResourceImage("print-icon99.png", "width=\"35\" height=\"32\" class=\"img-cursor\" onclick=\"doPrintDiv();\" ") ?>
                </div>
                </div>
                <div class="clear" style="height: 30px;"></div>
                <div id="div_showData">
                    
                </div>
            </div>
        </div>
    </div>

    <div id="div_editProduct" style="display: none;"></div>
    <div id="div_deleteProduct" style="display: none;" class="font13" title="ยืนยันการลบ Product ">
        <br><center>กรุณายืนยันการลบ Product</center>
        <div id="div_loading_delete"></div>
    </div>
</form>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>