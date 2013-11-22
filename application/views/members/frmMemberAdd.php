<form id="form_member" action="frmActionAddnewMember" method="post" enctype="multipart/form-data">
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftMembers"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มข้อมูล Member ใหม่</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 50px;" class="shadow">      
                <table width="650" class="font13">
                    <tr>
                        <td width="100" align="right" valign="bottom">คำนำหน้าชื่อ</td>
                        <td width="15" align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <select id="txt_prefix" name="txt_prefix" class="textbox">
                                <option value="0">กรุณาเลือกคำนำหน้าชื่อ</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                                <option value="ด.ช.">ด.ช.</option>
                                <option value="ด.ญ.">ด.ญ.</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">ชื่อ</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 200px;" name="txt_memberName" id="txt_memberName" class="textbox"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">นามสกุล</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 200px;" name="txt_memberLastname" id="txt_memberLastname" class="textbox"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">วัน/เดือน/ปีเกิด</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <select id="txt_BornDay" name="txt_BornDay" class="textbox" style="width: 40px;">
                                <?
                                for ($i = 1; $i <= 31; $i++) {
                                    if (strlen($i) <= 1) {
                                        $ai = "0";
                                    } else {
                                        $ai = "";
                                    }
                                    echo "<option value=\"$ai$i\">$i</option>";
                                }
                                ?>
                            </select>
                            <select id="txt_BornMonth" name="txt_BornMonth" class="textbox" style="width: 90px;">
                                <option value="01">มกราคม</option>
                                <option value="02">กุมภาพันธ์</option>
                                <option value="03">มีนาคม</option>
                                <option value="04">เมษายน</option>
                                <option value="05">พฤษภาคม</option>
                                <option value="06">มิถุนายน</option>
                                <option value="07">กรกฎาคม</option>
                                <option value="08">สิงหาคม</option>
                                <option value="09">กันยายน</option>
                                <option value="10">ตุลาคม</option>
                                <option value="11">พฤศจิกายน</option>
                                <option value="12">ธันวาคม</option>
                            </select>
                            <select id="txt_BornYear" name="txt_BornYear" class="textbox" style="width: 60px;">
                                <?
                                for ($i = 1913 + 543; $i <= date("Y") + 543; $i++) {
                                    if ($i == date("Y") + 0) {
                                        $select = "";
                                    } else {
                                        $select = "";
                                    }
                                    echo "<option value=\"$i\" $select>$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">รหัสบัตรประชาชน</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <input type="text" style="width: 200px;" name="txt_memberIDcard" id="txt_memberIDcard" class="textbox" onkeyup="checkMemberIdCard();">
                            <span id="div_memberIdCard" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                            <input type="hidden" name="txt_checker_memberIDcard" id="txt_checker_memberIDcard">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">เบอร์โทรศัพท์</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 200px;" name="txt_Tel" id="txt_Tel" class="textbox"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">E-mail</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <input type="text" style="width: 200px;" name="txt_mail" id="txt_mail" class="textbox" onkeyup="checkEmail();">
                            <span id="div_Email" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                            <input type="hidden" name="txt_checker_memberEmail" id="txt_checker_memberEmail">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">อาชีพ</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <select id="txt_career" name="txt_career" class="textbox" onclick="checkOtherCareer();">
                                <option value="0">กรุณาเลือกอาชีพ</option>
                                <?
                                foreach ($career as $val) {
                                    echo"<option value=\"$val[career_id]\">$val[career_name]</option>";
                                }                                
                                ?>
                                <option value="OTHER">อื่น ๆ</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="div_addCareer" style="display: none">
                        <td align="right" valign="bottom">ระบุอาชีพ</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>                            
                            <span><input type="text" id="txt_addCareer" name="txt_addCareer" style="width: 200px;" class="textbox"></span>
                        </td>
                    </tr>                    
                    <tr>
                        <td align="right" valign="bottom">Point</td>
                        <td align="center" valign="bottom"><font color="red"></font></td>
                        <td>                            
                            <input type="text" id="txt_point" name="txt_point" style="width: 100px;" class="textbox">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">รูปภาพ</td>
                        <td align="center" valign="bottom"><font color="red"></font></td>
                        <td>                            
                            <input type="file" style="height: 28px;" id="txt_pic" name="txt_pic">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" height="10"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">Username</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <input type="text" style="width: 200px;" name="txt_user" id="txt_user" class="textbox" onkeyup="checkMemberUser();">
                            <span id="div_MemberUser" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                            <input type="hidden" name="txt_checker_MemberUser" id="txt_checker_MemberUser">
                        </td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom"></td>
                        <td align="center" valign="bottom"><font color="red"></font></td>
                        <td>
                            <span id="div_EmpIdCard" style="vertical-align: middle;padding-left: 0px;color: red;font-size: 10px;">
                                ระบบจะทำการตั้ง Password ให้อัตโนมัติเป็น 1234
                            </span>
                        </td>
                    </tr>                    
                    <tr>
                        <td colspan="2"></td>
                        <td><span id="div_loading"></span></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom" height="40"></td>
                        <td align="center" valign="bottom"></td>
                        <td valign="bottom">
                            <input type="button" value="เพิ่มข้อมูล" class="button_backend1" onclick="doAddNewMember();">
                            &nbsp;
                            <input type="reset" value="ล้างข้อมูล" class="button_backend1" onclick="doResetAddNewMember();">                        
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</form>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif");?></center></div>
