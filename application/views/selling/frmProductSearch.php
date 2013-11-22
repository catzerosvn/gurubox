<?
$this->load->model("selling_model");
echo "<table cellpadding=\"3\" cellspacing=\"1\" class=\"font13\" style=\"background-color:#FFF;width:500px;\"> ";
echo "<tr class=\"tb-header\" style=\"text-align: center;\">";
echo "<td>รหัสสินค้า</td>";
echo "<td>ชื่อสินค้า</td>";
echo "<td>ราคา</td>";
echo "<td>คงเหลือ</td>";
echo "<td>คำสั่ง</td>";
echo "</tr>";
foreach ($data as $val) {
    $style = "";
    if ($val['ref_product_type_id'] == "1") {
        $reserve = $this->selling_model->checkRoom($val['product_code']);        //print_r($elements);
        if (count($reserve) > 0) {
            $qty = "<span style=\"color: red;\">- เต็ม -</span>";
            $style = "style=\"display: none;\"";
        } else {
            $qty = "<span style=\"color: #2EF218;\">ว่าง</span>";
        }

        $eventOn = "doAddProductNonStock('$val[product_code]','$val[product_name]');";
    } else if ($val['ref_product_type_id'] == "2") {
        $qty = $val['product_quantity'];
        $eventOn = "doAddProductStock('$val[product_code]','$val[product_name]');";
    } else if ($val['ref_product_type_id'] == "3") {
        $qty = $val['product_quantity'];
        $eventOn = "doAddProductMember('$val[product_code]','$val[product_name]');";
    }else if ($val['ref_product_type_id'] == "4") {
        $qty = $val['product_quantity'];
        $eventOn = "doAddReserver('$val[product_code]','$val[product_name]');";
    }

    if ($val['ref_product_type_id'] != "5") {
        echo "<tr class=\"tb-hover\" style=\"\">";
        echo "<td align=\"center\">$val[product_code]</td>";
        echo "<td>$val[product_name]</td>";
        echo "<td align=\"right\">$val[product_sale]</td>";
        echo "<td align=\"center\">$qty</td>";
        echo "<td align=\"center\"><div class=\"button-smalldiv\" onclick=\"$eventOn\" $style>เพิ่ม</div></td>";
        echo "</tr>";
    }
}
echo "</table>";
?><div style="display: none;"></div>