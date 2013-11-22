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
class staff_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getGroupList() {
        return $this->db->select("*")->order_by("group_id", "DESC")->get("groups_users")->result_array();
    }

    public function actionAddNewGroupStaff($post) {
        $this->db->set("group_id", "")
                ->set("group_name", $post['txt_groupname'])
                ->insert("groups_users");

        $dataReturn = $this->getGroupList();

        return $dataReturn;
    }

    public function actionEditGroupStaff($post) {
        $this->db->set("group_name", $post['txt_groupname'])
                ->where("group_id", $post['txt_groupid'])
                ->update("groups_users");

        $dataReturn = $this->getGroupList();

        return $dataReturn;
    }

    public function actionDeleteGroupStaff($post) {
        $this->db->where("group_id", $post['id'])->delete("groups_users");

        $dataReturn = $this->getGroupList();

        return $dataReturn;
    }

    public function actionCheckEmpCode($post) {
        $dataArray = $this->db->select("*")->where("employee_code", $post['EmpCode'])->get("employees")->result_array();
        if (count($dataArray) > 0) {
            return "duplicate";
        } else {
            return "OK";
        }
    }

    public function actionCheckEmpIdCard($post) {
        $dataArray = $this->db->select("*")->where("license_number", $post['EmpIdCard'])->get("employees")->result_array();
        if (count($dataArray) > 0) {
            return "duplicate";
        } else {
            return "OK";
        }
    }

    public function actionCheckEmpUser($post) {
        $dataArray = $this->db->select("*")->where("username", $post['EmpUser'])->get("employees_accounts")->result_array();
        if (count($dataArray) > 0) {
            return "duplicate";
        } else {
            return "OK";
        }
    }

    public function actionAddNewStaff($post) {
        $year = $post["txt_BornYear"] - 543;
        $birthday = $year . "-" . $post['txt_BornMonth'] . "-" . $post['txt_BornDay'];

        $dataArray = $this->db->set("employee_code", $post['txt_empCode'])
                ->set("firstname", $post['txt_empName'])
                ->set("lastname", $post['txt_empLastname'])
                ->set("birthdate", $birthday)
                ->set("license_number", $post['txt_empIDcard'])
                ->set("phone_number", $post['txt_Tel'])
                ->insert("employees");

        if ($dataArray) {
            $dataArray2 = $this->db->set("ref_employee_code", $post['txt_empCode'])
                    ->set("ref_group_id", $post['txt_group'])
                    ->set("username", $post['txt_user'])
                    ->set("password", md5("1234"))
                    ->set("is_enabled", "Y")
                    ->insert("employees_accounts");
            if ($dataArray2) {
                return "TRUE";
            } else {
                return "ERROR";
            }
        } else {
            return "ERROR";
        }
    }

    public function getEmployeeList($post = "") {
        $limit = 50;

        $this->db->select("*")
                ->join("employees_accounts", "employees_accounts.ref_employee_code = employees.employee_code", "left")
                ->join("groups_users", "groups_users.group_id = employees_accounts.ref_group_id", "left");

        if (isset($post['txt_searchType'])) {
            if ($post['txt_searchType'] == "STAFFCODE") {
                $this->db->like("ref_employee_code", $post['txt_key']);
            } else if ($post['txt_searchType'] == "NAME") {
                $this->db->like("firstname", $post['txt_key']);
            } else if ($post['txt_searchType'] == "LASTNAME") {
                $this->db->like("lastname", $post['txt_key']);
            } else if ($post['username'] == "USERNAME") {
                $this->db->like("ref_employee_code", $post['txt_key']);
            }
        }

        $this->db->where("is_enabled", "Y")
                ->order_by("ref_employee_code", "DESC");

        if (isset($post['txt_page']) and $post['txt_page'] != "1") {
            $startPage = (($post['txt_page'] - 1) * $limit);
            $this->db->limit($limit, $startPage);
        } else {
            $this->db->limit($limit, 0);
        }

        $dataReturn = $this->db->get("employees")->result_array();

        return $dataReturn;
    }

    public function getEmployeeList_count($post = "") {
        $this->db->select("*")
                ->join("employees_accounts", "employees_accounts.ref_employee_code = employees.employee_code", "left")
                ->join("groups_users", "groups_users.group_id = employees_accounts.ref_group_id", "left");

        if (isset($post['txt_searchType'])) {
            if ($post['txt_searchType'] == "STAFFCODE") {
                $this->db->like("ref_employee_code", $post['txt_key']);
            } else if ($post['txt_searchType'] == "NAME") {
                $this->db->like("firstname", $post['txt_key']);
            } else if ($post['txt_searchType'] == "LASTNAME") {
                $this->db->like("lastname", $post['txt_key']);
            } else if ($post['username'] == "USERNAME") {
                $this->db->like("ref_employee_code", $post['txt_key']);
            }
        }

        $this->db->where("is_enabled", "Y")
                ->order_by("ref_employee_code", "DESC");
        $dataArray = $this->db->get("employees")->result_array();

        $dataReturn = count($dataArray);

        return $dataReturn;
    }

    public function getEmployeeData($post) {
        return $this->db->select("*")
                        ->join("employees_accounts", "employees_accounts.ref_employee_code = employees.employee_code", "left")
                        ->join("groups_users", "groups_users.group_id = employees_accounts.ref_group_id", "left")
                        ->where("ref_employee_code", $post['staff_id'])
                        ->get("employees")->result_array();
    }

    public function actionEditStaff($post) {
        $empCode = $post['txt_empCode_test'];
        $empName = $post['txt_empName'];
        $empLastname = $post['txt_empLastname'];
        $BornDay = $post['txt_BornDay'];
        $BornMonth = $post['txt_BornMonth'];
        $BornYear = $post['txt_BornYear'];
        $birthday = $BornYear . "-" . $BornMonth . "-" . $BornDay;
        $Tel = $post['txt_Tel'];
        $user = $post['txt_user'];
        $group_id = $post['txt_group'];

        $dataArray = $this->db->set("firstname", $empName)
                ->set("lastname", $empLastname)
                ->set("birthdate", $birthday)
                ->set("phone_number", $Tel)
                ->where("employee_code", $empCode)
                ->update("employees");

        if ($dataArray) {
            $dataArray2 = $this->db->set("ref_group_id", $group_id)
                    ->set("username", $user)
                    ->where("ref_employee_code", $empCode)
                    ->update("employees_accounts");

            if ($dataArray2) {
                return "TRUE";
            } else {
                return "ERROR";
            }
        } else {
            return "ERROR";
        }
    }

    public function actionDeleteStaff($post) {
        $dataArray = $this->db
                ->set("username","")
                ->set("is_enabled", "N")
                ->where("ref_employee_code", $post['staffCode'])
                ->update("employees_accounts");
        
        $this->db
                ->set("license_number","")
                ->where("employee_code", $post['staffCode'])
                ->update("employees");

        if ($dataArray) {
            return "TRUE";
        } else {
            return "ERROR";
        }
    }

    public function getEmployeeDataSession() {
        $SESSION_USER_ID = $this->session->userdata('SESSION_USER_ID');

        $dataReturn = $this->db->select("*")
                        ->join("employees_accounts", "employees_accounts.ref_employee_code = employees.employee_code", "left")
                        ->join("groups_users", "groups_users.group_id = employees_accounts.ref_group_id", "left")
                        ->where("ref_employee_code", $SESSION_USER_ID)
                        ->get("employees")->result_array();

        return $dataReturn;
    }

    public function actionCheckOldPass($post) {
        $SESSION_USER_ID = $this->session->userdata('SESSION_USER_ID');
        $oldPass = $post['oldPass'];

        $dataReturn = $this->db->select("password")->where("ref_employee_code", $SESSION_USER_ID)->get("employees_accounts")->result_array();

        if ($dataReturn[0]['password'] == md5($oldPass)) {
            return "TRUE";
        } else {
            return "ERROR";
        }
    }

    public function actionChangePasswordStaff($post) {
        $SESSION_USER_ID = $this->session->userdata('SESSION_USER_ID');
        $dataArray = $this->db->set("password", md5($post['newPass']))->where("ref_employee_code", $SESSION_USER_ID)->update("employees_accounts");

        if ($dataArray) {
            return "TRUE";
        } else {
            return "ERROR";
        }
    }

    public function getMenu() {
        return $this->db->select("*")->order_by("menu_id")->get("menus_items")->result_array();
    }

    public function getGroupsPermission($group_id, $menu_id) {
        return $this->db->select("*")->where("ref_groups_id", $group_id)->where("ref_menu_id", $menu_id)->get("groups_permission")->result_array();
    }

    public function getGroupUser() {
        return $this->db->select("*")->order_by("group_id")->where("group_id <>", 1)->get("groups_users")->result_array();
    }

    public function actionSetMenu($post) {
        foreach ($post as $key => $val) {
            if ($key == "txt_group") {
                $this->db->where("ref_groups_id", $post['txt_group'])->delete("groups_permission");
            } else {
                $this->db->set("ref_groups_id", $post['txt_group'])
                        ->set("ref_menu_id", $val)
                        ->insert("groups_permission");
            }
        }
    }

    public function actionChangePassUser($post) {
        $this->db->set("password",  md5($post['newpass']))
                ->where("ref_employee_code",$post['empID'])
                ->update("employees_accounts");
    }

}

?>
