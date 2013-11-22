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
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>รายงานประจำเดือน</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 20px;" class="shadow">
                <div class="font13" style="margin-bottom: 20px;">                    
                    <div style="float: left;margin-top: 0px;margin-left: 0px;">
                        รายงานเดือน &nbsp;
                        <select id="txt_month" name="txt_month" class="textbox">
                            <option value="01">มกราคม</option>
                            <option value="02">กุมภาพันธ์</option>
                            <option value="03">มีนาคม</option>
                            <option value="04">เมษายน</option>
                            <option value="05">พฤษภาคม</option>
                            <option value="06">มิถุนายน</option>
                            <option value="07">กรกฎาคม</option>
                            <option value="08">สิงหาคม</option>
                            <option value="09">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>     
                         &nbsp; &nbsp;ปี &nbsp;
                         <select id="txt_year" name="txt_year" class="textbox">
                            <?
                            for($i=date("Y")-20;$i<=date("Y");$i++){
                                echo "<option value=\"$i\" selected>$i</option>";
                            }
                            ?>
                        </select>     
                         &nbsp;&nbsp;
                    </div>
                   <!--<input type="button" value="ค้นหา" class="button_backend1" style="margin-left: -5px;">-->
                    <div style="float: left;font-size: 13px;width: 70px;height: 20px;margin-left: 0px;" class="button-smalldiv" onclick="doGetReportMonth();">แสดง</div>
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