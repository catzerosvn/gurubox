<? echo form_open("staff/frmActionChangePassUser");?>
<table class="font13">
    <tr>
        <td>รหัสพนักงาน</td>
        <td><input type="text" class="textbox" id="txt_empID" name="txt_empID" value="<?=$post['empID'];?>" readonly></td>
    </tr>
    <tr>
        <td>ชื่อ - นามสกุล</td>
        <td><input type="text" class="textbox" id="txt_name" name="txt_name" value="<?=$post['fullname'];?>" readonly></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><input type="text" class="textbox" id="txt_user" name="txt_user" value="<?=$post['user'];?>" readonly></td>
    </tr>
    <tr>
        <td>New Password</td>
        <td><input type="text" class="textbox" id="txt_pass" name="txt_pass" value="" ></td>
    </tr>
    <tr>
        <td height="10"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" class="button_backend1" value="เปลี่ยน Password" style="width: 120px;" onclick="doActionChangePassUser('<? echo $post['empID'];?>');"></td>
    </tr>
</table>
<BR><BR>
<div style="color: red;float: right;" class="font12">Press ESC to exit.</div>
<? echo form_close();?>
