<!--<form id="formData" action="frmActionAddnewMember" method="post" enctype="multipart/form-data">-->
<? echo form_open("product/frmActionAddnewProduct", "id=\"formData\" "); ?>
<div class="container_29 font13" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftSelling"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>ระบบขายสินค้า</b></u></div>
        <div style="margin-top: 10px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 20px 10px 20px;min-height: 170px;" class="grid_21 shadow">
            <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                <tr class="tb-header" style="text-align: center;">
                    <td>เลขที่บิล</td>
                    <td>วันที่ออกบิล</td>
                    <td>จำนวนเงิน</td>
                    <td>ผู้ทำรายการ</td>
                    <td>Member</td>
                    <td colspan="2">คำสั่ง</td>
                </tr>
                <?
                foreach ($data as $val) {
                    echo "
                        <tr class=\"tb-hover\">
                        <td align=\"center\">$val[billing_code]</td>
                        <td align=\"center\">$val[billing_date]</td>
                        <td align=\"right\">$val[total_amount]</td>
                        <td>$val[create_by]</td>
                        <td>$val[firstname]  $val[lastname]</td>
                        <td align=\"center\"><div class=\"button-smalldiv\" onclick=\"doCancleBill('$val[billing_code]');\">ยกเลิก</div></td>
                        <td align=\"center\"><div class=\"button-smalldiv\" onclick=\"doViewBill('$val[billing_code]');\" style=\"width: 70px;\">ดูรายละเอียด</div></td>
                        </tr>
                    ";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<? echo form_close(); ?>

<div style="display: none;" id="div_showBill"></div>
<div style="display: none;" id="div_cancleBill" class="font13"><center>ยกเลิกการขายบิลนี้</center></div>
<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
