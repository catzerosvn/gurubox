<?

if (count($group) > 0) {
    echo "
                                        <center>
                                        <table style=\"background-color:#FFF;\" cellpadding=\"3\" cellspacing=\"1\" width=\"400\">
                                        <tr class=\"tb-header\">
                                        <td align=\"center\" width=\"60\">ลำดับ</td>
                                        <td align=\"center\">ชื่อกลุ่ม</td>
                                        <td align=\"center\" colspan=\"2\">คำสั่ง</td>
                                        </tr>";
    $i = 1;
    foreach ($group as $val) {
        echo "
                                        <tr class=\"tb-hover\">
                                        <td align=\"center\" width=\"60\"  onclick=\"doSelectEditGroupStaff('$val[group_id]','$val[group_name]')\">$i</td>
                                        <td align=\"\"  style=\"padding-left: 10px;\" onclick=\"doSelectEditGroupStaff('$val[group_id]','$val[group_name]')\">$val[group_name]</td>
                                        <td align=\"center\"   onclick=\"doSelectEditGroupStaff('$val[group_id]','$val[group_name]')\"><div class=\"button-smalldiv\" onclick=\"doSelectEditGroupStaff('$val[group_id]','$val[group_name]')\">เลือก</div></td>
                                        <td align=\"center\" ><div class=\"button-smalldiv\" onclick=\"doSlelctDeleteGroupStaff('$val[group_id]')\">ลบ</div></td>
                                        </tr>
                                        ";
        $i++;
    }

    echo "
                                        </table>
                                        </center>
                                    ";
} else {
    echo "<BR><BR><center>-</center>";
}
?>