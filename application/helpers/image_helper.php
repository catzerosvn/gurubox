<?php
//
//function get_theme_image($file_path,$extra = ""){
//    return '<img src="'.base_url()."resources/images/".$file_path.'" border="0"  '.$extra.' />';
//}

function getResourceImage($file_path,$extra = ""){
    return '<img src="'.base_url()."resources/images/".$file_path.'" border="0"  '.$extra.' />';
}

function getResourceImageMember($file_path,$extra = ""){
    return '<img src="'.base_url()."imagemembers/".$file_path.'" border="0"  '.$extra.' />';
}

?>
