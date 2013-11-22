<b class="font13">Staff Management.</b>
<div style="padding-left: 15px;padding-top: 10px;" class="font13">
    <? echo $this->menu_model->checkMenu(1);?>
    <? echo $this->menu_model->checkMenu(2);?>
    <? echo $this->menu_model->checkMenu(3);?>
    <? echo $this->menu_model->checkMenu(4);?>
    <? echo $this->menu_model->checkMenu(7);?>
    <? echo $this->menu_model->checkMenu(8);?>
    <? 
    if($this->session->userdata("SESSION_USER_ID") == "56-5557"){
        echo "<div class=\"menu_left\"><a href=\"".site_url("staff/frmChangePasswordUser")."\">- เปลี่ยน Password User</a></div>";
    }
    ?>
</div>
