<div style="margin-bottom: 15px;margin-left: 0px;border-bottom: 0px;" class="menu_left">
    <a href="javascript:doCheckAll();" style="color: #000;">เลือกทั้งหมด</a> | 
    <a href="javascript:doUnCheckAll();" style="color: #000;">ยกเลิกการเลือกสิทธิ์ทั้งหมด</a></div>
<table style="margin-left: 20px;">                        
    <?
    foreach ($menu as $val) {
        $elements["data"] = $this->staff_model->getGroupsPermission($group_id,$val['menu_id']);
        
        if(count($elements["data"]) > 0){
            $check = "checked";
        }else{
            $check = "";
        }        
        
        echo "
                                    <tr>
                                        <td><input type=\"checkbox\" class=\"checkbox1 textbox\" style=\"padding-top: 5px;\" name=\"txt_$val[menu_id]\" value=\"$val[menu_id]\" $check></td>
                                        <td>$val[menu_name]</td>
                                    </tr>
                                    ";
    }
    ?>
    <tr>
        <td height="20"></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" class="button_backend1" value="บันทึก" onclick="doSetMenu();"></td>
    </tr>
</table>