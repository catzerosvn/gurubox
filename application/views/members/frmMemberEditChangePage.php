<table width="650"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
    <tr class="tb-header" style="text-align: center;">
        <td width="80">รหัส Member</td>
        <td width="250">ชื่อ - สกุล</td>
        <td width="150">Username</td>
        <td colspan="2">คำสั่ง</td>
    </tr>
    <?
    foreach ($member as $val) {
        echo "<tr class=\"tb-hover\">";
        echo "<td align=\"\">$val[member_id]</td>";
        echo "<td align=\"\">$val[firstname]&nbsp;&nbsp;$val[lastname]</td>";
        echo "<td align=\"\">$val[username]</td>";
        echo "<td align=\"center\" width=\"50\"><div id=\"bt_Del_$val[member_id]\" class=\"button-smalldiv\" onclick=\"doDeleteMember('$val[member_id]');\">ลบ</div></td>";
        echo "<td align=\"center\" width=\"50\"><div class=\"button-smalldiv\" onclick=\"doEditMember('$val[member_id]')\">แก้ไข</div></td>";
        echo "</tr>";
    }
    ?>
</table>

