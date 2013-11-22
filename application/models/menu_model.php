<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of signin_model
 *
 * @author Administrator
 */
class menu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function checkMenu($menu_id){
        $group_id = $this->session->userdata("SESSION_USER_GROUP_ID");
        $dataArray = $this->db->select("*")->where("ref_groups_id",$group_id)->where("ref_menu_id",$menu_id)->get("groups_permission")->result_array();
        //print_r($group_id);
        if(count($dataArray) > 0 or $group_id == 1){
            $dataMenu = $this->db->select("*")->where("menu_id",$menu_id)->get("menus_items")->result_array();
            return "<div class=\"menu_left\"><a href=\"".site_url($dataMenu[0]['menu_link'])."\">".$dataMenu[0]['menu_name']."</a></div>";
        }else{
            return "";
        }
    }
    
}

?>
