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
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>รายงานสินค้าคงเหลือ</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 20px;" class="shadow">
                <div style="float: right;margin-right: 18px;">
                    <? echo getResourceImage("xls.png", "class=\"img-cursor\" onclick=\"doExportExcel();\"") ?>
                    &nbsp;&nbsp;
                    <? echo getResourceImage("print-icon99.png", "width=\"35\" height=\"32\" class=\"img-cursor\" onclick=\"doPrintDiv();\" ") ?>
                </div>
                <div style="height: 10px;" class="clear"></div>
                <div id="div_showData">
                    <?
                    if (count($data) <= 0) {
                        echo "<div class=\"font13\"><BR><BR><BR><center>ไม่มีข้อมูลสินค้า</center></div>";
                    } else {
                        ?>
                        <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                            <tr class="tb-header" style="text-align: center;">
                                <td>รหัสสินค้า</td>
                                <td>ชื่อสินค้า</td>
                                <td>ราคาทุน</td>
                                <td>ราคาขาย</td>
                                <td>จำนวนคงเหลือ</td>                                
                            </tr>
                            <?
                            foreach ($data as $val) {
                                echo "
                                    <tr class=\"tb-hover\">
                                        <td align=\"center\">$val[product_code]</td>
                                        <td align=\"\">$val[product_name]</td>
                                        <td align=\"right\">$val[product_cost]</td>
                                        <td align=\"right\">$val[product_sale]</td>
                                        <td align=\"center\">$val[product_quantity]</td>
                                    </tr>   
                                ";
                            }
                            ?>
                        </table>
                    <? } ?>
                </div>
                <div style="height: 30px;"></div>
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

<div id="div_print" style="display: none;">
    <style>
        .table-print
        {  
            border-collapse:collapse; 
        }
        .table-print td
        { 
            border:1px solid black;
        }
        .font13{
            font-family: Arial;
            font-size: 13px;
        }
        .font18{
            font-family: Arial;
            font-size: 18px;
        }
        .tb-header-print td{
            background: #D0D0D0;
        }
    </style>
    <?
    if (count($data) <= 0) {
        echo "<div class=\"font13\"><BR><BR><BR><center>ไม่มีข้อมูลสินค้า</center></div>";
    } else {
        ?>
        <table width="700"  cellpadding="3" cellspacing="1" class="table-print font13" border="1">
            <tr class="tb-header-print" style="text-align: center;">
                <td style="background-color: #D0D0D0;">รหัสสินค้า</td>
                <td style="background-color: #D0D0D0;">ชื่อสินค้า</td>
                <td style="background-color: #D0D0D0;">ราคาทุน</td>
                <td style="background-color: #D0D0D0;">ราคาขาย</td>
                <td style="background-color: #D0D0D0;">จำนวนคงเหลือ</td>                                
            </tr>
            <?
            foreach ($data as $val) {
                echo "
                                    <tr class=\"tb-hover\">
                                        <td align=\"center\">$val[product_code]</td>
                                        <td align=\"\">$val[product_name]</td>
                                        <td align=\"right\">$val[product_cost]</td>
                                        <td align=\"right\">$val[product_sale]</td>
                                        <td align=\"center\">$val[product_quantity]</td>
                                    </tr>   
                                ";
            }
            ?>
        </table>
    <? } ?>
</div>

<div style="display: none;">
 <? echo form_open("report/frmExportXls","id=\"formExportXls\" ");?>
    <textarea id="txt_data2xls" name="txt_data2xls"></textarea>
    <input name="txt_titlereport" type="text" value="รายงานสินค้าคงเหลือ">
<? echo form_close();?>
</div>