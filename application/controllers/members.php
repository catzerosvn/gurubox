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
class members extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("member_model");
        $this->load->model("menu_model");
        $this->theme->usingJavaScript("applications/member.js");
        $this->theme->authenticateSession(true);
        $this->session->unset_userdata("listProduct");
    }
    public function index(){
        $this->theme->setPageTitle("Member Management System.");
        $this->theme->usingLayoutName("themePanel");
        $this->theme->setContent($this->load->view("members/frmMember", null, TRUE));
        $this->theme->getDisplay();
    }

    // ===== จัดการ Member ==========================================================
    public function frmAddnewMember() {
        $this->theme->setPageTitle("Staff Management - Add New Member.");
        $this->theme->usingLayoutName("themePanel");
        $elements['career'] = $this->member_model->getCareer();
        $this->theme->setContent($this->load->view("members/frmMemberAdd", $elements, TRUE));
        $this->theme->getDisplay();
    }

    public function frmActionAddnewMember() {
        $newimage="";
        $imageupload = $_FILES['txt_pic']['tmp_name'];
        $imageupload_name = $_FILES['txt_pic']['name'];

        if ($imageupload) {
            $arraypic = explode(".", $imageupload_name); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน  
//            $lastname = strtolower($arraypic);
            $filename = $arraypic[0]; //ชื่อไฟล์  
            $filetype = $arraypic[1]; //นามสกุลไฟล์ 

            if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png" || $filetype == "gif") {
                $newimage = md5($this->input->post("txt_memberIDcard")) . "." . $filetype;

                if (file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".png")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".png");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpg")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpg");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpeg")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpeg");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".gif")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".gif");
                }

                copy($imageupload, "imagemembers/" . $newimage);
            }
        }
        
        $element = $this->member_model->actionAddnewMember($this->input->post(),$newimage);
        
        redirect("members/frmEditMember");
    }
    
    public function frmEditMember(){
        $this->theme->setPageTitle("Member Management - Edit Member.");
        $this->theme->usingLayoutName("themePanel");
        $elements["member"] = $this->member_model->getMemberList($this->input->post());
        $elements["count"] = $this->member_model->getMemberList_count($this->input->post());
        $this->theme->setContent($this->load->view("members/frmMemberEdit", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmEditMemberLoadData(){
        $elements['member'] = $this->member_model->getMemberData($this->input->post());
        $elements['career'] = $this->member_model->getCareer();
        echo $this->load->view("members/frmMemberEdit_Ajax", $elements, TRUE);
    }
    
    public function frmActionEditMember() {
        $newimage="";
        $imageupload = $_FILES['txt_pic']['tmp_name'];
        $imageupload_name = $_FILES['txt_pic']['name'];

        if ($imageupload) {
            $arraypic = explode(".", $imageupload_name); //แบ่งชื่อไฟล์กับนามสกุลออกจากกัน  
//            $lastname = strtolower($arraypic);
            $filename = $arraypic[0]; //ชื่อไฟล์  
            $filetype = $arraypic[1]; //นามสกุลไฟล์ 

            if ($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png" || $filetype == "gif") {
                $newimage = md5($this->input->post("txt_memberIDcard")) . "." . $filetype;

                if (file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".png")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".png");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpg")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpg");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpeg")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".jpeg");
                }else if(file_exists("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".gif")) {
                    unlink("imagemembers/" . md5($this->input->post("txt_memberIDcard")) . ".gif");
                }

                copy($imageupload, "imagemembers/" . $newimage);
            }
        }
        
        $elements = $this->member_model->actionEditMember($this->input->post(),$newimage);
        
        redirect("members/frmEditMember");
    }
    
    public function frmActionDeleteMembers(){
        $this->member_model->actionDeleteMember($this->input->post());                
    }
    
    public function frmSearchMember(){
        $elements["member"] = $this->member_model->getMemberList($this->input->post());
        $elements["count"] = $this->member_model->getMemberList_count($this->input->post());
        echo $this->load->view("members/frmMemberEditSearch", $elements, TRUE);
    }
    
    public function frmChangePageMember(){
        $elements["member"] = $this->member_model->getMemberList($this->input->post());
        echo $this->load->view("members/frmMemberEditChangePage", $elements, TRUE);
    }
    // =============================================================================
    // ===== Checker ==========================================================
    public function frmCheckMemberIdCard() {
        $elements = $this->member_model->actionCheckMemberIdCard($this->input->post());
        echo $elements;
    }

    public function frmCheckMemberUser() {
        $elements = $this->member_model->actionCheckMemberUser($this->input->post());
        echo $elements;
    }

    // ===== ========== ==========================================================
}

?>
