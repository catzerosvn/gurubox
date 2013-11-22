<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title><?php echo $layout['pageTitle']; ?></title>
            <script type="text/javascript">
                var httpURL = '<?php echo $layout['httpURL'] . "index.php/"; ?>';
                var loading_2 = '<?php echo getResourceImage("loading_2.gif", "width=\"150\" height=\"80\" "); ?>';
                var loading_small = '<?php echo getResourceImage("ajax-loader.gif", "width=\"15\" height=\"15\" "); ?>';
                var loading_bar = '<?php echo getResourceImage("ajax-loader_bar.gif"); ?>';
            </script>
            <link rel="icon" type="image/ico" href="<?php echo base_url()."resources/icons/favicon.ico"; ?>" />
            <?php echo $layout['pageScript']; ?>
            
    </head>
    <body style="background-color: #ffffff;">
        <div class="wrapper-top">
            <div class="top-bg" style="height: 70px;width: 100%;">
                <div class="container_29">
                    <div class="grid_9" style="margin-top: 0px;"><?php echo getResourceImage("guru_logo.png"); ?></div>
                    <div class="grid_15" style="margin-top: 13px;"><?php echo $layout['htmlMenu']; ?></div>
<!--                    <div class="grid_5 font-welcome" style="float: right;margin-top: 15px;margin-right: 10px;text-align: right;">Welcome</div>-->
                </div>
            </div>
        </div>
        <div style="width: 100%;height:30px;background-color: #cccccc;border-bottom:1px solid #A4A4A4;border-top:1px solid #f3f3f3;"></div>
        <div class="wrapper-content">
            <?php
            echo $layout['htmlContent'];
            ?>
        </div>
        <?php require_once 'footerInc.php'; ?>
    </body>
</html>
