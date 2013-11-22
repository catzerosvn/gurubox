<?  
if (count($data) <= 0) {
    echo "<BR><BR><BR><center>ไม่มี Locker ว่าง</center>";
} else {
    ?>
    <table width="460"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
        <tr class="tb-header" style="text-align: center;">
            <td width="60">Product Code</td>
            <td width="200">ชื่อ Product</td>
        <td width="80">สถานะ</td>
        <td width="80">คำสั่ง</td>
    </tr>
    <?
    foreach ($data as $val) {
        $reserve = $this->selling_model->getLocker($val['product_code']);

        if (count($reserve) > 0) {
            $qty = "<span style=\"color: red;\">- เต็ม -</span>";
            $button = "-";
        } else {
            $qty = "<span style=\"color: #2EF218;\">ว่าง</span>";
            $button = "<div class=\"button-smalldiv\" onclick=\"doActionSelectLocker('$val[product_code]');\">เลือก</div>";
        }

        echo "
        <tr class=\"tb-hover\">
            <td>$val[product_code]</td>
                <td>$val[product_name]</td>
                    <td align=\"center\">$qty</td>
                        <td align=\"center\">$button</td>
        </tr>
    ";
    }
    ?>
    </table>
<? } ?>