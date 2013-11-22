<div id="div_dataTable">
<table width="650"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
    <tr class="tb-header" style="text-align: center;">
        <td width="80">รหัสพนักงาน</td>
        <td width="150">ชื่อ - สกุล</td>
        <td width="80">Username</td>
        <td width="80">กลุ่ม</td>
        <td colspan="2">คำสั่ง</td>
    </tr>
    <?
    foreach ($employee as $val) {
        echo "<tr class=\"tb-hover\">";
        echo "<td align=\"\">$val[ref_employee_code]</td>";
        echo "<td align=\"\">$val[firstname]&nbsp;&nbsp;$val[lastname]</td>";
        echo "<td align=\"\">$val[username]</td>";
        echo "<td align=\"\">$val[group_name]</td>";
        if ($val['username'] == "admin") {
            echo "<td colspan=\"2\" class=\"font11\" align=\"center\"><font color=\"red\">Don't Change OR Remove.</font></td>";
        } else {
            echo "<td align=\"center\" width=\"50\"><div id=\"bt_Del_$val[ref_employee_code]\" class=\"button-smalldiv\" onclick=\"doDeleteStaff('$val[ref_employee_code]');\">ลบ</div></td>";
            echo "<td align=\"center\" width=\"50\"><div class=\"button-smalldiv\" onclick=\"doEditStaff('$val[ref_employee_code]')\">แก้ไข</div></td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</div>