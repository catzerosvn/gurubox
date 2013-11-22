<form id="form_Staff">
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftStaff"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มข้อมูล Staff ใหม่</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 50px;" class="shadow">
                <div class="font13" style="margin-bottom: 20px;">
<!--                    <div style="float: left;">
                        <input class="textbox" style="width: 350px;" style="float: left;" id="txt_key" name="txt_key">
                    </div>-->
<!--                    <div style="float: left;margin-top: 0px;margin-left: 0px;">
                        <select class="textbox" id="txt_searchType" name="txt_searchType" style="height: 29px;">
                            <option value="STAFFCODE">ค้นหาจากรหัสพนักงาน</option>
                            <option value="NAME">ค้นหาจากชื่อ</option>
                            <option value="LASTNAME">ค้นหาจากนามสกุล</option>
                            <option value="USERNAME">ค้นหาจาก Username</option>
                        </select>
                    </div>-->
                   <!--<input type="button" value="ค้นหา" class="button_backend1" style="margin-left: -5px;">-->
                    <!--<div style="float: left;font-size: 13px;width: 70px;height: 20px;margin-left: 0px;" class="button-smalldiv" onclick="doSerachStaff();">ค้นหา</div>-->
                </div>
                <div id="div_showData">
                    <?
                    if ($count <= 0) {
                    ?>
                    <div style="min-height: 70px;margin-top: 100px;" class="font13"><center>ไม่มีข้อมูล Staff</center></div>
                    <?                        
                    }else{
                    ?>                    
<!--                    <div style="margin-left: 616px;" id="div_padding" class="font13">
                        <?
//                        $limit = 50;
//                        $page = ceil($count / $limit);
                        ?>
                        <select id="txt_page" name="txt_page" onchange="doChangePageStaff();">
                            <?
//                            for ($i = 1; $i <= $page; $i++) {
//                                echo "<option value=\"$i\">$i</option>";
//                            }
                            ?>                            
                        </select>
                    </div>-->
                    <div id="div_dataTable">
                        <table width="650"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                            <tr class="tb-header" style="text-align: center;width: 100;">
                                <td width="80">รหัสพนักงาน</td>
                                <td width="150">ชื่อ - สกุล</td>
                                <td width="80">Username</td>
                                <td width="80">กลุ่ม</td>
                                <td>คำสั่ง</td>
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
                                    echo "<td align=\"center\" width=\"100\"><div class=\"button-smalldiv\" onclick=\"doChangePassUser('$val[ref_employee_code]','$val[username]','$val[firstname]&nbsp;&nbsp;$val[lastname]')\" style=\"width: 100px;\">เปลี่ยน Password</div></td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <?
                     } 
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="div_changePass" style="display: none;"></div>
    <div id="div_deleteStaff" style="display: none;" class="font13" title="ยืนยันการลบพนักงาน">
        <br><center>กรุณายืนยันการลบพนักงาน</center>
        <div id="div_loading_delete"></div>
    </div>
</form>

<div style="display: none;" id="div_loading"><center><? echo getResourceImage("loading_2.gif");?></center></div>