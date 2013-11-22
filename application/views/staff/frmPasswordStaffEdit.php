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
                                <td valign="bottom">Username : </td>
                                <td style="padding-left: 10px;"><input type="text" style="width: 250px;" id="txt_user" name="txt_user" class="textbox" value="<?=$data[0]['username']?>" disabled="disabled"></td>
                            </tr>                            
                            <tr>
                                <td valign="bottom">รหัสผ่านปัจจุบัน : </td>
                                <td style="padding-left: 10px;">
                                    <input type="password" style="width: 250px;" id="txt_oldPass" name="txt_oldPass" class="textbox" onkeyup="checkOldPassword();">                                    
                                    <input type="hidden" id="txt_check_oldPass" name="txt_check_oldPass" value="">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding-left: 10px;"><div id="div_checkOldPass" class="font11" style="color: red;"></div></td>
                            </tr>                            
                            <tr>
                                <td valign="bottom">รหัสผ่านใหม่ : </td>
                                <td style="padding-left: 10px;"><input type="password" style="width: 250px;" id="txt_newPass" name="txt_newPass" class="textbox" onkeyup="checkConfirmPassword();"></td>
                            </tr>
                            <tr>
                                <td valign="bottom">ยืนยันรหัสผ่าน : </td>
                                <td style="padding-left: 10px;">
                                    <input type="password" style="width: 250px;" id="txt_newPassConfirm" name="txt_newPassConfirm" class="textbox" onkeyup="checkConfirmPassword();">
                                    <input type="hidden" id="txt_check_confirmPass" name="txt_check_confirmPass" value="">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="padding-left: 10px;"><div id="div_checkConfirmPass" class="font11" style="color: red;"></div></td>
                            </tr>
                            <tr>
                                <td valign="bottom" height="10"></td>
                                <td style="padding-left: 10px;"></td>
                            </tr>
                            <tr>
                                <td valign="bottom"></td>
                                <td style="padding-left: 10px;"><input type="button" class="button_backend1" value="บันทึก" onclick="doChangePassword();"></td>
                            </tr>
                        </table> 
                    </td>
                    <td width="50%" valign="top">
                        <div class="font13" style="border-left: 1px solid #999;min-height: 150px;">
                            <div><center><u><b>ข้อมูลพนักงาน</b></u></center></div>
                            <div id="div_grouplist" style="margin-top: 10px;margin-left: 30px;">
                                <table class="font13" cellpadding="3">
                                    <tr>
                                        <td>รหัสพนักงาน</td>
                                        <td>:</td>
                                        <td><?=$data[0]['employee_code']?></td>
                                    </tr>
                                    <tr>
                                        <td>ชื่อ - สกุล</td>
                                        <td>:</td>
                                        <td><?=$data[0]['firstname']."   ".$data[0]['lastname']?></td>
                                    </tr>
                                    <tr>
                                        <td>รหัสบัตรประชาชน</td>
                                        <td>:</td>
                                        <td><?=$data[0]['license_number'];?></td>
                                    </tr>
                                    <tr>
                                        <td>เบอร์โทรศัพท์</td>
                                        <td>:</td>
                                        <td><?=$data[0]['phone_number'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?=$data[0]['username'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Group</td>
                                        <td>:</td>
                                        <td><?=$data[0]['group_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Login ล่าสุด</td>
                                        <td>:</td>
                                        <td><?=$data[0]['last_login'];?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>
</form>

<div style="display: none;" id="div_loading"><center><? echo getResourceImage("loading_2.gif");?></center></div>
