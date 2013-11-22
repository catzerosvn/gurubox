<?

if (count($group) > 0) {
    echo "
                                        <center>
                                        <table cellpadding=\"3\" cellspacing=\"1\" width=\"300\" style=\"background-color:#FFF;\">
                                        <tr class=\"tb-header\">
                                        <td align=\"center\" width=\"100\" >ลำดับ</td>
                                        <td align=\"center\" >ชื่อกลุ่ม</td>
                                        </tr>";
    $i = 1;
    foreach ($group as $val) {
        echo "
                                        <tr class=\"tb-hover\">
                                        <td align=\"center\" width=\"100\" >$i</td>
                                        <td align=\"\" style=\"padding-left: 10px;\">$val[group_name]</td>
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