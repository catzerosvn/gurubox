<style>
    .table-print
        {  
            border-collapse:collapse; 
        }
        .table-print td
        { 
            border:1px solid black;
        }
        
        .tb-header2 td{
            background-color: #524C52;
            color: #FFF;
            height: 30px;
            text-align: center;
            font-weight: bold;
        }
</style>
<? echo form_open("product/frmActionAddnewProduct", "id=\"formData\" "); ?>
<div class="container_29" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftProduct"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มข้อมูล Product ใหม่</b></u></div>
        <div style="margin-top: 10px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 50px;" class="shadow grid_21">
            <div class="grid_11">
                <table width="650" class="font13">
                    <tr>
                        <td width="120" align="right" valign="bottom">ประเภท Product</td>
                        <td width="15" align="center" valign="bottom"><font color="red">*</font></td>
                        <td>
                            <select id="txt_productType" name="txt_productType" class="textbox" onchange="doSelectTypeProduct();">
                                <option value="0">กรุณาเลือกประเภท Product</option>
                                <?
                                foreach ($producttype as $val) {
                                    echo "<option value=\"$val[product_type_id]\">$val[product_type]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr style="display: none;">
                        <td align="right" valign="bottom">สาขา</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 200px;" name="txt_branch" id="txt_branch" class="textbox" value="GB1"></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom">ชื่อ Product</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 200px;" name="txt_productName" id="txt_productName" class="textbox"></td>
                    </tr>                
                    <tr>
                        <td align="right" valign="top" style="padding-top: 5px;">รายละเอียด Product</td>
                        <td align="center" valign="top" style="padding-top: 5px;"><font color="red"></font></td>
                        <td>
                            <textarea style="width: 200px;height: 100px;" name="txt_productDetail" id="txt_productDetail" class="textbox"></textarea>
                        </td>
                    </tr>
                    <tr id="div_numday" style="display: none;">
                        <td align="right" valign="top" style="padding-top: 5px;">ระยะเวลา</td>
                        <td align="center" valign="top" style="padding-top: 5px;"><font color="red">*</font></td>
                        <td><input type="text" style="width: 100px;" name="txt_numday" id="txt_numday" class="textbox">&nbsp;วัน</td>
                    </tr>
                    <tr id="div_cost_tr">
                        <td align="right" valign="bottom">ราคาทุน</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 100px;" name="txt_cost" id="txt_cost" class="textbox">&nbsp;บาท</td>
                    </tr>
                    <tr id="div_sale_tr">
                        <td align="right" valign="bottom">ราคาขาย</td>
                        <td align="center" valign="bottom"><font color="red">*</font></td>
                        <td><input type="text" style="width: 100px;" name="txt_sale" id="txt_sale" class="textbox">&nbsp;บาท</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><span id="div_loading"></span></td>
                    </tr>
                    <tr>
                        <td align="right" valign="bottom" height="40"></td>
                        <td align="center" valign="bottom"></td>
                        <td valign="bottom">
                            <input type="button" value="เพิ่มข้อมูล" class="button_backend1" onclick="doAddNewProduct();">
                            &nbsp;
                            <input type="reset" value="ล้างข้อมูล" class="button_backend1">                        
                        </td>
                    </tr>
                </table>
            </div>
            <div class="grid_9 font13" id="div_priceRoom" style="display: none;">
                <center><B>ตารางราคาค่าเช่า</B></center><BR>
                <table class="table-print">                    
                    <tr class="tb-header2">
                        <td>ระยะเวลา</td>
                        <td>ราคาทุน</td>
                        <td>ราคาขาย</td>                        
                    </tr>                    
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_1"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_1"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_1"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_2"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_2"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_2"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_3"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_3"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_3"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_4"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_4"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_4"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_5"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_5"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_5"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_6"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_6"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_6"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_7"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_7"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_7"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_8"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_8"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_8"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_9"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_9"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_9"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="textbox" style="width: 100px;" name="txt_timename_10"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_cost_10"></td>
                        <td><input type="text" class="textbox" style="width: 100px;text-align: right;" name="txt_time_sale_10"></td>
                    </tr>                    
                </table>
            </div>
        </div>
    </div>
</div>
<? echo form_close(); ?>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
