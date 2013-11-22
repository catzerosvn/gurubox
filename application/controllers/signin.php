<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @property theme $theme Website
 * * @property theme $theme Website
 * 
 */

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("signin_model");
        $this->load->model("menu_model");
        $this->session->unset_userdata("listProduct");
    }

    public function index() {
        $this->theme->setPageTitle("Gurubox PoS & Stock Management System");
        $this->theme->usingLayoutName("themeLogin");
        $this->theme->usingJavaScript("applications/signin.js");
        $this->theme->setContent($this->load->view("signin/frmLogin",NULL,TRUE));
        $this->theme->getDisplay();
    }
    
    public function actionSignin(){
        $elements = $this->signin_model->getSignin($this->input->post());
        
        echo $elements;
    }
    
    public function actionSignOut(){
        $this->session->sess_destroy();
        redirect("");
    }

}

/* End of file Signin.php */
/* Location: ./application/controllers/welcome.php */