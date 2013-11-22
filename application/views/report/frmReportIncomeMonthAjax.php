<?
if (count($data) <= 0) {
    echo "<div class=\"font13\"><BR><BR><BR><center>ไม่มีข้อมูลการขาย</center></div>";
} else {
    ?>

    <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
        <tr class="tb-header" style="text-align: center;">
            <td height="35">รหัสสินค้า</td>
            <td>ชื่อสินค้า</td>
            <td>จำนวน</td>
            <td>ราคาต่อชิ้น</td>
            <td>รวม</td>
            <td>รายละเอียด</td>
        </tr>
        <?
        $sumSelling = 0;
        foreach ($data as $val) {
            echo "
            <tr class=\"tb-hover\">
                <td align=\"center\">$val[ref_product_code]</td>
                <td>$val[product_name]</td>
                <td align=\"center\">$val[productQty]</td>
                <td align=\"right\">$val[unit_sale_price]</td>
                <td align=\"right\">" . number_format($val['unit_sale_price'] * $val['productQty'], 2) . "</td>
                    <td align=\"center\"><div class=\"button-smalldiv\" onclick=\"doViewReportMonthProduct('$val[ref_product_code]',$val[unit_sale_price]);\" style=\"width: 70px;\">รายละเอียด</div></td>
            </tr>    
        ";

            $sumSelling = $sumSelling + ($val['unit_sale_price'] * $val['productQty']);
        }
        ?>
        <tr class="tb-hover">
            <td colspan="4" align="right"><b>รวม</b></td>
            <td align="right"><b><?= number_format($sumSelling, 2) ?></b></td>
            <td></td>
        </tr>
    </table>

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
            <table width="720"  cellpadding="3" cellspacing="1" class="table-print font13" style="background-color:#FFF;" border="1">
                <tr class="tb-header-print" style="text-align: center;">
                    <td height="35" style="background-color: #D0D0D0;">รหัสสินค้า</td>
                    <td style="background-color: #D0D0D0;">ชื่อสินค้า</td>
                    <td style="background-color: #D0D0D0;">จำนวน</td>
                    <td style="background-color: #D0D0D0;">ราคาต่อชิ้น</td>
                    <td style="background-color: #D0D0D0;">รวม</td>
                </tr>
                <?
                $sumSelling = 0;
                foreach ($data as $val) {
                    echo "
            <tr class=\"tb-hover\">
                <td align=\"center\">$val[ref_product_code]</td>
                <td>$val[product_name]</td>
                <td align=\"center\">$val[productQty]</td>
                <td align=\"right\">$val[unit_sale_price]</td>
                <td align=\"right\">" . number_format($val['unit_sale_price'] * $val['productQty'], 2) . "</td>
            </tr>    
        ";

                    $sumSelling = $sumSelling + ($val['unit_sale_price'] * $val['productQty']);
                }
                ?>
                <tr class="tb-hover">
                    <td colspan="4" align="right"><b>รวม</b></td>
                    <td align="right"><b><?= number_format($sumSelling, 2) ?></b></td>
                </tr>
            </table>
        <? } ?>
    </div>
<? } ?>

<div style="display: none;">
 <? echo form_open("report/frmExportXls","id=\"formExportXls\" ");?>
    <textarea id="txt_data2xls" name="txt_data2xls"></textarea>
    <input name="txt_titlereport" type="text" value="รายงานประจำเดือน">
<? echo form_close();?>
</div>

<div id="div_dataproduct" style="display: none;"></div>