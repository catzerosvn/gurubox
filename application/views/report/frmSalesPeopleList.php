<?
if (count($data) <= 0) {
    echo "<BR><BR><BR><center>ไม่มีข้อมูลการขายในช่วงเวลานี้</center>";
} else {
    ?>
    <table width="720"  cellpadding="3" cellspacing="1" class="font13" style="background-color:#FFF;">
        <tr class="tb-header" style="text-align: center;">
            <td>รหัสพนักงาน</td>
            <td>พนักงาน</td>
            <td>จำนวนเงิน</td>
            <td>คำสั่ง</td>
        </tr>
        <?
        foreach ($data as $val) {
            echo "
                        <tr class=\"tb-hover\">
                        <td align=\"center\">$val[create_by_id]</td>
                        <td align=\"center\">$val[create_by]</td>
                        <td align=\"right\">$val[totalselling]</td>
                        <td align=\"center\"><div class=\"button-smalldiv\" onclick=\"doReportSalespeopleDetail('$val[create_by_id]');\" style=\"width: 70px;\">ดูรายละเอียด</div></td>
                        </tr>
                    ";
        }
        ?>
    </table>
    <input type="hidden" name="txt_hiddenDateStart" id="txt_hiddenDateStart" value="<?= $post['txt_dateStart']; ?>">
    <input type="hidden" name="txt_hiddenDateEnd" id="txt_hiddenDateEnd" value="<?= $post['txt_dateEnd']; ?>">

    <div id="div_print" style="display: none;">
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
            .tb-header-print td{
                background: #D0D0D0;
            }
        </style>
        <table width="500"  cellpadding="3" cellspacing="1" class="table-print font13" style="background-color:#FFF;" border="1">
            <tr class="tb-header-print" style="text-align: center;">
                <td style="background-color: #D0D0D0;">รหัสพนักงาน</td>
                <td style="background-color: #D0D0D0;">พนักงาน</td>
                  <td style="background-color: #D0D0D0;">จำนวนเงิน</td>
                </tr>
                <?
                foreach ($data as $val) {
                    echo "
                        <tr class=\"tb-hover\">
                        <td align=\"center\">$val[create_by_id]</td>
                        <td align=\"center\">$val[create_by]</td>
                        <td align=\"right\">$val[totalselling]</td>
                        </tr>
                    ";
                }
                ?>
            </table>
        </div>

        <div style="display: none;">
            <? echo form_open("report/frmExportXls", "id=\"formExportXls\" "); ?>
        <textarea id="txt_data2xls" name="txt_data2xls"></textarea>
        <input name="txt_titlereport" type="text" value="รายงานยอดขายรายคน">
        <? echo form_close(); ?>
    </div>
    <?
}?>