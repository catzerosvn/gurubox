<!--<form id="formData" action="frmActionAddnewMember" method="post" enctype="multipart/form-data">-->
<?
$SellingMemberID="";
$SellingMemberName="";
if($this->session->userdata("MemberSelling")){
    foreach ($this->session->userdata("MemberSelling") as $val){
        $SellingMemberID = $val['sellingMemberID'];
        $SellingMemberName = $val['sellingMemberName'];
    }
}
?>
<? echo form_open("selling/frmSaveSelling", "id=\"formData\" "); ?>
<div class="container_29 font13" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftSelling"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>ระบบขายสินค้า</b></u></div>
        <div style="margin-top: 10px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 20px 10px 20px;min-height: 170px;" class="grid_21 shadow">                  
            <div class="grid_15" style="width:485px;">                
                <div style="float: left;">
                    Member : <input type="text" class="textbox" id="txt_memberNameSelling" name="txt_memberNameSelling" readonly value="<?=$SellingMemberName;?>" style="width: 205px;">
                    <div class="button_backend1" style="cursor: pointer;margin-bottom: 10px;" onclick="doSelectMember();">เลือก Member</div>
                    <input type="hidden" id="txt_member_id_select" name="txt_member_id_select" value="<?=$SellingMemberID;?>">
                </div>                    
                <div class="button_backend1" style="cursor: pointer;float: right;margin-right: 25px;margin-bottom: 10px;" onclick="doAddProduct();">เพิ่มสินค้า</div>            
                <BR><BR>
                <?
                if (count($data) <= 0) {
                    
                } else {
                    ?>
                    <table width="460"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                        <tr class="tb-header" style="text-align: center;">
                            <td width="100">Product Code</td>
                            <td width="200">ชื่อ Product</td>
                            <td width="80">ราคาขาย</td>
                            <td width="80">จำนวน</td>
                            <td width="80">ราคารวม</td>
                        </tr>
                        <?
                        $i = 0;
                        $total_all = 0;
                        foreach ($data as $val) {
                            $total = number_format($val['sellingQty'] * $val['product_sale'], 2);

                            echo "<tr class=\"tb-hover\">";
                            echo "<td align=\"center\">$val[product_code]</td>";
                            echo "<td align=\"\">$val[product_name]</td>";
                            echo "<td align=\"right\">$val[product_sale]</td>";
                            echo "<td align=\"center\">$val[sellingQty]</td>";
                            echo "<td align=\"right\">$total</td>";
                            echo "</tr>";

                            $i++;
                            $total_all = $total_all + $total;
                        }
                        ?>
                    </table>
                <? } ?>
            </div>
            <div class="grid_5" style="width:220px;border-left: 1px solid #FFF;padding-left: 10px;">
                <table width="100%" class="font15">
                    <tr>
                        <td valign="bottom" width="65">รวม</td>
                        <td valign="bottom"><input type="text" style="width: 100px;" class="textbox font16-textbox" readonly value="<? if(isset($i)){echo $i;} ?>"></td>
                        <td valign="bottom">รายการ</td>
                    </tr>
                    <tr>
                        <td valign="bottom">รวม</td>
                        <td valign="bottom"><input type="text" style="width: 100px;" class="textbox font16-textbox" readonly value="<? if(isset($total_all)){echo number_format($total_all, 2);} ?>"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td colspan="3" height="10"></td>
                    </tr>
                    <tr>
                        <td valign="bottom">VAT 7%</td>
                        <td valign="bottom"><input type="text" style="width: 100px;" class="textbox font16-textbox" readonly value="<? if(isset($total_all)){echo number_format($total_all * 0.07, 2);} ?>"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td valign="bottom">รวมเงิน</td>
                        <td valign="bottom"><input type="text" style="width: 100px;" class="textbox font16-textbox" readonly value="<? if(isset($total_all)){echo number_format($total_all - ($total_all * 0.07), 2);} ?>"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td valign="bottom">ส่วนลด</td>
                        <td valign="bottom"><input type="text" style="width: 100px;" class="textbox font16-textbox" readonly value="<? echo number_format(0, 2); ?>"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td valign="bottom">ยอดสุทธิ</td>
                        <td valign="bottom"><input type="text" style="width: 100px;color: red;" class="textbox font16-textbox" readonly value="<? if(isset($total_all)){echo number_format($total_all, 2);} ?>" id="txt_totalAll" name="txt_totalAll"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td colspan="3" height="10"></td>
                    </tr>
                    <tr>
                        <td valign="bottom">รับเงิน</td>
                        <td valign="bottom"><input type="text" style="width: 100px;color: blue" class="textbox font16-textbox" value="0" onkeyup="doReturnMoney();" id="txt_money" name="txt_money"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td valign="bottom">ทอนเงิน</td>
                        <td valign="bottom"><input type="text" style="width: 100px;color: green" class="textbox font16-textbox" readonly value="0.00" id="txt_return" name="txt_return"></td>
                        <td valign="bottom">บาท</td>
                    </tr>
                    <tr>
                        <td colspan="3" height="20"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <div class="button-smalldiv" style="width: 120px;height: 40px;padding-top: 5px;padding-bottom: 5px;" onclick="doSaveSelling();"><? echo getResourceImage("save-icon99.png", "width=\"20\" height=\"20\" ") ?>
                                <div style="font-size: 14px;font-weight: bold;padding-top: 5px;">บันทึกการขาย</div></div>
                        </td>
                    </tr>
                </table>                
            </div>            
        </div>
    </div>
</div>
<? echo form_close(); ?>

<div style="display: none;" id="div_addProduct" class="font13">
    <BR>
    <div>
        <input style="width: 300px;" class="textbox" onkeyup="doSearchProduct();" id="txt_key" name="txt_key">
        <input type="button" value="ค้นหา" class="button_backend1"  onclick="doSearchProduct();">
        &nbsp;&nbsp;
        <input type="button" value="แสดงทั้งหมด" class="button_backend1" onclick="doShowAllProduct();">
    </div>
    <BR>
    <div id="div_productList"></div>
</div>
<div style="display: none;" id="div_stockAdd"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
<div style="display: none;" id="div_showBill"></div>
<div style="display: none;" id="div_selectMember"></div>
<iframe id="ifrm" name="ifrm" style="display: none;"></iframe>
