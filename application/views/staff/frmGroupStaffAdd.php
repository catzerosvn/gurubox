<form id="form_GroupStaff">
<div class="container_29" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftStaff"); ?>
    </div>
    <!--    <div class="grid_1">
            <div style="background-color: #999999;width: 1px;height: 300px;"></div>
        </div>-->
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มกลุ่มผู้ใช้งานระบบ</b></u></div>
        <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;" class="shadow">      
            <table width="100%">
                <tr>
                    <td width="50%" valign="top">
                        <div style="margin-top: 25px;"></div>
                        <table class="font13">
                            <tr>
                                <td valign="bottom">ชื่อกลุ่ม : </td>
                                <td style="padding-left: 10px;"><input type="text" style="width: 250px;" id="txt_groupname" name="txt_groupname" class="textbox"></td>
                            </tr>
                            <tr>
                                <td valign="bottom" height="10"></td>
                                <td style="padding-left: 10px;"></td>
                            </tr>
                            <tr>
                                <td valign="bottom"></td>
                                <td style="padding-left: 10px;"><input type="button" class="button_backend1" value="เพิ่มกลุ่ม" onclick="doAddNewGroupStaff();"></td>
                            </tr>
                        </table> 
                    </td>
                    <td width="50%" valign="top">
                        <div class="font13" style="border-left: 1px solid #999;min-height: 150px;">
                            <div><center><u><b>รายชื่อกลุ่ม</b></u></center></div>
                            <div id="div_grouplist" style="margin-top: 10px;">
                                <?
                                if(count($group) > 0) {
                                    echo "
                                        <center>
                                        <table cellpadding=\"3\" cellspacing=\"1\" width=\"300\" style=\"background-color:#FFF;\">
                                        <tr class=\"tb-header\">
                                        <td align=\"center\" width=\"100\">ลำดับ</td>
                                        <td align=\"center\">ชื่อกลุ่ม</td>
                                        </tr>";
                                    $i=1;
                                    foreach ($group as $val){
                                        echo "
                                        <tr class=\"tb-hover\">
                                        <td align=\"center\" width=\"100\">$i</td>
                                        <td align=\"\" style=\"padding-left: 10px;\">$val[group_name]</td>
                                        </tr>
                                        ";
                                        $i++;
                                    }
                                    
                                    echo "
                                        </table>
                                        </center>
                                    ";
                                }else{
                                    echo "<BR><BR><center>-</center>";
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>
</form>
