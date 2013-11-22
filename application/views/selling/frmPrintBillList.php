<?
if(count($data) <= 0){
    echo "<BR><BR><BR><center>ไม่มีข้อมูลการขายในช่วงเวลานี้</center>";
}else{ 
?>
<table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
    <tr class="tb-header" style="text-align: center;">
        <td>เลขที่บิล</td>
        <td>วันที่ออกบิล</td>
        <td>จำนวนเงิน</td>
        <td>ผู้ทำรายการ</td>
        <td>Member</td>
        <td>คำสั่ง</td>
    </tr>
    <?
    foreach ($data as $val) {
        echo "
                        <tr class=\"tb-hover\">
                        <td align=\"center\">$val[billing_code]</td>
                        <td align=\"center\">$val[billing_date]</td>
                        <td align=\"right\">$val[total_amount]</td>
                        <td>$val[create_by]</td>
                        <td>$val[firstname]  $val[lastname]</td>
                        <td align=\"center\"><div class=\"button-smalldiv\" onclick=\"doViewBill('$val[billing_code]');\" style=\"width: 70px;\">ดูรายละเอียด</div></td>
                        </tr>
                    ";
    }
    ?>
</table>
<?}?>