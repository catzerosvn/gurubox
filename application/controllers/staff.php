<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author ArMz-SWEngineer
 */
class staff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("staff_model");
        $this->load->model("menu_model");
        $this->theme->usingJavaScript("applications/staff.js");
        $this->theme->authenticateSession(true);
        $this->session->unset_userdata("listProduct");
    }

    public function index() {
        $this->theme->setPageTitle("Staff Management.");
        $this->theme->usingLayoutName("themePanel");
        $this->theme->setContent($this->load->view("staff/frmMainPanel", NULL, TRUE));
        $this->theme->getDisplay();
    }

    // ===== จัดการ Staff ==========================================================
    public function frmAddStaff() {
        $this->theme->setPageTitle("Staff Management - Add New Staff.");
        $this->theme->usingLayoutName("themePanel");
        $elements["group"] = $this->staff_model->getGroupList();
        $this->theme->setContent($this->load->view("staff/frmStaffAdd", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmActiocAddNewStaff() {
        $elements = $this->staff_model->actionAddNewStaff($this->input->post());
        echo $elements;
    }

    public function frmEditStaff() {
        $this->theme->setPageTitle("Staff Management - Edit Staff.");
        $this->theme->usingLayoutName("themePanel");
        $elements["employee"] = $this->staff_model->getEmployeeList($this->input->post());
        $elements["count"] = $this->staff_model->getEmployeeList_count($this->input->post());
        $this->theme->setContent($this->load->view("staff/frmStaffEdit", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmEditStaffLoadData() {
        $elements['employee'] = $this->staff_model->getEmployeeData($this->input->post());
        $elements["group"] = $this->staff_model->getGroupList();
        echo $this->load->view("staff/frmStaffEdit_Ajax", $elements, TRUE);
    }

    public function frmChangePageStaff() {
        $elements['employee'] = $this->staff_model->getEmployeeList($this->input->post());
        echo $this->load->view("staff/frmStaffChangePage", $elements, TRUE);
    }

    public function frmActionEditStaff() {
        $elements = $this->staff_model->actionEditStaff($this->input->post());
        echo $elements;
    }

    public function frmActionDeleteStaff() {
        $elements = $this->staff_model->actionDeleteStaff($this->input->post());
        echo $elements;
    }

    public function frmSearchStaff() {
        $elements['employee'] = $this->staff_model->getEmployeeList($this->input->post());
        $elements["count"] = $this->staff_model->getEmployeeList_count($this->input->post());
        echo $this->load->view("staff/frmStaffEdit_Search", $elements, TRUE);
    }

    // =============================================================================
    //======= Check ========================================================
    public function frmCheckEmpCode() {
        $elements = $this->staff_model->actionCheckEmpCode($this->input->post());
        echo $elements;
    }

    public function frmCheckEmpIdCard() {
        $elements = $this->staff_model->actionCheckEmpIdCard($this->input->post());
        echo $elements;
    }

    public function frmCheckEmpUser() {
        $elements = $this->staff_model->actionCheckEmpUser($this->input->post());
        echo $elements;
    }

    public function frmCheckOldPass() {
        $elements = $this->staff_model->actionCheckOldPass($this->input->post());
        echo $elements;
    }

    //===================================================================    
    // ===== จัดการกลุ่ม USER ==========================================================
    public function frmAddGroupStaff() {
        $this->theme->setPageTitle("Staff Management - Add New Staff Group.");
        $this->theme->usingLayoutName("themePanel");
        $elements["group"] = $this->staff_model->getGroupList();
        $this->theme->setContent($this->load->view("staff/frmGroupStaffAdd", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmActionAddGroupStaff() {
        $elements["group"] = $this->staff_model->actionAddNewGroupStaff($this->input->post());

        echo $this->load->view("staff/frmGroupStaffAdd_Ajax", $elements, TRUE);
    }

    public function frmEditGroupStaff() {
        $this->theme->setPageTitle("Staff Management - Edit Staff Group.");
        $this->theme->usingLayoutName("themePanel");
        $elements["group"] = $this->staff_model->getGroupList();
        $this->theme->setContent($this->load->view("staff/frmGroupStaffEdit", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmActionEditGroupStaff() {
        $elements["group"] = $this->staff_model->actionEditGroupStaff($this->input->post());

        echo $this->load->view("staff/frmGroupStaffEdit_Ajax", $elements, TRUE);
    }

    public function frmActionDeleteGroupStaff() {
        $elements["group"] = $this->staff_model->actionDeleteGroupStaff($this->input->post());

        echo $this->load->view("staff/frmGroupStaffEdit_Ajax", $elements, TRUE);
    }

    // ==========================================================================
    // ===== จัดการ Password ==========================================================
    public function frmEditPasswordStaff() {
        $this->theme->setPageTitle("Staff Management - Edit Password Staff.");
        $this->theme->usingLayoutName("themePanel");
        $elements["data"] = $this->staff_model->getEmployeeDataSession();
        $this->theme->setContent($this->load->view("staff/frmPasswordStaffEdit", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmActionChangePasswordStaff() {
        $elements = $this->staff_model->actionChangePasswordStaff($this->input->post());
        echo $elements;
    }

    // ==========================================================================

    public function frmMenuManeManage() {
        $this->theme->setPageTitle("Menu Management.");
        $this->theme->usingLayoutName("themePanel");
        $elements["menu"] = $this->staff_model->getMenu();
        $elements["group"] = $this->staff_model->getGroupUser();
        $this->theme->setContent($this->load->view("staff/frmMenuManeManage", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmGetMenuList() {
        $elements["menu"] = $this->staff_model->getMenu();
        $elements["group_id"] = $this->input->post("txt_group");
        echo $this->load->view("staff/frmMenuManeManageList", $elements, TRUE);
    }

    public function frmSetmenu() {
        $this->staff_model->actionSetMenu($this->input->post());
        redirect("staff/frmMenuManeManage");
    }

    public function frmChangePasswordUser() {
        $this->theme->setPageTitle("Staff Management - Edit Staff.");
        $this->theme->usingLayoutName("themePanel");
        $elements["employee"] = $this->staff_model->getEmployeeList($this->input->post());
        $elements["count"] = $this->staff_model->getEmployeeList_count($this->input->post());
        $this->theme->setContent($this->load->view("staff/frmChangePasswordUser", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmChangePasswordUserAjax() {
        $elements["post"] = $this->input->post();
        echo $this->load->view("staff/frmChangePasswordUserAjax", $elements, TRUE);
    }
    
    public function frmActionChangePassUser(){
        $this->staff_model->actionChangePassUser($this->input->post());
    }

}

?>
