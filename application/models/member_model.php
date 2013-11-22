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
class member_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function actionCheckMemberIdCard($post) {
        $dataArray = $this->db->select("*")->where("license_number", $post['MemberIdCard'])->get("members")->result_array();
        if (count($dataArray) > 0) {
            return "duplicate";
        } else {
            return "TRUE";
        }
    }

    public function getCareer() {
        $dataArray = $this->db->select("*")->get("ref_careers")->result_array();
        return $dataArray;
    }

    public function actionCheckMemberUser($post) {
        $dataArray = $this->db->select("*")->where("username", $post['MemberUser'])->get("members_accounts")->result_array();
        if (count($dataArray) > 0) {
            return "duplicate";
        } else {
            return "TRUE";
        }
    }

    public function actionAddnewMember($post, $newimage) {
        $birthday = ($post['txt_BornYear']-543) . "-" . $post['txt_BornMonth'] . "-" . $post['txt_BornDay'];

        $this->db->set("member_id", "")
        ->set("prefix_name", $post['txt_prefix'])
        ->set("firstname", $post['txt_memberName'])
        ->set("lastname", $post['txt_memberLastname'])
        ->set("birthdate", $birthday)
        ->set("license_number", $post['txt_memberIDcard'])
        ->set("phone_number", $post['txt_Tel'])
        ->set("email", $post['txt_mail']);

        if ($post['txt_career'] == "OTHER") {
            $this->db->set("career", 999);
            $this->db->set("custom_career", $post['txt_addCareer']);
        } else {
            $this->db->set("career", $post['txt_career']);
            $this->db->set("custom_career", "");
        }

        if ($newimage != "") {
            $this->db->set("picture", $newimage);
        } else {
            $this->db->set("picture", "");
        }

        if ($post['txt_point'] != "") {
            $this->db->set("point", $post['txt_point']);
        } else {
            $this->db->set("point", "0");
        }

        $this->db->insert("members");

        //===================================================================================================
        $dataArray = $this->db->select("member_id")->where("license_number", $post['txt_memberIDcard'])->get("members")->result_array();

        //======================================================
        $this->db->set("ref_member_id", $dataArray[0]['member_id'])
                ->set("username", $post['txt_user'])
                ->set("password", md5("1234"))
                ->set("is_activate", "Y")
                ->set("is_enabled", "Y")
                ->insert("members_accounts");
    }
    
    public function getMemberList($post = "") {
        $limit = 50;

        $this->db->select("*")
                ->join("members_accounts", "members.member_id = members_accounts.ref_member_id", "left");

        if (isset($post['txt_searchType'])) {
            if ($post['txt_searchType'] == "MEMBERCODE") {
                $this->db->like("member_id", $post['txt_key']);
            } else if ($post['txt_searchType'] == "NAME") {
                $this->db->like("firstname", $post['txt_key']);
            } else if ($post['txt_searchType'] == "LASTNAME") {
                $this->db->like("lastname", $post['txt_key']);
            } else if ($post['username'] == "USERNAME") {
                $this->db->like("username", $post['txt_key']);
            }
        }

        $this->db->where("is_enabled", "Y")
                ->order_by("ref_member_id", "DESC");
        
//        $this->db->order_by("member_id", "DESC");

        if (isset($post['txt_page']) and $post['txt_page'] != "1") {
            $startPage = (($post['txt_page'] - 1) * $limit);
            $this->db->limit($limit, $startPage);
        } else {
            $this->db->limit($limit, 0);
        }

        $dataReturn = $this->db->get("members")->result_array();

        return $dataReturn;
    }
    
    public function getMemberList_count($post = "") {
        $this->db->select("*")
                ->join("members_accounts", "members.member_id = members_accounts.ref_member_id", "left");

        if (isset($post['txt_searchType'])) {
            if ($post['txt_searchType'] == "MEMBERCODE") {
                $this->db->like("member_id", $post['txt_key']);
            } else if ($post['txt_searchType'] == "NAME") {
                $this->db->like("firstname", $post['txt_key']);
            } else if ($post['txt_searchType'] == "LASTNAME") {
                $this->db->like("lastname", $post['txt_key']);
            } else if ($post['username'] == "USERNAME") {
                $this->db->like("username", $post['txt_key']);
            }
        }

        $this->db->where("is_enabled", "Y")
                ->order_by("ref_member_id", "DESC");
        
//        $this->db->order_by("ref_member_id", "DESC");
        
        $dataArray = $this->db->get("members")->result_array();

        $dataReturn = count($dataArray);

        return $dataReturn;
    }
    
    public function getMemberData($post) {
        return $this->db->select("*")
                        ->join("members_accounts", "members.member_id = members_accounts.ref_member_id", "left")
                        ->where("ref_member_id", $post['member_id'])
                        ->get("members")->result_array();
    }
    
    public function actionEditMember($post, $newimage) {
        $birthday = ($post['txt_BornYear'] - 543) . "-" . $post['txt_BornMonth'] . "-" . $post['txt_BornDay'];

        $this->db
        ->set("prefix_name", $post['txt_prefix'])
        ->set("firstname", $post['txt_memberName'])
        ->set("lastname", $post['txt_memberLastname'])
        ->set("birthdate", $birthday)
        ->set("phone_number", $post['txt_Tel'])
        ->set("email", $post['txt_mail']);

        if ($post['txt_career'] == "OTHER") {
            $this->db->set("career", 999);
            $this->db->set("custom_career", $post['txt_addCareer']);
        } else {
            $this->db->set("career", $post['txt_career']);
            $this->db->set("custom_career", "");
        }

        if ($newimage != "") {
            $this->db->set("picture", $newimage);
        } 

//        if ($post['txt_point'] != "") {
//            $this->db->set("point", $post['txt_point']);
//        } else {
//            $this->db->set("point", "0");
//        }

        $this->db->where("member_id",$post['txt_memberID'])->update("members");
        
        //======================================================
        $this->db
                ->set("username", $post['txt_user'])
                ->set("is_activate", "Y")
                ->set("is_enabled", "Y")
                ->where("ref_member_id",$post['txt_memberID'])
                ->update("members_accounts");
    }
    
    public function actionDeleteMember($post){
        $this->db
                ->set("is_enabled","N")
                ->set("username","")
                ->where("ref_member_id",$post['member_id'])
                ->update("members_accounts");
        
        $this->db
                ->set("license_number","")
                ->set("email","")
                ->where("member_id",$post['member_id'])
                ->update("members");
    }

}

?>
