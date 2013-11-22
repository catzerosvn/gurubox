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
class signin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getSignin($post) {
        $dataArray = $this->db->select("*")
                        ->where("username", $post['txtUsername'])
                        ->where("password", md5($post['txtPassword']))
                        ->where("is_enabled", "Y")
                        ->get("employees_accounts")->result_array();

        if (count($dataArray) > 0) {
            $id = $dataArray[0]['ref_employee_code'];

            $this->db->set("last_login", date("Y-m-d H:i:s"))
                    ->where("ref_employee_code", $id)
                    ->update("employees_accounts");

            $this->session->set_userdata("SESSION_USER_ID", $id);

            $data_user = $this->db->select("*")->where("employee_code", $id)->get("employees")->result_array();

            $this->session->set_userdata("SESSION_FULLNAME", $data_user[0]['firstname'] . " " . $data_user[0]['lastname']);

            $data_group = $this->db->select("*")->where("group_id", $dataArray[0]['ref_group_id'])->get("groups_users")->result_array();

            $this->session->set_userdata("SESSION_USER_GROUP_ID", $data_group[0]['group_id']);
            $this->session->set_userdata("SESSION_USER_GROUP", $data_group[0]['group_name']);
            $this->session->set_userdata("SYS_GUID", rand(0, 100));

            return "TRUE";
        } else {
            return "0";
        }
    }

}

?>
