<script>
    $(function(){  
        $("#dateStart").timepicker();
        $("#dateEnd").timepicker();
    }); 
</script>
<style>
    tr.tb-reserveroom td{
        background-color: #EEE;
        height: 35px;
        vertical-align: middle;
        cursor: default;
    }
    tr.tb-header td{
        background-color: #888;
        text-align: center;
        vertical-align: middle;
        height: 40px;
        cursor: default;
    }
    
    .tb-noneclass{
        vertical-align: middle;
        height: 40px;
        cursor: default;
        background-color: #FFF;
        min-width: 100px;
    }
   .tb-noneclass:hover{
        background-color: #FFF;
    }
</style>
<? echo form_open("selling/frmActiocReserveRoom", "id=\"formReserveRoom\" ") ?>
<center><div>จองห้อง</div></center>
<input type="hidden" id="txt_day" name="txt_day" value="<?=$day;?>" style="display: none;">
<input type="hidden" id="txt_month" name="txt_month" value="<?=$month;?>" style="display: none;">
<input type="hidden" id="txt_year" name="txt_year" value="<?=$year?>" style="display: none;">
<div style="margin-top: 20px;vertical-align: middle;" class="font13">
    <div class="grid_17" style="margin-top: 0px;">
        <div class="grid_5" style="margin-right: 37px;">ห้อง</div>
        <div class="grid_2" style="color: red;">*</div>
        <div class="grid_10">
            <select name="txt_room" id="txt_room" class="textbox" onchange="doGetPriceRate();">
                <option value="0">กรุณาเลือกห้อง</option>
                <?
                    foreach ($room as $valroom){
                        echo "<option value=\"$valroom[product_code]\">$valroom[product_name]</option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_17" style="margin-top: 10px;">
        <div class="grid_5" style="margin-right: 9px;">ระยะเวลา</div>
        <div class="grid_2" style="color: red;">*</div>
        <div class="grid_10" id="div_pricerate">
            <select class="textbox" id="txt_pricerate" name="txt_pricerate">
                <option value="0">กรุณาเลือกระยะเวลา</option>
            </select>
        </div>
    </div>
    <div class="clear"></div>
    <div class="grid_17" style="margin-top: 10px;">
        <div class="grid_5" style="margin-right: 17px;">เวลาเริ่ม</div>
        <div class="grid_2" style="color: red;">*</div>
        <div class="grid_10"><input type="text" class="textbox" id="dateStart" name="dateStart"></div>
    </div>
    <div class="clear"></div>
    <div class="grid_17" style="margin-top: 10px;">
        <div class="grid_5">เวลาสิ้นสุด</div>
        <div class="grid_2" style="color: red;">*</div>
        <div class="grid_10"><input type="text" class="textbox"id="dateEnd" name="dateEnd"></div>
    </div>
    <div class="clear"></div>
    <div class="grid_17" style="margin-top: 10px;">
        <div class="grid_5" style="margin-right: 14px;">ชื่อผู้จอง</div>
        <div class="grid_2" style="color: red;">&nbsp;</div>
        <div class="grid_10"><input type="text" class="textbox"id="txt_name" name="txt_name"></div>
    </div>
    <div class="clear"></div>
    <div class="grid_17" style="margin-top: 10px;margin-bottom: 20px;margin-left: 76px;">
        <div><input type="button" class="button_backend1" value="จองห้อง" onclick="doActionReserveRoom();"></div>
    </div>
</div>
<div class="clear"></div>
<? echo form_close(); ?>
<?
if (count($data) > 0) {
    echo "<center><div style=\"margin-top: 20px;margin-bottom: 10px;\">ตารางรายละเอียดการใช้ห้องพัก</div></center>";
    echo "<div style=\"margin-top: 10px;\"></div>";
    echo "
        <table width=\"650\"  cellpadding=\"3\" cellspacing=\"1\" class=\"font13\" style=\"background-color:#FFF;\">
        <tr class=\"tb-header\">
        <td>รหัสสินค้า</td>
        <td>ชื่อ Product</td>
        <td>เวลาเริ่ม</td>
        <td>เวลาสิ้นสุด</td>
        <td>สถานะ</td>  
        <td>Customer</td>
        <td colspan=\"2\">คำสั่ง</td>
        </tr>
    ";
    foreach ($data as $val) {
        if($val['is_room_rent'] == "Y"){
            $status = "เช่า";
        }  else {
            $status = "จอง";
        }
        
        if($val['is_selling'] == "Y" or $val['is_room_rent'] == "Y"){
            $buttonSelling = "<font color=\"red\">ชำระเงินแล้ว</font>";
            $buttonCancle = "<font color=\"red\">-</font>";
        }else{
            $buttonSelling = "<div class=\"button-smalldiv\" onclick=\"doSellingRoom($val[services_id]);\">ชำระเงิน</div>";
            $buttonCancle = "<div class=\"button-smalldiv\" onclick=\"doCancleRoom($val[services_id]);\">ยกเลิก</div>";
        }
        
        echo "
        <tr class=\"tb-reserveroom\">
        <td align=\"center\">$val[ref_product_code]</td>
        <td>$val[product_name]</td>
        <td align=\"center\">".  substr($val['datetime_start'], 11,5)."</td>
        <td align=\"center\">".  substr($val['datetime_end'], 11,5)."</td>
        <td align=\"center\">$status</td>   
        <td>$val[reserve_name]</td>
            <td align=\"center\">$buttonCancle</td>
                <td align=\"center\">$buttonSelling</td>
        </tr>
        ";
    }
    echo "</table>";
}
?>
<div id="div_showBill" style="display: none;"></div>