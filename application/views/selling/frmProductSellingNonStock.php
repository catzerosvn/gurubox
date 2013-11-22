<script>
    $(function(){  
        $("#dateStart").timepicker();
        $("#date_End").timepicker();
    }); 
</script>
<? echo form_open("selling/frmActiocAddProductRoom", "id=\"formAddProductRoom\" ") ?>
<BR>
<table class="font13">
    <tr>
        <td>ระยะเวลา</td>
        <td>
            <select id="txt_hours" name="txt_hours" class="textbox" style="min-width: 100px;">
                <?
                foreach ($priceRate as $val) {
                    echo "<OPTION value=\"$val[row_id]\">$val[time_name] (".number_format($val[product_sale]) ." บาท)</OPTION>";
                }
                ?>                
            </select>
        </td>        
        <td style="padding-left: 30px;"><div class="button-smalldiv" onclick="doActionAddProductRoom();">เพิ่ม</div></td>
    </tr>
    <tr>
        <td>เวลาเริ่ม</td>
        <td>
            <input type="text" class="textbox" style="width: 100px;" readonly id="dateStart" name="dateStart">
        </td>        
        <td style="padding-left: 30px;"></td>
    </tr>
    <tr>
        <td>เวลาสิ้นสุด</td>
        <td>
            <input type="text" class="textbox" style="width: 100px;" readonly id="date_End" name="dateEnd">
        </td>        
        <td style="padding-left: 30px;"></td>
    </tr>
</table>
<input type="hidden" value="<? echo $data[0]['product_code']; ?>" id="txt_product_code" name="txt_product_code">
<? echo form_close(); ?>