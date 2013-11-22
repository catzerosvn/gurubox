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
    <table style="width: 750px;" class="font13">
        <tr>
            <td class="font18" align="center" colspan="2">
                <B>ใบเสร็จรับเงิน</B>
                <BR><BR>
            </td>
        </tr>
        <tr>
            <td style="width: 500px;"><? echo getResourceImage("guru-box.png", "width=\"140\" height=\"120\"  ") ?></td>
            <td>
                <div style="width: 300px;border: 1px solid #000;border-radius: 5px;height: 100px;margin-left: 10px;text-align: left;padding: 5px;">
                    <table>
                        <tr>
                            <td><B>เลขที่</B></td>
                            <td><div style="border-bottom: 1px dotted #000;width: 200px;" class="font13">&nbsp;&nbsp;&nbsp;<? print_r($billCode); ?></div></td>
                        </tr>
                        <tr>
                            <td style="font-size: 12px;">No.</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><B>วันที่</B></td>
                            <td><div style="border-bottom: 1px dotted #000;width: 200px;" class="font13">&nbsp;&nbsp;&nbsp;<? print_r(date("d/m/Y")); ?></div></td>
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
            <td colspan="2">
                <table border="1" class="table-print font13" cellpadding="5" style="width: 744px;">
                    <tr align="center">
                        <td style="width: 60px;">ลำดับที่<BR>Item</td>
                        <td>รายการสินค้าและบริการ<BR>Description</td>
                        <td style="width: 80px;">จำนวน<BR>Quantity</td>
                        <td style="width: 80px;">ราคา / หน่วย</td>
                        <td style="width: 100px;">จำนวนเงิน (บาท)<BR> Amount</td>
                    </tr>
                    <?
                    $i = 1;
                    $total = 0;
                    $vat = 0;
                    $net = 0;
                    foreach ($data as $val) {
                        echo "
                                    <tr>
                                        <td align=\"center\" height=\"20\">$i</td>
                                        <td>$val[product_name]</td>
                                            <td align=\"center\">$val[quantity]</td>
                                                <td align=\"right\">$val[unit_sale_price]</td>
                                                    <td align=\"right\">" . number_format($val['unit_sale_price'] * $val['quantity'], 2) . "</td>
                                    </tr>
                                ";
                        $i++;
                        $net = ($val['unit_sale_price'] * $val['quantity']) + $net;
                    }

                    if (count($data) < 10) {
                        $row = 10 - count($data);
                        for ($row = $row; $row > 0;) {
                            echo "
                                        <tr>
                                            <td height=\"20\"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    ";
                            $row = $row - 1;
                        }
                    }
                    ?>

                    <tr align="center">
                        <td colspan="2"></td>
                        <td colspan="2" align="left">จำนวนเงิน Total</td>
                        <td align="right"><? echo number_format($net - ($net*0.07),2);?></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2" style="background-color: #eee;"><? echo num2wordsThai($net)."บาท";?></td>
                        <td colspan="2" align="left">ภาษีมูลค่าเพิ่ม Vat 7 %</td>
                        <td align="right"><? echo number_format($net*0.07,2);?></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">รวมเงินทั้งสิ้น (ตัวอักษร)</td>
                        <td colspan="2" align="left">รวมเงินทั้งสิ้น Grand Total</td>
                        <td align="right"><? echo number_format($net,2);?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">

                <!--              ผู้รับเงิน        -->
                <div style="width: 168px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;padding-bottom: 0px;margin-bottom: 0px;">
                    <center>ผู้รับเงิน</center>
                </div>
                <div style="width: 168px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
                    <center>ชำระโดย</center>
                </div>
                <div style="width: 168px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
                    <center>ผู้ตรวจสอบ</center>
                </div>
                <div style="width: 168px;;border: 0px solid #000;border-radius: 5px;height: 15px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
                    <center>ผู้อนุมัติ</center>
                </div>
                <div style="width: 168px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 2px;">
                    <div style="padding: 10px;padding-top: 15px;">
                        <div style="float: left;border-bottom: 1px dotted #000;width: 145px;">&nbsp;</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 135px;">&nbsp;</div><div style="float: left;">)</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 118px;">&nbsp;</div>
                    </div>
                </div>
                <div style="width: 168px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
                    <div style="float: left;border: 1px solid #000;width: 10px;height: 10px;margin-left: 10px;margin-top: 3px;"></div><div style="float: left;margin-left: 10px;">เงินสด</div>
                    <div style="height: 20px;"></div>
                    <div style="float: left;border: 1px solid #000;width: 10px;height: 10px;margin-left: 10px;margin-top: 3px;"></div>
                    <div style="float: left;margin-left: 10px;">เช็คธนาคาร</div>
                    <div style="float: left;border-bottom: 1px dotted #000;width: 75px;">&nbsp;</div>
                    <div style="height: 20px;"></div>
                    <div style="float: left;margin-left: 10px;">สาขา</div>
                    <div style="float: left;border-bottom: 1px dotted #000;width: 128px;">&nbsp;</div>
                    <div style="height: 20px;"></div>
                    <div style="float: left;margin-left: 10px;">เลขที่</div>
                    <div style="float: left;border-bottom: 1px dotted #000;width: 127px;">&nbsp;</div>
                    <div style="height: 20px;"></div>
                    <div style="float: left;margin-left: 10px;">ลงวันที่</div>
                    <div style="float: left;border-bottom: 1px dotted #000;width: 119px;">&nbsp;</div>
                </div>
                <div style="width: 168px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
                    <div style="padding: 10px;padding-top: 15px;">
                        <div style="float: left;border-bottom: 1px dotted #000;width: 145px;">&nbsp;</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 135px;">&nbsp;</div><div style="float: left;">)</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 118px;">&nbsp;</div>
                    </div>
                </div>
                <div style="width: 168px;;border: 1px solid #000;border-radius: 5px;height: 100px;text-align: left;padding: 5px;float: left;margin-left: 6px;">
                    <div style="padding: 10px;padding-top: 15px;">
                        <div style="float: left;border-bottom: 1px dotted #000;width: 145px;">&nbsp;</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">(</div><div style="float: left;border-bottom: 1px dotted #000;width: 135px;">&nbsp;</div><div style="float: left;">)</div>
                    </div>
                    <div style="padding: 10px;padding-top: 20px;">
                        <div style="float: left;">วันที่</div><div style="float: left;border-bottom: 1px dotted #000;width: 118px;">&nbsp;</div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
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

