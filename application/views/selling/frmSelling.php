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
        <? $this->view("global/frmMenuLeftSelling"); ?>
    </div>
    <div class="grid_22" style="border-left: 1px solid #999;margin-left: 10px;padding-left: 10px;">
        <div style="float: left;"></div><div  style="float: left;margin-top: 22px;margin-left: 5px;min-height: 260px;" class="font15"></div>
        
    </div>
</div>
<? echo form_close(); ?>

<div style="display: none;" id="div_loading_centerpage"><center><? echo getResourceImage("loading_2.gif"); ?></center></div>
