<table width="450"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
    <tr class="tb-header" style="text-align: center;">
        <td width="100">Product Code</td>
        <td width="200">ชื่อ Product</td>
        <td width="100">จำนวนที่เพิ่มสินค้า</td>
    </tr>
    <?
    foreach ($dataImport as $val) {
        echo "<tr class=\"tb-hover\">";
        echo "<td align=\"center\">$val[ref_product_code]</td>";
        echo "<td align=\"\">$val[product_name]</td>";
        echo "<td align=\"center\">$val[quantity]</td>";        
        echo "</tr>";
    }
    ?>
</table>