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
class report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("report_model");
        $this->load->model("menu_model");
        $this->theme->usingJavaScript("applications/report.js");
        $this->load->helper('url');
        $this->theme->authenticateSession(true);
        $this->session->unset_userdata("listProduct");
    }

    public function index() {
        
    }
    
    public function frmReportIncomeDaily() {
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Report Systems - Income Daily Report.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = "";
        $this->theme->setContent($this->load->view("report/frmReportIncomeDaily", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmGetReportIncomeDaily(){
        $elements['data'] = $this->report_model->getReportIncomeDaily($this->input->post());
        echo $this->load->view("report/frmReportIncomeDailyAjax", $elements, TRUE);
    }
    
    public function frmReportIncomeMonth(){
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Report Systems - Income Monthly Report.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = "";
        $this->theme->setContent($this->load->view("report/frmReportIncomeMonth", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmGetReportIncomeMonth(){
        $elements['data'] = $this->report_model->getReportIncomeMonth($this->input->post());
        echo $this->load->view("report/frmReportIncomeMonthAjax", $elements, TRUE);
    }
    
    public function frmStockBalance(){
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Report Systems - Stock Balance Report.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->report_model->getStockBalance();
        $this->theme->setContent($this->load->view("report/frmStockBalance", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmExportXls(){
        $elements = $this->input->post();
        echo $this->load->view("report/frmExportXls", $elements, TRUE);
    }
    
    public function frmGetReportIncomeMonthViewProduct(){
        $elements['data'] = $this->report_model->getReportIncomeMonthProductView($this->input->post());
        echo $this->load->view("report/frmReportIncomeMonthViewProduct", $elements, TRUE);
    }
    
    public function frmSalesPeople(){
        $this->session->unset_userdata("listProduct");
        $this->theme->setPageTitle("Report Systems - SalesPeople.");
        $this->theme->usingLayoutName("themePanel");
        $elements['employee'] = $this->report_model->getEmployee();
        $this->theme->setContent($this->load->view("report/frmSalesPeople", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmActionSalesPeople(){
        $elements['data'] = $this->report_model->getReportSalesPeople($this->input->post());
        $elements['post'] = $this->input->post();
        echo $this->load->view("report/frmSalesPeopleList", $elements, TRUE);
    }
    
    public function frmActionSalesPeopleDetail(){
        $elements['data'] = $this->report_model->getReportSalesPeopleDetailEmployee($this->input->post());
        echo $this->load->view("report/frmSalesPeopleEmployeeDetail", $elements, TRUE);
    }
    
    public function frmActionSalesPeopleDetailSub(){
        $elements['data'] = $this->report_model->getReportSalesPeopleDetailBill($this->input->post());
        echo $this->load->view("report/frmSalesPeopleBill", $elements, TRUE);
    }
}

?>
