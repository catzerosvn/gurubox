<? echo form_open("staff/frmSetmenu");?>
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftStaff"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการสิทธิ์การเข้าใช้งาน Menu</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 50px;" class="shadow font13">      
                <div>กลุ่ม &nbsp;&nbsp;
                    <select class="textbox" name="txt_group" id="txt_group" style="width: 150px;" onchange="doSelectGroup();">
                        <option value="0">กรุณาเลือกกลุ่ม</option>
                        <?
                            if(count($group) > 0){
                                foreach ($group as $val){
                                    echo "<option value=\"$val[group_id]\">$val[group_name]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="clear" style="height: 20px;"></div>
                <div id="div_listmenu">
                    
                </div>
            </div>
        </div>
    </div>
<? echo form_close();?>
