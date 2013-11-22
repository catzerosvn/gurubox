<?
if(count($data) <= 0){
    echo "<BR><BR><BR><center>ไม่มีข้อมูลการขายในช่วงเวลานี้</center>";
}else{ 
?>
<table width="550"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
    <tr class="tb-header" style="text-align: center;">
        <td>เลขที่บิล</td>
        <td>รหัสสินค้า</td>
        <td>ชื่อสินค้า</td>
        <td>ราคาขาย</td>
        <td>จำนวน</td>
        <td>รวม</td>
    </tr>
    <?
    foreach ($data as $val) {
        $total = $val['unit_sale_price']*$val['quantity'];
        echo "
                        <tr class=\"tb-hover\">
                        <td align=\"center\">$val[ref_billing_code]</td>
                        <td align=\"center\">$val[ref_product_code]</td>
                        <td align=\"center\">$val[product_name]</td>
                        <td align=\"right\">$val[unit_sale_price]</td>
                        <td align=\"right\">$val[quantity]</td>
                        <td align=\"right\">$total</td>                        
                        </tr>
                    ";
    }
    ?>
</table>
<?}?>