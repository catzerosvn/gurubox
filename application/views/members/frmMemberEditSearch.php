<?
if ($count <= 0) {
    ?>
    <div style="min-height: 70px;margin-top: 100px;" class="font13"><center>ไม่มีข้อมูล Member</center></div>
    <?
} else {
    ?>                    
    <div style="margin-left: 616px;" id="div_padding" class="font13">
        <?
        $limit = 50;
        $page = ceil($count / $limit);
        ?>
        <select id="txt_page" name="txt_page" onchange="doChangePageMember();">
            <?
            for ($i = 1; $i <= $page; $i++) {
                echo "<option value=\"$i\">$i</option>";
            }
            ?>                            
        </select>
    </div>
    <div id="div_dataTable">
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
    </div>
    <?
}
?>
                