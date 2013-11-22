<form id="form_Staff_Edit">
<? //print_r($employee);?>    
    <table width="650" class="font13">
        <tr>
            <td width="100" align="right" valign="bottom">รหัสพนักงาน</td>
            <td width="15" align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <input type="text" style="width: 150px;pa" name="txt_empCode" id="txt_empCode" class="textbox" onkeyup="checkEditEmpCode();" value="<? echo $employee[0]['employee_code'];?>" disabled="disabled">
                <span id="div_EmpCode" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_empCode" id="txt_checker_empCode">
                <input type="hidden" name="txt_empCode_test" id="txt_empCode_test" value="<? echo $employee[0]['employee_code'];?>">
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">ชื่อ</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_empName" id="txt_empName" class="textbox" value="<?=$employee[0]['firstname'];?>"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">นามสกุล</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_empLastname" id="txt_empLastname" class="textbox" value="<?=$employee[0]['lastname'];?>"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">วัน/เดือน/ปีเกิด</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <select id="txt_BornDay" name="txt_BornDay" class="textbox" style="width: 40px;">
                    <?
                    $select = "";
                    for ($i = 1; $i <= 31; $i++) {
                        if (strlen($i) <= 1) {
                            $ai = "0";
                        } else {
                            $ai = "";
                        }
                        
                        if($i == substr($employee[0]['birthdate'],8,2)+0){
                             $select = "selected";
                        }else{
                             $select = "";
                        }
                        echo "<option value=\"$ai$i\" $select>$i</option>";
                    }
                    ?>
                </select>
                <select id="txt_BornMonth" name="txt_BornMonth" class="textbox" style="width: 90px;">
                    <option value="01" <? if((substr($employee[0]['birthdate'],5,2)+0) == "1"){ echo "selected"; }?>>มกราคม</option>
                    <option value="02" <? if(substr($employee[0]['birthdate'],5,2)+0 == "2"){ echo "selected"; }?>>กุมภาพันธ์</option>
                    <option value="03" <? if(substr($employee[0]['birthdate'],5,2)+0 == "3"){ echo "selected"; }?>>มีนาคม</option>
                    <option value="04" <? if(substr($employee[0]['birthdate'],5,2)+0 == "4"){ echo "selected"; }?>>เมษายน</option>
                    <option value="05" <? if(substr($employee[0]['birthdate'],5,2)+0 == "5"){ echo "selected"; }?>>พฤษภาคม</option>
                    <option value="06" <? if(substr($employee[0]['birthdate'],5,2)+0 == "6"){ echo "selected"; }?>>มิถุนายน</option>
                    <option value="07" <? if(substr($employee[0]['birthdate'],5,2)+0 == "7"){ echo "selected"; }?>>กรกฎาคม</option>
                    <option value="08" <? if(substr($employee[0]['birthdate'],5,2)+0 == "8"){ echo "selected"; }?>>สิงหาคม</option>
                    <option value="09" <? if(substr($employee[0]['birthdate'],5,2)+0 == "9"){ echo "selected"; }?>>กันยายน</option>
                    <option value="10" <? if(substr($employee[0]['birthdate'],5,2)+0 == "10"){ echo "selected"; }?>>ตุลาคม</option>
                    <option value="11" <? if(substr($employee[0]['birthdate'],5,2)+0 == "11"){ echo "selected"; }?>>พฤศจิกายน</option>
                    <option value="12" <? if(substr($employee[0]['birthdate'],5,2)+0 == "12"){ echo "selected"; }?>>ธันวาคม</option>
                </select>
                <select id="txt_BornYear" name="txt_BornYear" class="textbox" style="width: 60px;">
                    <?
                    $select = "";
                    for ($i = 1913 + 543; $i <= date("Y") + 543; $i++) {
                        if ($i == substr($employee[0]['birthdate'],0,4)+543) {
                            $select = "selected";
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
                <input type="text" style="width: 200px;" name="txt_empIDcard" id="txt_empIDcard" class="textbox" onkeyup="checkEmpIdCard();" value="<?=$employee[0]['license_number'];?>" disabled="disabled">
                <span id="div_EmpIdCard" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_empIDcard" id="txt_checker_empIDcard">
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">เบอร์โทรศัพท์</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_Tel" id="txt_Tel" class="textbox" value="<?=$employee[0]['phone_number'];?>"></td>
        </tr>
        <tr>
            <td colspan="3" height="10"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">Username</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <input type="text" style="width: 200px;" name="txt_user" id="txt_user" class="textbox" onkeyup="checkEditEmpUser();" value="<?=$employee[0]['username'];?>">
                <span id="div_EmpUser" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_EmpUser" id="txt_checker_EmpUser">
                <input type="hidden" name="txt_user_test" id="txt_user_test" value="<?=$employee[0]['username'];?>">
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom"></td>
            <td align="center" valign="bottom"><font color="red"></font></td>
            <td>
<!--                <span id="div_EmpIdCard" style="vertical-align: middle;padding-left: 0px;color: red;font-size: 10px;">
                    ระบบจะทำการตั้ง Password ให้อัตโนมัติเป็น 1234
                </span>-->
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">Group User</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <select style="width: 150px;" id="txt_group" name="txt_group">
                    <option value="0" class="textbox" style="vertical-align:text-bottom;">กรุณาเลือกกลุ่ม</option>
                    <?
                    $select = "";
                    foreach ($group as $val) {
                        if ($val['group_id'] == $employee[0]['group_id']+0) {
                            $select = "selected";
                        } else {
                            $select = "";
                        }
                        echo "<option value=\"$val[group_id]\" class=\"textbox\" $select>$val[group_name]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><span id="div_loading"></span></td>
        </tr>        
    </table>

<input type="hidden" id="hid_name" value="<?=$employee[0]['firstname']."  ".$employee[0]['lastname'];?>">
<input type="hidden" id="txt_staffID" value="<?=$employee[0]['employee_code'];?>">
</form>
<span id="div_loading_top"></span>
