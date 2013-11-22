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
class product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("menu_model");
        $this->theme->usingJavaScript("applications/product.js");
        $this->theme->authenticateSession(true);
        $this->session->unset_userdata("listProduct");
    }
    
    public function index(){
        $this->theme->setPageTitle("Product Management.");
        $this->theme->usingLayoutName("themePanel");
        $elements = "";
        $this->theme->setContent($this->load->view("product/frmProduct", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmAddnewProduct(){
        $this->theme->setPageTitle("Product Management - Add New Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['producttype'] = $this->product_model->getProductType();
        $this->theme->setContent($this->load->view("product/frmProductAdd", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmActionAddnewProduct(){
        $this->product_model->actionAddNewProduct($this->input->post());        
        redirect("product/frmEditProduct");
    }
    
    public function frmEditProduct(){
        $this->theme->setPageTitle("Product Management - Edit Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->product_model->getProduct();
        $this->theme->setContent($this->load->view("product/frmProductEdit", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmGetDataProduct(){
        $elements = $this->product_model->getProductData($this->input->post()); 
        $elements['producttype'] = $this->product_model->getProductType();
        echo $this->load->view("product/frmProductEdit_Ajax", $elements, TRUE);
    }
    
    public function frmActionEditProduct(){
        $this->product_model->actionEditProduct($this->input->post());
    }
    
    public function frmSearchProduct(){
        $elements['data'] = $this->product_model->getProduct($this->input->post());
        echo $this->load->view("product/frmProductSearch", $elements, TRUE);
    }
    
    public function frmActionDeleteProduct(){
        $this->product_model->actionDeleteProduct($this->input->post());
    }
    
    public function frmImportProduct(){
        $this->theme->setPageTitle("Product Management - Import Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->product_model->getProductStock();
        $this->theme->setContent($this->load->view("product/frmProductImport", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmActionImportProduct(){        
        $this->theme->setPageTitle("Product Management - Import Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->product_model->actionImportProduct($this->input->post());
        $this->theme->setContent($this->load->view("product/frmProductImportSucceed", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmCancleImportProduct(){
        $this->theme->setPageTitle("Product Management - Cancle Import Product.");
        $this->theme->usingLayoutName("themePanel");
        $elements['data'] = $this->product_model->getImportBill();
        $this->theme->setContent($this->load->view("product/frmProductCancleImport", $elements, TRUE));
        $this->theme->getDisplay();
    }
    
    public function frmLoadDataImportProduct(){
        $elements['dataImport'] = $this->product_model->getDataImport($this->input->post());
        echo $this->load->view("product/frmProductCancleImportLoadData", $elements, TRUE);
    }
    
    public function frmActionCancleImportProduct(){
        $this->product_model->actionCancleImportProduct($this->input->post());
    }
}

?>
