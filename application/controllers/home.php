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
class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->theme->authenticateSession(true);
        $this->session->unset_userdata("listProduct");
        $this->load->model("menu_model");
    }
    
    public function index(){
        $this->theme->setPageTitle("Gurubox PoS & Stock Management System");
        $this->theme->usingLayoutName("themePanel");
        $this->theme->setContent($this->load->view("home/frmMainPanel",NULL,TRUE));
        $this->theme->getDisplay();
    }
    
}

?>
