<? echo form_open("product/frmActionAddnewProduct", "id=\"formData\" "); ?>
<?php
$weekDay = array('อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสฯ', 'ศุกร์', 'เสาร์');
$thaiMon = array("01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
    "05" => "พฤษภาคม", "06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
    "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");

//Sun - Sat
$month = isset($_GET['month']) ? $_GET['month'] : date('m'); //ถ้าส่งค่าเดือนมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้เดือนปัจจุบัน
$year = isset($_GET['year']) ? $_GET['year'] : date('Y'); //ถ้าส่งค่าปีมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้ปีปัจจุบัน
$selectRoom = isset($_GET['room']) ? $_GET['room'] : "0";
//echo $selectRoom;
//วันที่
$startDay = $year . '-' . $month . "-01";   //วันที่เริ่มต้นของเดือน

$timeDate = strtotime($startDay);   //เปลี่ยนวันที่เป็น timestamp
$lastDay = date("t", $timeDate);   //จำนวนวันของเดือน

$endDay = $year . '-' . $month . "-" . $lastDay;  //วันที่สุดท้ายของเดือน

$startPoint = date('w', $timeDate);   //จุดเริ่มต้น วันในสัปดาห์
?>
<script type='text/javascript'>
    function goTo(month, year){
        window.location.href = httpURL+"selling/frmReserveRoom?year="+ year +"&month="+ month;
        //        window.location.href = "day_of_week.php?year="+ year +"&month="+ month;
    }
    
    function doSelectOnlyRoom(month, year){
        var room = $("#txt_selectOnlyRoom").val();
        window.location.href = httpURL+"selling/frmReserveRoom?year="+ year +"&month="+ month+"&room="+ room;
    }
</script>
<style>
    #tb_calendar th{width:50px;height: 90px; text-align:center}
    #tb_calendar td {
        width:50px;height: 90px; 
        /*text-align:center*/
        background-color: #EEE;
        cursor: pointer;
        vertical-align: top;
    }
    #tb_calendar td:hover{
        background-color: gainsboro;
    }
    #tb_calendar th{
        background-color: #888888;
        height: 50px;
    }
    #tb_calendar, #main{ width : 720px;}
    #main{ 
        /*border : 2px solid #46A5E0;*/
    }
    #nav{
        /*        background-color: #0C79A4;*/
        min-height: 20px;
        padding: 10px;
        text-align: center;
        color : white;
    }
    .navLeft{float: left; }
    .navRight{float: right;}
    .title{float: left; text-align: center; width: 300px;padding-left: 90px;color: black;font-size: 13px;font-weight: bold;}    
