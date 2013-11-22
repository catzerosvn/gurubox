<style>
    .table-print
    {  
        border-collapse:collapse; 
    }
    .table-print td
    { 
        border:1px solid black;
    }

    .tb-header2 td{
        background-color: #524C52;
        color: #FFF;
        height: 30px;
        text-align: center;
        font-weight: bold;
    }
</style>
<? echo form_open("members/frmActionEditProduct", "enctype=\"multipart/form-data\" id=\"form_product_Edit\" "); ?>
<?
if ($type == 1) {
    $display = "style=\"display: none;\"";
} else {
    $display = "";
}

$displayNumday = "style=\"display: none;\"";
if ($type == 3) {
    $displayNumday = "";
}
?>
<BR>
<table width="400" class="font13">        
    <tr>
        <td width="120" align="right" valign="bottom">ประเภท Product</td>
        <td width="15" align="center" valign="bottom"><font color="red">*</font></td>
        <td>
            <select id="txt_productType" name="txt_productType" class="textbox">
                <?
                foreach ($producttype as $val) {
                    if ($data[0]['ref_product_type_id'] == $val['product_type_id']) {
                        $select = "selected";
                    } else {
                        $select = "";
                    }
                    echo "<option value=\"$val[product_type_id]\" $select>$val[product_type]</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr style="display: none;">
        <td align="right" valign="bottom">สาขา</td>
        <td align="center" valign="bottom"><font color="red">*</font></td>
        <td><input type="text" style="width: 200px;" name="txt_branch" id="txt_branch" class="textbox" value="GB1"></td>
    </tr>
    <tr>
        <td align="right" valign="bottom">ชื่อ Product</td>
        <td align="center" valign="bottom"><font color="red">*</font></td>
        <td><input type="text" style="width: 200px;" name="txt_productName" id="txt_productName" class="textbox" value="<?= $data[0]['product_name'] ?>"></td>
    </tr>
    <tr>
        <td align="right" valign="top" style="padding-top: 5px;">รายละเอียด Product</td>
        <td align="center" valign="top" style="padding-top: 5px;"><font color="red"></font></td>
        <td>
            <textarea style="width: 200px;height: 100px;" name="txt_productDetail" id="txt_productDetail" class="textbox"><?= $data[0]['product_detail']; ?></textarea>
        </td>
    </tr>
    <tr id="div_numday" <?=$displayNumday;?>>
        <td align="right" valign="top" style="padding-top: 5px;">ระยะเวลา</td>
        <td align="center" valign="top" style="padding-top: 5px;"><font color="red">*</font></td>
        <td><input type="text" style="width: 100px;" name="txt_numday" id="txt_numday" class="textbox" value="<?= $data[0]['member_numday'] ?>">&nbsp;วัน</td>
    </tr>
    <tr <? echo $display ?>>
        <td align="right" valign="bottom">ราคาทุน</td>
        <td align="center" valign="bottom"><font color="red">*</font></td>
        <td><input type="text" style="width: 100px;" name="txt_cost" id="txt_cost" class="textbox" value="<?= $data[0]['product_cost'] ?>">&nbsp;บาท</td>
    </tr>
    <tr <? echo $display ?>>
        <td align="right" valign="bottom">ราคาขาย</td>
        <td align="center" valign="bottom"><font color="red">*</font></td>
        <td><input type="text" style="width: 100px;" name="txt_sale" id="txt_sale" class="textbox" value="<?= $data[0]['product_sale'] ?>">&nbsp;บาท</td>
    </tr>
    <?
    if ($type == 1) {
        echo "<tr>";
        echo "<td height=\"10\">";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan=\"3\" align=\"center\">";
        echo "<center><B>ตารางราคาค่าเช่า</B></center><BR>";
        echo "<table class=\"table-print\">";
        echo "
            <tr class=\"tb-header2\">
                        <td>ระยะเวลา</td>
                        <td>ราคาทุน</td>
                        <td>ราคาขาย</td>                        
                    </tr> 
        ";

        for ($i = 1; $i <= 10; $i++) {
            $time_name = "";
            $product_cost = "";
            $product_sale = "";

            foreach ($priceRate as $val) {
                if ($val['index'] == $i) {
                    $time_name = $val['time_name'];
                    $product_cost = $val['product_cost'];
                    $product_sale = $val['product_sale'];
                }
            }

            echo "              
                    <tr>
                        <td><input type=\"text\" class=\"textbox\" style=\"width: 100px;\" name=\"txt_timename_$i\" value=\"$time_name\"></td>
                        <td><input type=\"text\" class=\"textbox\" style=\"width: 100px;text-align: right;\" name=\"txt_time_cost_$i\" value=\"$product_cost\"></td>
                        <td><input type=\"text\" class=\"textbox\" style=\"width: 100px;text-align: right;\" name=\"txt_time_sale_$i\" value=\"$product_sale\"></td>
                    </tr>      
                ";
        }
        echo "</table></td>";
        echo "</tr>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

<input type="hidden" id="hid_name" value="<?= $data[0]['product_name'] . " (" . $data[0]['product_code'] . ")"; ?>">
<input type="hidden" id="txt_productID" name="txt_productID" value="<?= $data[0]['product_id']; ?>">
<input type="hidden" id="txt_type" name="txt_type" value="<?= $type; ?>">
<? echo form_close(); ?>
<span id="div_loading_top"></span>
