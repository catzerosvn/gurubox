<table width="720"  cellpadding="3" cellspacing="1" class="table-print font13" style="background-color:#FFF;" border="1">
    <tr class="tb-header-print" style="text-align: center;">
        <td height="35" style="background-color: #D0D0D0;">รหัสสินค้า</td>
        <td style="background-color: #D0D0D0;">ชื่อสินค้า</td>
        <td style="background-color: #D0D0D0;">วันที่</td>
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
                <td align=\"center\">".  substr($val['billing_date'],0,10)."</td>    
                <td align=\"center\">$val[quantity]</td>
                <td align=\"right\">$val[unit_sale_price]</td>
                <td align=\"right\">" . number_format($val['unit_sale_price'] * $val['quantity'], 2) . "</td>
            </tr>    
        ";

        $sumSelling = $sumSelling + ($val['unit_sale_price'] * $val['quantity']);
    }
    ?>
    <tr class="tb-hover">
        <td colspan="5" align="right"><b>รวม</b></td>
        <td align="right"><b><?= number_format($sumSelling, 2) ?></b></td>
    </tr>
</table>