</style>
<div class="container_29 font13" style="min-height: 330px;">
    <div class="clear" style="height: 20px;"></div>
    <div class="grid_5" style="color: #FFF;background-color: #2c2d33;padding: 10px 5px 10px 10px;border-radius: 10px;min-height: 250px;">
        <? $this->view("global/frmMenuLeftSelling"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"><? echo getResourceImage("Groupicon.png", ""); ?></div><div  style="float: left;margin-top: 22px;margin-left: 5px;" class="font15"><u><b>ระบบจองห้อง</b></u></div>
        <div style="margin-top: 10px;background-color: #D0D0D0;border-radius: 5px;padding: 10px 20px 10px 20px;min-height: 170px;" class="grid_21 shadow">
            <?php
//            echo "
//ตำแหน่งของวันที่ $startDay คือ <strong>", $startPoint, " (ตรงกับ วัน", $weekDay[$startPoint] . ")</strong>";
//            $title = "เดือน $thaiMon[$month] <strong>" . $startDay . " : " . $endDay . "</strong>";
            $title = "เดือน $thaiMon[$month]" . " " . ($year + 543);

//ลดเวลาลง 1 เดือน
            $prevMonTime = strtotime('-1 month', $timeDate);
            $prevMon = date('m', $prevMonTime);
            $prevYear = date('Y', $prevMonTime);
//เพิ่มเวลาขึ้น 1 เดือน
            $nextMonTime = strtotime('+1 month', $timeDate);
            $nextMon = date('m', $nextMonTime);
            $nextYear = date('Y', $nextMonTime);

            echo '<div id="main">';
            echo '<div id="nav">
  <div class="button-smalldiv" onclick="goTo(\'' . $prevMon . '\', \'' . $prevYear . '\');" style="float: left;width:100px;height:20px;"><< เดือนที่แล้ว</div>
  <div class="title">' . $title . '</div>
  <div class="button-smalldiv" onclick="goTo(\'' . $nextMon . '\', \'' . $nextYear . '\');" style="float: right;width:100px;height:20px;">เดือนต่อไป >></div>
 <BR><BR><BR>
<div style="color:black;">
<b>เลือกห้อง</b>&nbsp;&nbsp;
<select class="textbox" id="txt_selectOnlyRoom" name="txt_selectOnlyRoom" onchange="doSelectOnlyRoom('.$month.','.$year.');">
    <option value="0">เลือกห้องทั้งหมด</option>';
            foreach ($room as $val) {
                if($selectRoom == $val['product_code']){
                    $checked = "selected";                                        
                }else{
                    $checked = "";
                }
                
                echo "<option value=\"$val[product_code]\" $checked>$val[product_name]</option>";
            }
            echo '</select>
</div> 
</div>
 <div style="clear:both"></div>';
            echo "<table id='tb_calendar' class=\"font13\" width=\"720\" cellspacing=\"1\" cellpadding=\"3\" style=\"background-color:#FFF;\">"; //เปิดตาราง
            echo "<tr>
  <th>อาทิตย์</th><th>จันทร์</th><th>อังคาร</th><th>พุธ</th><th>พฤหัสฯ</th><th>ศุกร์</th><th>เสาร์</th>
</tr>";
            echo "<tr>";    //เปิดแถวใหม่
            $col = $startPoint;          //ให้นับลำดับคอลัมน์จาก ตำแหน่งของ วันในสับดาห์
            if ($startPoint < 7) {         //ถ้าวันอาทิตย์จะเป็น 7
                echo str_repeat("<td class=\"tb-hover\"> </td>", $startPoint); //สร้างคอลัมน์เปล่า กรณี วันแรกของเดือนไม่ใช่วันอาทิตย์
            }
            for ($i = 1; $i <= $lastDay; $i++) { //วนลูป ตั้งแต่วันที่ 1 ถึงวันสุดท้ายของเดือน
                $col++;       //นับจำนวนคอลัมน์ เพื่อนำไปเช็กว่าครบ 7 คอลัมน์รึยัง
                echo "<td class=\"tb-hover\" onclick=\"doReserveRoom($i,$month,$year);\">"
                , $i;

                $data = $this->selling_model->getReserveRoomData_Form($i, $month, $year,$selectRoom);
                if (count($data) > 0) {
                    echo "<div style=\"margin-top: 10px;\"></div>";
                    foreach ($data as $val) {
                        echo "<div class=\"font9\" style=\"color:red;\">-" . $val['product_name'] . " " . substr($val['datetime_start'], 11, 5) . "-" . substr($val['datetime_end'], 11, 5) . "</div>";
                    }
                }

                echo "</td>";  //สร้างคอลัมน์ แสดงวันที่
                if ($col % 7 == false) {   //ถ้าครบ 7 คอลัมน์ให้ขึ้นบรรทัดใหม่
                    echo "</tr><tr>";   //ปิดแถวเดิม และขึ้นแถวใหม่
                    $col = 0;     //เริ่มตัวนับคอลัมน์ใหม่
                }
            }
            if ($col < 7) {         // ถ้ายังไม่ครบ7 วัน
                echo str_repeat("<td class=\"tb-hover\"> </td>", 7 - $col); //สร้างคอลัมน์ให้ครบตามจำนวนที่ขาด
            }
            echo '</tr>';  //ปิดแถวสุดท้าย
            echo '</table>'; //ปิดตาราง
            echo '</main>';
            ?>
        </div>
    </div>
</div>
<? echo form_close(); ?>


<div style="display: none;" id="div_reserveRoom"></div>
<div style="display: none;" id="div_cancleReserve" class="font13">
    <center>ยืนยันการยกเลิการจองห้อง</center>
</div>
<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>