<?

function num2wordsThai($num) {
    $num = str_replace(",", "", $num);
    $num_decimal = explode(".", $num);
    $num = $num_decimal[0];
    $returnNumWord = "";
    $lenNumber = strlen($num);
    $lenNumber2 = $lenNumber - 1;
    $kaGroup = array("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
    $kaDigit = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $kaDigitDecimal = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $ii = 0;
    for ($i = $lenNumber2; $i >= 0; $i--) {
        $kaNumWord[$i] = substr($num, $ii, 1);
        $ii++;
    }
    $ii = 0;
    for ($i = $lenNumber2; $i >= 0; $i--) {
        if (($kaNumWord[$i] == 2 && $i == 1) || ($kaNumWord[$i] == 2 && $i == 7)) {
            $kaDigit[$kaNumWord[$i]] = "ยี่";
        } else {
            if ($kaNumWord[$i] == 2) {
                $kaDigit[$kaNumWord[$i]] = "สอง";
            }
            if (($kaNumWord[$i] == 1 && $i <= 2 && $i == 0) || ($kaNumWord[$i] == 1 && $lenNumber > 6 && $i == 6)) {
                if ($kaNumWord[$i + 1] == 0) {
                    $kaDigit[$kaNumWord[$i]] = "หนึ่ง";
                } else {
                    $kaDigit[$kaNumWord[$i]] = "เอ็ด";
                }
            } elseif (($kaNumWord[$i] == 1 && $i <= 2 && $i == 1) || ($kaNumWord[$i] == 1 && $lenNumber > 6 && $i == 7)) {
                $kaDigit[$kaNumWord[$i]] = "";
            } else {
                if ($kaNumWord[$i] == 1) {
                    $kaDigit[$kaNumWord[$i]] = "หนึ่ง";
                }
            }
        }
        if ($kaNumWord[$i] == 0) {
            if ($i != 6) {
                $kaGroup[$i] = "";
            }
        }
        $kaNumWord[$i] = substr($num, $ii, 1);
        $ii++;
        $returnNumWord.=$kaDigit[$kaNumWord[$i]] . $kaGroup[$i];
    }
    if (isset($num_decimal[1])) {
        $returnNumWord.="จุด";
        for ($i = 0; $i < strlen($num_decimal[1]); $i++) {
            $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1], $i, 1)];
        }
    }
    return $returnNumWord;
}
?>