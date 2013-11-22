<select class="textbox" id="txt_pricerate" name="txt_pricerate">
    <?
        foreach ($data as $val){
            echo "<option value=\"$val[row_id]\">$val[time_name] ($val[product_sale])</option>";
        }
        
        if(count($data) <= 0){
            echo "<option value=\"0\">กรุณาเลือกระยะเวลา</option>";
        }
    ?>
</select>