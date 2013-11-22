<form id="formData">
    <div class="container_29" style="min-height: 330px;">
        <div class="clear" style="height: 20px;"></div>
        <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
            <? $this->view("global/frmMenuLeftProduct"); ?>
        </div>
        <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
            <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>การจัดการเพิ่มข้อมูล Staff ใหม่</b></u></div>
            <div style="margin-top: 70px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 10px 10px 10px;min-height: 170px;padding-left: 20px;" class="shadow">
                <div class="font13" style="margin-bottom: 20px;">
                    <div style="float: left;">
                        <input class="textbox" style="width: 350px;" style="float: left;" id="txt_key" name="txt_key">
                    </div>
                    <div style="float: left;margin-top: 0px;margin-left: 0px;">
                        <select class="textbox" id="txt_searchType" name="txt_searchType" style="height: 29px;">                            
                            <option value="NAME">ค้นหาจากชื่อ Product</option>
                            <option value="PRODUCTCODE">ค้นหาจาก Product Code</option>
                        </select>
                    </div>
                   <!--<input type="button" value="ค้นหา" class="button_backend1" style="margin-left: -5px;">-->
                    <div style="float: left;font-size: 13px;width: 70px;height: 20px;margin-left: 0px;" class="button-smalldiv" onclick="doSerachProduct();">ค้นหา</div>
                </div>
                <div id="div_showData">
                    <?
                    if (count($data) <= 0) {
                        ?>
                        <div style="min-height: 70px;margin-top: 100px;" class="font13"><center>ไม่มีข้อมูล Product</center></div>
                        <?
                    } else {
                        ?>
                        <div style="height: 20px;"></div>
                        <div id="div_dataTable">
                            <table width="650"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
                                <tr class="tb-header" style="text-align: center;">
                                    <td width="70">รหัส Import</td>
                                    <td width="100">วันที่</td>
                                    <td width="200">พนักงานที่เพิ่มจำนวนสินค้า</td>
                                    <td colspan="">คำสั่ง</td>
                                </tr>
                                <?
                                foreach ($data as $val) {
                                    echo "<tr class=\"tb-hover\">";
                                    echo "<td align=\"center\">$val[product_import_id]</td>";
                                    echo "<td align=\"center\">$val[import_date]</td>";
                                    echo "<td align=\"\">$val[firstname] $val[lastname]</td>"; 
                                    echo "<td align=\"center\" width=\"50\"><div id=\"\" class=\"button-smalldiv\" onclick=\"doShowDetailImportProduct('$val[product_import_id]');\" style=\"width: 100px;\">ดูรายละเอียด / ลบ</div></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="div_showImportProduct" style="display: none;"></div>
    <div id="div_deleteImportProduct" style="display: none;" class="font13" title="ยืนยันยกเลิก Import Product ">
        <br><center>กรุณายืนยันการยกเลิก Import Product</center>
        <div id="div_loading_delete"></div>
    </div>
</form>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif");?></center></div>