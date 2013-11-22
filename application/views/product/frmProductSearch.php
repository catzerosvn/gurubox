<?
if (count($data) <= 0) {
    ?>
    <div style="min-height: 40px;margin-top: 40px;" class="font13"><center>ไม่มีข้อมูล Product</center></div>
    <?
} else {
    ?>
    <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
        <tr class="tb-header" style="text-align: center;">
            <td width="80">Product Code</td>
            <td width="200">ชื่อ Product</td>
            <td width="120">ประเภท Product</td>
            <td width="80">ราคาทุน</td>
            <td width="80">ราคาขาย</td>
            <td colspan="2">คำสั่ง</td>
        </tr>
        <?
        foreach ($data as $val) {
            echo "<tr class=\"tb-hover\">";
            echo "<td align=\"\">$val[product_code]</td>";
            echo "<td align=\"\">$val[product_name]</td>";
            echo "<td align=\"\">$val[product_type]</td>";
            echo "<td align=\"\">$val[product_cost]</td>";
            echo "<td align=\"\">$val[product_sale]</td>";
            echo "<td align=\"center\" width=\"50\"><div id=\"bt_Del_$val[product_id]\" class=\"button-smalldiv\" onclick=\"doDeleteProduct('$val[product_id]');\">ลบ</div></td>";
            echo "<td align=\"center\" width=\"50\"><div class=\"button-smalldiv\" onclick=\"doEditProduct('$val[product_id]')\">แก้ไข</div></td>";
            echo "</tr>";
        }
        ?>
    </table>
<?
}?>