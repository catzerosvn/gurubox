<?php

header('Content-Type: text/html; charset=utf-8');
$hword = $txt_titlereport;
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=" ' . $hword . ' " ');

echo "
<html xmlns:o = \"urn:schemas-microsoft-com:office:office\"
      xmlns:x = \"urn:schemas-microsoft-com:office:excel\"
      xmlns = \"http://www.w3.org/TR/REC-html40\">
    <HTML>
        <HEAD>
            <meta http-equiv = \"Content-type\" content = \"text/html;charset=utf-8\" />
        </HEAD><BODY>";
            
echo $txt_data2xls;

echo "</BODY>
        </HTML>
        ";
?>