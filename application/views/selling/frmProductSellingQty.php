<? echo form_open("selling/frmActiocAddProduct","id=\"formAddProduct\" ")?>
<BR>
<table class="font13">
    <tr>
        <td>จำนวน</td>
        <td><input class="textbox" style="width: 150px;" id="txt_qty" name="txt_qty"></td>
        <td><div class="button-smalldiv" onclick="doActionAddProduct();">เพิ่ม</div></td>
    </tr>
</table>
<input type="hidden" value="<? echo $data[0]['product_code'];?>" id="txt_product_code" name="txt_product_code">
<? echo form_close(); ?>