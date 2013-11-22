<? echo form_open("members/frmActionEditMember","enctype=\"multipart/form-data\" id=\"form_member_Edit\" ");?>
<!--<form id="form_member_Edit" method="post" enctype="multipart/form-data">-->
    <? //print_r($member);?>    
    <table width="500" class="font13">
        <tr>
            <td colspan="3">
                <div class="img-resize" style="margin-left: 230px;">
                    <?
                    if ($member[0]['picture'] != "") {
                        echo getResourceImageMember($member[0]['picture']);
                    }
                    ?>
                </div>             
                <div style="margin-left: 308px;margin-top: -22px;" id="div_button_changepic"><div class="button-smalldiv" style="z-index: 1000;position:relative;" onclick="doClickTxtPic();">เปลี่ยนรูป</div></div>   
                <div style="display: none;margin-left: 180px;" id="div_changepic2"><input type="file" id="txt_pic" name="txt_pic" style="height: 20px;"></div>                
                <BR>
                <BR>
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">คำนำหน้าชื่อ</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <select id="txt_prefix" name="txt_prefix" class="textbox">
                    <option value="นาย" <?
                    if ($member[0]['prefix_name'] == "นาย") {
                        echo "selected";
                    }
                    ?>>นาย</option>
                    <option value="นางสาว" <?
                            if ($member[0]['prefix_name'] == "นางสาว") {
                                echo "selected";
                            }
                    ?>>นางสาว</option>
                    <option value="นาง" <?
                            if ($member[0]['prefix_name'] == "นาง") {
                                echo "selected";
                            }
                    ?>>นาง</option>
                    <option value="ด.ช." <?
                            if ($member[0]['prefix_name'] == "ด.ช.") {
                                echo "selected";
                            }
                    ?>>ด.ช.</option>
                    <option value="ด.ญ." <?
                            if ($member[0]['prefix_name'] == "ด.ญ.") {
                                echo "selected";
                            }
                    ?>>ด.ญ.</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">ชื่อ</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_memberName" id="txt_memberName" class="textbox" value="<?= $member[0]['firstname']; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">นามสกุล</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_memberLastname" id="txt_memberLastname" class="textbox" value="<?= $member[0]['lastname']; ?>"></td>
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

                        if ($i == substr($member[0]['birthdate'], 8, 2) + 0) {
                            $select = "selected";
                        } else {
                            $select = "";
                        }
                        echo "<option value=\"$ai$i\" $select>$i</option>";
                    }
                    ?>
                </select>
                <select id="txt_BornMonth" name="txt_BornMonth" class="textbox" style="width: 90px;">
                    <option value="01" <?
                    if ((substr($member[0]['birthdate'], 5, 2) + 0) == "1") {
                        echo "selected";
                    }
                    ?>>มกราคม</option>
                    <option value="02" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "2") {
                                echo "selected";
                            }
                    ?>>กุมภาพันธ์</option>
                    <option value="03" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "3") {
                                echo "selected";
                            }
                    ?>>มีนาคม</option>
                    <option value="04" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "4") {
                                echo "selected";
                            }
                    ?>>เมษายน</option>
                    <option value="05" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "5") {
                                echo "selected";
                            }
                    ?>>พฤษภาคม</option>
                    <option value="06" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "6") {
                                echo "selected";
                            }
                    ?>>มิถุนายน</option>
                    <option value="07" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "7") {
                                echo "selected";
                            }
                    ?>>กรกฎาคม</option>
                    <option value="08" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "8") {
                                echo "selected";
                            }
                    ?>>สิงหาคม</option>
                    <option value="09" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "9") {
                                echo "selected";
                            }
                    ?>>กันยายน</option>
                    <option value="10" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "10") {
                                echo "selected";
                            }
                    ?>>ตุลาคม</option>
                    <option value="11" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "11") {
                                echo "selected";
                            }
                    ?>>พฤศจิกายน</option>
                    <option value="12" <?
                            if (substr($member[0]['birthdate'], 5, 2) + 0 == "12") {
                                echo "selected";
                            }
                    ?>>ธันวาคม</option>
                </select>
                <select id="txt_BornYear" name="txt_BornYear" class="textbox" style="width: 60px;">
                    <?
                    $select = "";
                    for ($i = 1913 + 543; $i <= date("Y") + 543; $i++) {
                        if ($i == substr($member[0]['birthdate'], 0, 4) + 543) {
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
                <input type="text" style="width: 200px;" name="txt_memberIDcard" id="txt_memberIDcard" class="textbox" onkeyup="checkEmpIdCard();" value="<?= $member[0]['license_number']; ?>" disabled="disabled">
                <span id="div_EmpIdCard" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_memberIDcard" id="txt_checker_memberIDcard">
            </td>
        </tr>
        <tr>
            <td align="right" valign="bottom">เบอร์โทรศัพท์</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td><input type="text" style="width: 200px;" name="txt_Tel" id="txt_Tel" class="textbox" value="<?= $member[0]['phone_number']; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">อาชีพ</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <?
                echo "<select id=\"txt_career\" name=\"txt_career\" class=\"textbox\" onclick=\"checkOtherCareer();\">";
                foreach ($career as $val) {
                    if ($val['career_id'] == $member[0]['career']) {
                        $select = "selected";
                    } else {
                        $select = "";
                    }
                    echo"<option value=\"$val[career_id]\" $select>$val[career_name]</option>";
                }
                ?>

        <option value="OTHER" <?
                if ($member[0]['career'] == "999") {
                    echo "selected";
                }
                ?>>อื่น ๆ</option>

        <?
        echo "</select>";
        if ($member[0]['career'] == "999") {
            echo "<script>$(\"#div_addCareer\").show();</script>";
        }
        ?>
        </td>
        </tr>
        <tr id="div_addCareer" style="display: none">
            <td align="right" valign="bottom">ระบุอาชีพ</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>                            
                <span><input type="text" id="txt_addCareer" name="txt_addCareer" style="width: 200px;" class="textbox" value="<?= $member[0]['custom_career'] ?>"></span>
            </td>
        </tr>  
        <tr>
            <td align="right" valign="bottom">E-mail</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <input type="text" style="width: 200px;" name="txt_mail" id="txt_mail" class="textbox" onkeyup="checkEditEmail();" value="<?= $member[0]['email'] ?>">
                <input value="<?= $member[0]['email'] ?>" id="txt_mail_hid" name="txt_mail_hid" style="display: none;">
                <span id="div_Email" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_memberEmail" id="txt_checker_memberEmail">
            </td>
        </tr>        
        <tr>
            <td colspan="3" height="10"></td>
        </tr>
        <tr>
            <td align="right" valign="bottom">Username</td>
            <td align="center" valign="bottom"><font color="red">*</font></td>
            <td>
                <input type="text" style="width: 200px;" name="txt_user" id="txt_user" class="textbox" onkeyup="checkEditMemberUser();" value="<?= $member[0]['username']; ?>">
                <span id="div_memberUser" style="vertical-align: middle;padding-left: 10px;color: royalblue;font-size: 10px;"></span>
                <input type="hidden" name="txt_checker_memberUser" id="txt_checker_memberUser">
                <input type="hidden" name="txt_user_test" id="txt_user_test" value="<?= $member[0]['username']; ?>">
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
            <td colspan="2"></td>
            <td><span id="div_loading"></span></td>
        </tr>        
    </table>

    <input type="hidden" id="hid_name" value="<?= $member[0]['firstname'] . "  " . $member[0]['lastname']; ?>">
    <input type="hidden" id="txt_memberID" name="txt_memberID" value="<?= $member[0]['member_id']; ?>">
</form>
<span id="div_loading_top"></span>
