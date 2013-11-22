<? echo form_open("product/frmActionImportProduct","id=\"formData\" ");?>
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftProduct"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มข้อมูล Staff ใหม่</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 20px;" class="shadow">

                <div id="div_showData">
                    <?
                    if (count($data) <= 0) {
                        ?>
                        <div style="min-height: 70px;margin-top: 100px;" class="font13"><center>ไม่มีข้อมูล Product</center></div>
                        <?
                    } else {
                        ?>
                        <div style="height: 20px;"></div>
                        <div id="div_dataTable">
                            <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                                <tr class="tb-header" style="text-align: center;">
                                    <td width="80">Product Code</td>
                                    <td width="250">ชื่อ Product</td>
                                    <td width="100">ประเภท Product</td>
                                    <td width="80">สินค้าคงเหลือ</td>
                                    <td colspan="">เพิ่มจำนวน</td>
                                </tr>
                                <?
                                foreach ($data as $val) {
                                    echo "<tr class=\"tb-hover\">";
                                    echo "<td align=\"\">$val[product_code]</td>";
                                    echo "<td align=\"\">$val[product_name]</td>";
                                    echo "<td align=\"\">$val[product_type]</td>";
                                    if ($val['product_quantity'] == "") {
                                        $qty = 0;
                                    } else {
                                        $qty = $val['product_quantity'];
                                    }
                                    echo "<td align=\"center\">$qty</td>";
                                    echo "<td align=\"center\" width=\"100\"><input type=\"text\" style=\"width: 50px;text-align: right;\" id=\"txt_$val[product_code]\" name=\"$val[product_code]\" value=\"0\" class=\"textbox\"></td>";
                                    echo "</tr>";
                                }
                                ?>
                                <tr class="tb-hover">
                                    <td valign="bottom" colspan="5" align="right"  style="padding-right: 20px;">
                                         <BR>
                                        <input type="button" value="เพิ่มข้อมูล" class="button_backend1" onclick="doImportProduct();">
                                        &nbsp;
                                        <input type="reset" value="ล้างข้อมูล" class="button_backend1">                    
                                        <BR><BR>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="div_editProduct" style="display: none;"></div>
    <div id="div_deleteProduct" style="display: none;" class="font13" title="ยืนยันการลบ Product ">
        <br><center>กรุณายืนยันการลบ Product</center>
        <div id="div_loading_delete"></div>
    </div>
<? echo form_close();?>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>