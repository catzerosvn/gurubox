<div id="print_area">
    <style>        
        .table-print
        {  
            border-collapse:collapse; 
        }
        .table-print td
        { 
            border:1px solid black;
        }
        .font13{
            font-family: Arial;
            font-size: 13px;
        }
        .font18{
            font-family: Arial;
            font-size: 18px;
        }
    </style>
    <div style="width: 800px;" class="font13">
        <table width="100%">
            <tr>
                <td class="font18" align="center">
                    <B>ใบเสร็จรับเงิน / ใบกำกับภาษี</B> <BR>RECEIPT / TAX INVOICE
                </td>
            </tr>
            <tr>
                <td height="10"></td>
            </tr>
            <tr>
                <td class="font18" align="center">
                    <!--   ชื่อ ที่อยู่    -->
                    <div style="float: left;width: 450;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;">
                        <table>
                            <tr>
                                <td><B>ชื่อ</B></td>
                                <td><div style="border-bottom: 1px dotted #000;width: 300px;">&nbsp;</div></td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">Name</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><B>ที่อยู่</B></td>
                                <td><div style="border-bottom: 1px dotted #000;width: 380px;">&nbsp;</div></td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">Address</td>
                                <td><div style="border-bottom: 1px dotted #000;width: 380px;">&nbsp;</div></td>
                            </tr>
                        </table>
                    </div>
                    <!--   เลขที่ วันที่    -->
                    <div style="float: left;width: 300;border: 1px solid #000;border-radius: 5px;height: 100px;margin-left: 10px;text-align: left;padding: 5px;">
                        <table>
                            <tr>
                                <td><B>เลขที่</B></td>
                                <td><div style="border-bottom: 1px dotted #000;width: 200px;">&nbsp;</div></td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">No.</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><B>วันที่</B></td>
                                <td><div style="border-bottom: 1px dotted #000;width: 200px;">&nbsp;</div></td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">Date</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <!--   รายการสินค้า   -->
                    <table style="width: 784px;" border="1" class="table-print font13" cellpadding="5">
                        <tr align="center">
                            <td style="width: 60px;">ลำดับที่<BR>Item</td>
                            <td>รายการสินค้าและบริการ<BR>Description</td>
                            <td style="width: 80px;">จำนวน<BR>Quantity</td>
                            <td style="width: 80px;">ราคา / หน่วย</td>
                            <td style="width: 100px;">จำนวนเงิน (บาท)<BR> Amount</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td align="left">XXXXXX</td>
                            <td>2</td>
                            <td>20</td>
                            <td>40.00</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td align="left">XXXXXX</td>
                            <td>2</td>
                            <td>20</td>
                            <td>40.00</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td align="left">XXXXXX</td>
                            <td>2</td>
                            <td>20</td>
                            <td>40.00</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td align="left">XXXXXX</td>
                            <td>2</td>
                            <td>20</td>
                            <td>40.00</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td align="left">XXXXXX</td>
                            <td>2</td>
                            <td>20</td>
                            <td>40.00</td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"></td>
                            <td colspan="2" align="left">จำนวนเงิน Total</td>
                            <td>0.00</td>
                        </tr>
                        <tr align="center">
                            <td colspan="2" style="background-color: #eee;"></td>
                            <td colspan="2" align="left">ภาษีมูลค่าเพิ่ม Vat 7 %</td>
                            <td>0.00</td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">รวมเงินทั้งสิ้น (ตัวอักษร)</td>
                            <td colspan="2" align="left">รวมเงินทั้งสิ้น Grand Total</td>
                            <td>0.00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!--              ผู้รับเงิน        -->
        <div style="width: 180px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;padding-bottom: 0px;margin-bottom: 0px;">
            <center>ผู้รับเงิน</center>
        </div>
        <div style="width: 180px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
            <center>ชำระโดย</center>
        </div>
        <div style="width: 180px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
            <center>ผู้ตรวจสอบ</center>
        </div>
        <div style="width: 180px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
            <center>ผู้ตรวจสอบ</center>
        </div>
        <div style="width: 180px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
            <div style="padding: 10px;padding-top: 15px;">
                <div style="float: left;border-bottom: 1px dotted #000;width: 160px;">&nbsp;</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 150px;">&nbsp;</div><div style="float: left;">)</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 133px;">&nbsp;</div>
            </div>
        </div>
        <div style="width: 180px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
            <div style="float: left;border: 1px solid #000;width: 10px;height: 10px;margin-left: 10px;margin-top: 3px;"></div><div style="float: left;margin-left: 10px;">เงินสด</div>
            <div style="height: 20px;"></div>
            <div style="float: left;border: 1px solid #000;width: 10px;height: 10px;margin-left: 10px;margin-top: 3px;"></div>
            <div style="float: left;margin-left: 10px;">เช็คธนาคาร</div>
            <div style="float: left;border-bottom: 1px dotted #000;width: 85px;">&nbsp;</div>
            <div style="height: 20px;"></div>
            <div style="float: left;margin-left: 10px;">สาขา</div>
            <div style="float: left;border-bottom: 1px dotted #000;width: 139px;">&nbsp;</div>
            <div style="height: 20px;"></div>
            <div style="float: left;margin-left: 10px;">เลขที่</div>
            <div style="float: left;border-bottom: 1px dotted #000;width: 137px;">&nbsp;</div>
            <div style="height: 20px;"></div>
            <div style="float: left;margin-left: 10px;">ลงวันที่</div>
            <div style="float: left;border-bottom: 1px dotted #000;width: 129px;">&nbsp;</div>
        </div>
        <div style="width: 180px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
            <div style="padding: 10px;padding-top: 15px;">
                <div style="float: left;border-bottom: 1px dotted #000;width: 160px;">&nbsp;</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 150px;">&nbsp;</div><div style="float: left;">)</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 133px;">&nbsp;</div>
            </div>
        </div>
        <div style="width: 180px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
            <div style="padding: 10px;padding-top: 15px;">
                <div style="float: left;border-bottom: 1px dotted #000;width: 160px;">&nbsp;</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 150px;">&nbsp;</div><div style="float: left;">)</div>
            </div>
            <div style="padding: 10px;padding-top: 20px;">
                <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 133px;">&nbsp;</div>
            </div>
        </div>
    </div>    
</div>
<div class="clear"></div>
<div style="width: 785px;" class="font13">
    <table width="100%">
        <tr>
            <td height="30"></td>
        </tr>
        <tr>
            <td align="right">
                <div class="button-smalldiv" style="width: 120px;height: 45px;background-color: #cccccc" onclick="doPrintBill();"><? echo getResourceImage("print-icon99.png", "") ?></div>
            </td>
        </tr>
    </table>
</div>