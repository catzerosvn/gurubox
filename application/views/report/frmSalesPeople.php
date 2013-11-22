<script>
    $(function(){  
        $("#txt_dateStart").datepicker({dateFormat : 'yy-mm-dd'});
        $("#txt_dateEnd").datepicker({dateFormat : 'yy-mm-dd'});
    }); 
</script>
<? echo form_open("", "id=\"formData\" "); ?>
<div class="container_29 font13" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftReport"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>พิมพ์ใบเสร็จรับเงินย้อนหลัง</b></u></div>
        <div style="margin-top: 10px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 20px 10px 20px;min-height: 170px;" class="grid_21 shadow">
            <div style="float:left">
                ช่วงวันที่ &nbsp;
                <input type="text" class="textbox" id="txt_dateStart" name="txt_dateStart" style="width: 80px;" value="<?= date("Y-m-d") ?>">
                &nbsp; ถึง &nbsp;
                <input type="text" class="textbox" id="txt_dateEnd" name="txt_dateEnd" style="width: 80px;" value="<?= date("Y-m-d") ?>">
                &nbsp; พนักงาน &nbsp;
                <select class="textbox" id="txt_employee" name="txt_employee">
                    <option value="0">เลือกพนักงานทั้งหมด</option>
                    <?
                    foreach ($employee as $val) {
                        echo "<option value=\"$val[employee_code]\">$val[firstname]  $val[lastname]</option>";
                    }
                    ?>
                </select>
                &nbsp;<div class="button_backend1" style="cursor: pointer;" onclick="doReportSalespeople();">ค้นหา</div>
            </div>
            <div style="float: right;margin-right: 18px;">
                <? echo getResourceImage("xls.png", "class=\"img-cursor\" onclick=\"doExportExcel();\"") ?>
                &nbsp;&nbsp;
                <? echo getResourceImage("print-icon99.png", "width=\"35\" height=\"32\" class=\"img-cursor\" onclick=\"doPrintDiv();\" ") ?>
            </div>
            <div class="clear"></div>
            <BR>
            <div id="div_report">

            </div>
        </div>
    </div>
</div>
<? echo form_close(); ?>

<div style="display: none;" id="div_showDetailEmp"></div>
<div style="display: none;" id="div_showDetailEmpSub"></div>
<div style="display: none;" id="div_cancleBill" class="font13"><center>ยกเลิกการขายบิลนี้</center></div>
<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
