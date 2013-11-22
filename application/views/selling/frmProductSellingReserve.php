<script>
    $(function(){  
        $("#dateStart").timepicker();
        $("#date_End").timepicker();
    }); 
</script>
<? echo form_open("selling/frmActiocAddProductReserve", "id=\"formAddProductReserve\" ") ?>
<BR>
<table class="font13">    
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
    <tr>
        <td height="10"></td>
    </tr>
    <tr>
        <td></td>
        <td><div class="button-smalldiv" onclick="doActionAddProductReserve();">เพิ่ม</div></td>        
        <td style="padding-left: 30px;"></td>
    </tr>
</table>
<input type="hidden" value="<? echo $product_code; ?>" id="txt_product_code" name="txt_product_code">
<? echo form_close(); ?>