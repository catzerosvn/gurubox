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
class report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getReportIncomeDaily($post) {
        $dataArray = $this->db->select("*")
                        ->join("billing_transaction_items", "ref_billing_code = billing_code", "left")
                        ->where("billing_date >=", $post['txt_date'] . " 00.00.01")
                        ->where("billing_date <=", $post['txt_date'] . " 23.59.59")
                        ->order_by("ref_billing_code,ref_product_code")
                        ->get("billing_transaction")->result_array();

        return $dataArray;
    }

    public function getReportIncomeMonth($post) {
        $dataArray = $this->db->select("*,sum(quantity) as productQty")
                        ->join("billing_transaction_items", "ref_billing_code = billing_code", "left")
                        ->where("billing_date >=", "$post[txt_year]-$post[txt_month]-01 00.00.01")
                        ->where("billing_date <=", "$post[txt_year]-$post[txt_month]-31 23.59.59")
                        ->group_by("ref_product_code,unit_sale_price")
                        ->order_by("ref_product_code")
                        ->get("billing_transaction")->result_array();

        return $dataArray;
    }

    public function getStockBalance() {
        return $this->db->select("*")->where("ref_product_type_id", 2)->order_by("product_code")->get("products_stocks")->result_array();
    }

    public function getReportIncomeMonthProductView($post) {
        $dataArray = $this->db->select("*")
                        ->join("billing_transaction_items", "ref_billing_code = billing_code", "left")
                        ->where("billing_date >=", "$post[txt_year]-$post[txt_month]-01 00.00.01")
                        ->where("billing_date <=", "$post[txt_year]-$post[txt_month]-31 23.59.59")
                        ->where("ref_product_code", $post['product_code'])
                        ->where("unit_sale_price", $post['price'])
                        ->order_by("billing_date")
                        ->get("billing_transaction")->result_array();

        return $dataArray;
    }

    public function getEmployee() {
        return $this->db->select("*")->join("employees_accounts", "ref_employee_code = employee_code", "left")->where("is_enabled", "Y")->get("employees")->result_array();
    }

    public function getReportSalesPeople($post) {
        $this->db->select("*,sum(total_amount) as totalselling");
        $this->db->where("billing_date >=", "$post[txt_dateStart] 00.00.01");
        $this->db->where("billing_date <=", "$post[txt_dateEnd] 23.59.59");
        
        if($post["txt_employee"] != "0"){
            $this->db->where("create_by_id", $post["txt_employee"]);
        }
        
        $this->db->group_by("create_by_id");
        $dataArray = $this->db->get("billing_transaction")->result_array();
        
        return $dataArray;
    }
    
    public function getReportSalesPeopleDetailEmployee($post){
        $this->db->select("*");
//        $this->db->join("billing_transaction_items", "ref_billing_code = billing_code", "left");
        $this->db->where("billing_date >=", "$post[txt_hiddenDateStart] 00.00.01");
        $this->db->where("billing_date <=", "$post[txt_hiddenDateEnd] 23.59.59");
        $this->db->where("create_by_id", $post["empID"]);   
        $this->db->order_by("billing_date");
        $dataArray = $this->db->get("billing_transaction")->result_array();
        
        return $dataArray;
    }
    
    public function getReportSalesPeopleDetailBill($post){
        $this->db->select("*");
        $this->db->where("ref_billing_code", $post["billCode"]);   
        $this->db->order_by("ref_product_code");
        $dataArray = $this->db->get("billing_transaction_items")->result_array();
        
        return $dataArray;
    }

}

?>
