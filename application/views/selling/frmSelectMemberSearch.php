<?
if (count($data) <= 0) {
    ?>
    <div style="min-height: 70px;margin-top: 100px;" class="font13"><center>ไม่มีข้อมูล Member</center></div>
    <?
} else {
    ?>    
    <table width="500"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
        <tr class="tb-header" style="text-align: center;">
            <td width="100">Username</td>
            <td width="200">ชื่อ - สกุล</td>
            <td width="60">คำสั่ง</td>
        </tr>
        <?
        foreach ($data as $val) {
            echo "<tr class=\"tb-hover\">";
            echo "<td align=\"\">$val[username]</td>";
            echo "<td align=\"\">$val[firstname]&nbsp;&nbsp;$val[lastname]</td>";
            echo "<td align=\"center\" width=\"50\"><div class=\"button-smalldiv\" onclick=\"doActionSelectMember('$val[member_id]','$val[firstname]&nbsp;&nbsp;$val[lastname]');\">เลือก</div></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?
}
?>